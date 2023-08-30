<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $input['path'] = $name;

        }

        Post::create($input);


//        Post::create($request->all());
        //$input = $request->all();

        //$input['title'] = $request->title;

        //Post::create($request->all());
//        $this->validate($request, [
//           'title'=>'required'
//        ]);

//        $post = new Post();
//
//        $post->title = $request->title;
//        $post->content = "THis is content";
//        $post->user_id = 0;
//
//        $post->save();
//
//        return redirect('/posts');





    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);


        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        Post::whereId($id)->delete();


        return redirect('/posts');
    }

    public function contact(){
        $people = ['Emil', 'Jose', 'James', 'Edwin', "Maria"];

        return view('contact', compact('people'));


    }

    public function show_post($id, $name, $password){
       // return view('post')->with('id',$id);
        return view('post', compact('id', 'name', 'password'));
    }
}
