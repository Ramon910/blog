<?php

use App\Category;
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
        Category::truncate();
        $category = new Category;
        $category->name = 'categoria 1';
        $category->save();

        $category = new Category;
        $category->name = 'categoria 2';
        $category->save();

        $category = new Category;
        $category->name = 'categoria 3';
        $category->save();

        $category = new Category;
        $category->name = 'categoria 4';
        $category->save();
    }
}
