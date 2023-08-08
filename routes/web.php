<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/post/{id}', [PostsController::class, 'index']);

//Route::resource('posts', PostsController::class);

Route::get('/contact', [PostsController::class, 'contact']);

Route::get('/post/{id}/{name}/{password}', [PostsController::class, 'show_post']);







/*
Route::get('/about', function () {
    return "Here is about page";
});

Route::get('/contact', function () {
    return "Here is contact page";
});

Route::get('/post/{id}/{name}', function($id, $name)  {
    return "This is post numbner ". $id . " ". $name;
});

Route::get('/admin/posts/example', array('as'=>'admin.home',function() {
   $url = route('admin.home');
   return "This url is ". $url;
}));
*/
