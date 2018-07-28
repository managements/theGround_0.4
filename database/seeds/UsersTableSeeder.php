<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'  => 'admin',
            'password'  => bcrypt('066145392mM'),
            'first_name'=> 'yasser',
            'last_name' => 'lakhsadi',
            'tel'       => '0657834565',
            'email' => 'admin@admin.com',
            'is_admin'  => true,
            'range'     => 365,
            'limit'     => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'company_id'=> 1,
            'category_id'=> 1,
            'status_id' => 2
        ]);
        \App\User::create([
            'name'  => 'pdg',
            'password'  => bcrypt('066145392mM'),
            'first_name'=> 'yasser1',
            'last_name' => 'lakhsadi1',
            'tel'       => '0657834564',
            'email'     => 'pdg@pdg.com',
            'is_admin'  => false,
            'range'     => 365,
            'limit'     => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'company_id'=> 1,
            'category_id'=> 1,
            'status_id' => 2
        ]);
    }
}
