<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'casablanca'
        ];
        foreach ($cities as $city){
            \App\City::insert([
                'city'  => $city
            ]);
        }
    }
}
