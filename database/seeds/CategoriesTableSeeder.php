<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'pdg', 'manager'
        ];
        foreach ($categories as $category)
        \App\Category::create([
            'category'  => $category,
        ]);
        $category = \App\Category::find(1);
        $category->authorizes()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]);
        $category = \App\Category::find(2);
        $category->authorizes()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]);
    }
}
