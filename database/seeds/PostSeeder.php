<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title'       => 'Lockerbie bombing: New suspect soon to be charged - US media',
            'description' => 'The US will soon announce charges against a Libyan suspected of making the bomb that blew up Pan Am Flight 103 over Lockerbie in 1988, US media say.',
            'content'     => 'Prosecutors will soon seek the extradition of Abu Agila Mohammad Masud to stand trial in the US, reports say.

                                He is currently being held in Libya, according to the Wall Street Journal. This has not been confirmed by the Libyan authorities.

                                The blast on board a Boeing 747 over the Scottish town left 270 people dead.

                                Most of the victims on board the flight from London to New York were American citizens. Eleven people on the ground were also killed.

                                It remains the deadliest terrorist incident ever to have taken place on British soil',
            'category_id'  => rand(1,5),
            'user_id'      => 1,
            'image'        => '1.png'
        ]);

        Post::create([
            'title'       => 'Covid vaccine: "Disappearing" needles and other rumours debunked',
            'description' => 'The US will soon announce charges against a Libyan suspected of making the bomb that blew up Pan Am Flight 103 over Lockerbie in 1988, US media say.',
            'content'     => 'Prosecutors will soon seek the extradition of Abu Agila Mohammad Masud to stand trial in the US, reports say.

                                He is currently being held in Libya, according to the Wall Street Journal. This has not been confirmed by the Libyan authorities.

                                The blast on board a Boeing 747 over the Scottish town left 270 people dead.

                                Most of the victims on board the flight from London to New York were American citizens. Eleven people on the ground were also killed.

                                It remains the deadliest terrorist incident ever to have taken place on British soil',
            'category_id'  => rand(1,5),
            'user_id'      => 1,
            'image'        => '2.png'
        ]);

        Post::create([
            'title'       => 'Covid: Nations impose UK travel bans over new variant',
            'description' => 'The US will soon announce charges against a Libyan suspected of making the bomb that blew up Pan Am Flight 103 over Lockerbie in 1988, US media say.',
            'content'     => 'Prosecutors will soon seek the extradition of Abu Agila Mohammad Masud to stand trial in the US, reports say.

                                He is currently being held in Libya, according to the Wall Street Journal. This has not been confirmed by the Libyan authorities.

                                The blast on board a Boeing 747 over the Scottish town left 270 people dead.

                                Most of the victims on board the flight from London to New York were American citizens. Eleven people on the ground were also killed.

                                It remains the deadliest terrorist incident ever to have taken place on British soil',
            'category_id'  => rand(1,5),
            'user_id'      => 1,
            'image'        => '3.png'
        ]);

        Post::create([
            'title'       => "God will forgive me or not': Inside the world of a people smuggler",
            'description' => 'The US will soon announce charges against a Libyan suspected of making the bomb that blew up Pan Am Flight 103 over Lockerbie in 1988, US media say.',
            'content'     => 'Prosecutors will soon seek the extradition of Abu Agila Mohammad Masud to stand trial in the US, reports say.

                                He is currently being held in Libya, according to the Wall Street Journal. This has not been confirmed by the Libyan authorities.

                                The blast on board a Boeing 747 over the Scottish town left 270 people dead.

                                Most of the victims on board the flight from London to New York were American citizens. Eleven people on the ground were also killed.

                                It remains the deadliest terrorist incident ever to have taken place on British soil',
            'category_id'  => rand(1,5),
            'user_id'      => 1,
            'image'        => '4.png'
        ]);

        Post::create([
            'title'       => "Quiz of the Year, part three: Was there any good news?",
            'description' => 'The US will soon announce charges against a Libyan suspected of making the bomb that blew up Pan Am Flight 103 over Lockerbie in 1988, US media say.',
            'content'     => 'Prosecutors will soon seek the extradition of Abu Agila Mohammad Masud to stand trial in the US, reports say.

                                He is currently being held in Libya, according to the Wall Street Journal. This has not been confirmed by the Libyan authorities.

                                The blast on board a Boeing 747 over the Scottish town left 270 people dead.

                                Most of the victims on board the flight from London to New York were American citizens. Eleven people on the ground were also killed.

                                It remains the deadliest terrorist incident ever to have taken place on British soil',
            'category_id'  => rand(1,5),
            'user_id'      => 1,
            'image'        => '5.png'
        ]);
    }
}
