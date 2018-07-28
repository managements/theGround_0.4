<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Company::insert([
            'slug'          => str_slug('company 1'),
            'name'          => 'company ' . 1,
            'licence'       => '123456789MLA',
            'brand'         => 'brands/logo.png',
            'address'       => 'DB Mohamed 6 jamila 1',
            'build'         => '1443',
            'floor'         => '1',
            'apt_nbr'       => '2',
            'zip'           => '20000',
            'email'         => "company@company.com",
            'tel'           => "0657834545",
            'speaker'       => 'yasser',
            'range'         => 0,
            'sold'          => 50,
            'turnover'      => '10000',
            'limit'         => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'city_id'       => 1,
            'status_id'     => 2,
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()
        ]);
    }
}
