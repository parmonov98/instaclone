<?php
//echo PHP_VERSION;

use Illuminate\Support\Facades\Route;
use App\NewUserWelcome;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/email', function (){
    return new \App\Mail\NewUserWelcome();
});


Route::post('/follow/{user}', 'FollowsController@store');
Route::get('/', 'PageController@index');
Route::get('/page/{page}', 'PageController@show')->name('page.show');
Route::get('/page/{page}/edit', 'PageController@edit')->name('page.edit');
Route::patch('/page/{page}', 'PageController@update')->name('page.update');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/create', 'PostsController@create');
Route::post('/post', 'PostsController@store');
Route::get('/post/{post}', 'PostsController@show')->name('post.show');
Route::get('/post/{post}/delete', 'PostsController@delete')->name('post.destroy');
