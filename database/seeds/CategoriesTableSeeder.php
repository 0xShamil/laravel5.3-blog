<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Development';
        $category->slug = 'development';
        $category->save();

        $category = new Category();
        $category->name = 'Open Source';
        $category->slug = 'open-source';
        $category->save();

        $category = new Category();
        $category->name = 'Laravel';
        $category->slug = 'laravel';
        $category->save();

        $category = new Category();
        $category->name = 'Android';
        $category->slug = 'android';
        $category->save();

        $category = new Category();
        $category->name = 'Tutorial';
        $category->slug = 'tutorial';
        $category->save();
    }
}
