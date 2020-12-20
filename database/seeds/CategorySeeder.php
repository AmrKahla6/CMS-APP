<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'News',
        ]);

        Category::create([
            'name' => 'Sport',
        ]);

        Category::create([
            'name' => 'Word Life',
        ]);

        Category::create([
            'name' => 'travel',
        ]);

        Category::create([
            'name' => 'Culture',
        ]);
    }
}
