<?php

use Illuminate\Database\Seeder;

class DealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++)
        \App\Deal::create([
            'name'      => "deal$i",
            'email'     => "deal$i@deal.com",
            'tel'       => "065783456$i",
            'speaker'   => "speaker$i",
            'address'   => "address address address address address ",
            'provider'  => ($i <= 5) ?: false,
            'client'    => ($i > 5) ?: false,
            'city_id'   => 1,
            'company_id'=> 1,
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now()
        ]);
    }
}
