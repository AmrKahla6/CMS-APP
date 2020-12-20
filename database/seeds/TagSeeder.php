<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'tv',
        ]);

        Tag::create([
            'name' => 'canada',
        ]);

        Tag::create([
            'name' => 'africa',
        ]);

        Tag::create([
            'name' => 'europe',
        ]);

        Tag::create([
            'name' => 'middle_east',
        ]);
    }
}
