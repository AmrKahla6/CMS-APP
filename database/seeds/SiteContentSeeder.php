<?php

use Illuminate\Database\Seeder;
use App\SiteContent;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContent::create([
            'name' => 'hello',
                'content' => json_encode([
                    'title'     => 'Hello! Welcome to',
                    'subtitle'  => 'BlogTyrant blog',
                    'desc'      => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.',
                ]),
        ]);

        SiteContent::create([
            'name' => 'head',
                'content' => json_encode([
                    'title'     => 'Blog',
                    'subtitle'  => 'Tyrant',
                    'dot'       => '.',
                    'desc'      => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                ]),
        ]);

        SiteContent::create([
            'name' => 'latest1',
                'content' => json_encode([
                    'desc'      => 'Even the all-powerful Pointing has no control about',
                ]),
        ]);

        SiteContent::create([
            'name' => 'latest2',
                'content' => json_encode([
                    'desc'      => 'Even the all-powerful Pointing has no control about',
                ]),
        ]);
    }
}
