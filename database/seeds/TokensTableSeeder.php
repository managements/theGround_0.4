<?php

use Illuminate\Database\Seeder;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Token::create([
            'token'         => md5(sha1(rand())),
            'range'         => 100,
            'company_id'    => 1,
            'category_id'   => 2,
        ]);
    }
}
