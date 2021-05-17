<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('filters')->insert([
            [
                'filterName' => 'Nederlands'
            ],[
                'filterName' => 'Engels'
            ],
            [
                'filterName' => 'Overige Taal'
            ],
            [
                'filterName' => 'Word bestand'
            ],
            [
                'filterName' => 'Powerpoint bestand'
            ],
            [
                'filterName' => 'Pdf bestand'
            ],
            [
                'filterName' => 'Overig bestand'
            ]]);
    }
}
