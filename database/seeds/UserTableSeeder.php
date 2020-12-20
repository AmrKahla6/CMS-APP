<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$user = User::where('email' , 'algorthim@gmail.com')->first();
        $user = DB::table('users')->where('email' , 'admin@admin.com')->first();
        if(! $user)
        {
           User::create([
               'name'     => 'admin',
               'email'    => 'admin@admin.com',
               'password' => Hash::make('123456'),
               'role'     => 'admin'
           ]);
        }
    }
}
