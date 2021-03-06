<?php

namespace App\Http\Controllers;

use Google;
use Carbon\Carbon;
use App\Models\Domain;
use App\Models\Checklist;
use App\Models\IndexResult;
use Google_Service_Indexing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Google_Service_Indexing_UrlNotification;

class IndexingController extends Controller
{
    public function InstantIndex(Request $request)
    {

        $urls        = array();
        $batch_count = (!empty($request->batch)) ? $request->batch : 10;

        $domain = $request->domain;
        if (empty($domain)) {
            dd("Please Add Domain in Url want to index In Search Engine Like: &domain=https://example.com ");
        }
        $domain_details   = Domain::where('domain', $domain)->first();
        $google_json_path = 'app/public/google_json/' . $domain_details['google_json'];

        try {
            $google_json_path_content = file_get_contents(storage_path($google_json_path));
        } catch (\Throwable $th) {
            //throw $th;
            die('Please Add Google json file');
        }

        try {
            $googleClient = new Google\Client();

            // Add here location to the JSON key file that you created and downloaded earlier.
            $googleClient->setAuthConfig(storage_path($google_json_path));
            $googleClient->setScopes(Google_Service_Indexing::INDEXING);
            $googleClient->setUseBatch(true);

            $service = new Google_Service_Indexing($googleClient);
            $batch   = $service->createBatch();

            $postBody = new Google_Service_Indexing_UrlNotification();

            $google_posts = Checklist::where('domain_id', $domain_details->id)->where('_is_google_indexed', '0')->orderBy('id', 'asc')->limit($batch_count)->get();

            if (!empty($google_posts->count())) {
                // $slug = (!empty(config('constant.POST_SLUG'))) ? '/' . config('constant.POST_SLUG') : config('constant.POST_SLUG');
                // Use URL_UPDATED for new or updated pages.
                // Use URL_DELETED for deleted pages.
                foreach ($google_posts as $google_post) {
                    $urls[url($domain_details->domain . '/' . $google_post->slug)] = 'URL_UPDATED';
                    // testing urls
                    // $url        = 'https://apkbilli.com' . ($slug . '/' . $google_post->slug);
                    // $urls[$url] = 'URL_UPDATED';
                    Checklist::where('id', $google_post->id)->update(['_is_google_indexed' => 1]);
                }

                foreach ($urls as $url => $type) {
                    $postBody->setUrl($url);
                    $postBody->setType($type);
                    $batch->add($service->urlNotifications->publish($postBody));
                }
                $results = $batch->execute();

                // If you want to loop trough the results of the each page, you can do it with
                // the example below.

                foreach ($results as $result) {
                    echo "<pre>";
                    echo $result->urlNotificationMetadata->latestUpdate["notifyTime"] . "\n";
                    echo $result->urlNotificationMetadata->latestUpdate["type"] . "\n";
                    echo $result->urlNotificationMetadata->latestUpdate["url"] . "\n";

                    IndexResult::create([
                        'search_engine' => 'google',
                        'notifyTime'    => $result->urlNotificationMetadata->latestUpdate["notifyTime"],
                        'type'          => $result->urlNotificationMetadata->latestUpdate["type"],
                        'url'           => $result->urlNotificationMetadata->latestUpdate["url"],
                    ]);

                }

            } else {
                echo "No Url found For Google to send Indexing request<br>";
            }
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        try {
            $batch_count = (!empty($request->batch)) ? $request->batch : 10;

            $bing_posts = Checklist::where('domain_id', $domain_details->id)->where('_is_bing_indexed', '0')->orderBy('id', 'asc')->limit($batch_count)->get();
            if (!empty($bing_posts->count())) {
                // $slug = (!empty(config('constant.POST_SLUG'))) ? '/' . config('constant.POST_SLUG') : config('constant.POST_SLUG');

                foreach ($bing_posts as $bing_post) {
                    $bing         = 'https://www.bing.com/indexnow?url=' . url($domain_details->domain . '/' . $bing_post->slug) . '&key=' . $domain_details->bing_api;
                    $bing_request = Http::get($bing);

                    Checklist::where('id', $bing_post->id)->update(['_is_bing_indexed' => 1]);

                    IndexResult::create([
                        'search_engine' => 'Bing',
                        'notifyTime'    => Carbon::now(),
                        'type'          => 'URL_UPDATED',
                        'url'           => url($domain_details->domain . '/' . $bing_post->slug),
                        'status_code'   => $bing_request->getStatusCode(),
                    ]);
                }
            } else {
                echo "No url found in Bing list send Indexing request<br>";
            }

        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
