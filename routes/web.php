<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Front\WelcomeController@index')->name('homepage');
Route::get('/contact', 'Front\WelcomeController@contact')->name('contact');
Route::post('/contact/store', 'Front\WelcomeController@storeContact')->name('contact.store');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace('Front')->group(function () {
        Route::resource('/categories', 'CategoriesController');
        Route::get('/trashed-categories', 'CategoriesController@trashed')->name('trashed.cat');
        Route::get('/restore-categories/{id}', 'CategoriesController@restore')->name('cat.restore');

      // End Categories Routes

        Route::resource('/posts', 'PostsController');
        Route::get('/trashed-posts', 'PostsController@trashed' )->name('trashed.index');
        Route::get('/restore-posts/{id}', 'PostsController@restore')->name('trashed.restore');

        // End Posts Routs

        Route::resource('/tags', 'tagsController');
        Route::get('/trashed-tags', 'tagsController@trashed' )->name('tag.Trash');
        Route::get('/restore-tags/{id}', 'tagsController@restore')->name('tag.restore');

        // End Of Pages

 }); // End Of Front NameSpace

 Route::middleware(['admin']) ->namespace('Admin')->group(function()
  {
       Route::get('/users', 'UserController@index')->name('users.index');
       Route::post('/users/{user}/make-admin','UserController@makeAdmin')->name('users.make-admin');
       Route::post('/users/{user}/make-weiter','UserController@makeWeiter')->name('users.make-writer');
       Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
  });// End OF Name space

  Route::get('/users/{user}/profile','Admin\UserController@edit')->name('users.edit');
  Route::post('/users/{user}/profile','Admin\UserController@update')->name('users.update');


});



