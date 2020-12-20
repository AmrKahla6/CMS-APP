<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SittengSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'adderss'   => '60 Elgomhoria st, Mansoura University, Mansoura University Hospitals Mansoura Egypt',
            'phone'     => '+0201154400681',
            'email'     => 'amrkahla6@gmail.com',
            'website'   => 'www.amrkahla.com',
            'mab'       => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d27348.542882103375!2d31.372083199999995!3d31.038287450000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1608133518880!5m2!1sar!2seg" width="1000" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'fb'        => 'https://www.facebook.com/magic.fight/',
            'twitter'   => 'https://twitter.com/?lang=ar',
            'instegram' => 'https://www.instagram.com/',
        ]);
    }
}
