<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'posts_count'      =>Post::all()->count() ,
            'categories_count' => Category::all()->count() ,
            'users_count'      => User::all()->count()
        ]);
    }
}
