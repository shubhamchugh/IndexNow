<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDomainRequest;
use App\Http\Requests\UpdateDomainRequest;

class DomainController extends Controller
{
    public $limit = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/", 'name' => "Page"], ['name' => "Test Page"],
        ];

        $domains      = Domain::paginate($this->limit);
        $domainsCount = Domain::count();

        return view("backend.domains.index", [
            'breadcrumbs'  => $breadcrumbs,
            'domains'      => $domains,
            'domainsCount' => $domainsCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Domain $domain)
    {
        return view('backend.domains.create', ['domain' => $domain]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDomainRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDomainRequest $request)
    {
        $fileName = time() . '.' . $request->file('google_json')->getClientOriginalName();
        $path     = '/google_json/';
        Storage::disk('public')->put($path . $fileName, File::get($request->file('google_json')));
        $request_data                = $request->all();
        $request_data['google_json'] = $fileName;
        Domain::create($request_data);
        return redirect()->back()->with('message', 'Your domain was added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $domain = Domain::findOrFail($id);
        return view("backend.domains.edit", [
            'domain' => $domain,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDomainRequest  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDomainRequest $request, Domain $domain)
    {
        $fileName = time() . '.' . $request->file('google_json')->getClientOriginalName();

        $request->file('google_json')->store('google_json' . $fileName);
        $request_data                = $request->all();
        $request_data['google_json'] = $fileName;
        $domain->update($request_data);
        return redirect()->back()->with('message', 'Your domain was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect()->route('checklist.index')->with('message', 'Slug ' . $domain->domain . ' deleted');
    }
}
