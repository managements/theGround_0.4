<?php

use Illuminate\Database\Seeder;

class AuthorizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorizes = [
            'companies.show',
            'token_index', 'token_view', 'token_create', 'token_update', 'token_delete',
            'post_index', 'post_view', 'post_create', 'post_update', 'post_delete',
            'user_update',
            'deal_index', 'deal_view', 'deal_create', 'deal_update', 'deal_delete',
        ];
        foreach ($authorizes as $authorize){
            \App\Authorize::create([
                'authorize' => $authorize,
            ]);
        }
    }
}
