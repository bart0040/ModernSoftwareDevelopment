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
                'filterName' => 'Filter A'
            ],[
                'filterName' => 'Filter B'
            ],
            [
                'filterName' => 'Filter C'
            ],
            [
                'filterName' => 'Filter D'
            ]]);
    }
}
