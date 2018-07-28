<?php

use Illuminate\Database\Seeder;

class StatutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statutes = [
            'inactive', 'active', 'suspended', 'archive'
        ];

        foreach ($statutes as $status){
            \App\Status::create([
                'status'    => $status
            ]);
        }
    }
}
