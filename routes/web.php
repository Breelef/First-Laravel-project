<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Post;

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


Route::get('/findwhere', function(){
    $posts = Post::where('id', 4)->orderBy('id', 'desc')->take(1)->get();

    return $posts;

});


Route::get('/findmore', function(){
     //$posts = Post::findOrFail(4);

    $posts = Post::where('users_count', '<', 50)->firstOrFail();

     return $posts;

});
//update and insert
Route::get('/basicinsert', function(){
    //$post = new Post;
    $post = Post::find(2);

    $post->title = "new ORM/ELOQUENT title updated ID 2";
    $post->content = "Eleqoent is easy to update. This is so nice";

    $post->save();

});

Route::get('/create', function(){
    Post::create(['title'=>'The delete method', 'content'=>'We want to retrieve deleted data']);




});

Route::get('/update', function(){
    Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'NEW PHP ELOQUENT TITLE', 'content'=>'We are now using the update method with eloquent']);
});

Route::get('/delete', function(){

    //Post::destroy([6,7,8,9,10,11,12,13]);


    Post::destroy(13);
    //Post::where('is_admin', 0)->delete();


    //$post = Post::find(2);
    //$post->delete();

});

Route::get('/readsoftdelete', function(){

    //$post = Post::find(14);

    //return $post;

    //Include both trashed and non trashed items
    //$post = Post::withTrashed()->where('id', 13)->get();
    //return $post;

    //Only Trashed items
    $post = Post::onlyTrashed()->where('is_admin', 0)->get();
    return $post;
});

Route::get('/restore', function (){
    Post::withTrashed()->where('id', 13)->restore();
});

Route::get('/forcedelete', function (){

    Post::withTrashed()->where('id', 13)->forceDelete();

});





















/*Route::get('/', function () {
    return view('welcome');
});

//Route::get('/post/{id}', [PostsController::class, 'index']);

//Route::resource('posts', PostsController::class);


 Route::get('/contact', [PostsController::class, 'contact']);

Route::get('/post/{id}/{name}/{password}', [PostsController::class, 'show_post']);
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

Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'This is the content for the post with the title PHP with Laravel']);

});

Route::get('/read', function(){

    $results = DB::select('select * from posts where id = ?', [1]);
    foreach ($results as $post){
        return $post->title;
    }
});

Route::get('/update', function(){
    $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);

    return $updated;

});

Route::get('/delete', function(){
    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;
});


Route::get('/find', function () {

    $posts = Post::all();

    foreach ($posts as $post) {
        return $post->title;

    }





});

Route::get('/find', function() {
    $post = Post::find(2);

    return $post->title;
});
*/
