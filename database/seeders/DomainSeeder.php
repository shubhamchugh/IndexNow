<?php

namespace Database\Seeders;

use Carbon\Factory;
use App\Models\Domain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('domains')->truncate();

        DB::table('domains')->insert([
            'domain'      => 'http://bulk-index-api.lo',
            'google_json' => 'test_data_json',
            'bing_api'    => 'bing_api',
        ]);

        factory(Domain::class, 20)->create();
    }
}
