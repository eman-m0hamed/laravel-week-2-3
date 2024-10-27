<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::with(['user'])->paginate(15); // ONE SQl Query

        
        return view('posts.index', get_defined_vars());
        // dd($posts);

         /**
          * posts => select * from posts where user_id in (select distinct(user_id) from posts) ;

          */

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::get();

        return view("posts.create", get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // try{
            $validData = $request->validate([
             'title' => 'required|string|min:5|max:10',
             'description'=> ['required', 'string', 'min:20'],
             'user_id' => 'required|exists:users,id'

            ]);

// dd($validData, $request->all());
           Post::create($validData);
           return redirect()->route('posts.index')->with('message', 'post created successfully');
        // }catch(\Exception $e){
        //     dd($e);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        dd("show page");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        // dd($id);

        // $post = Post::findOrFail($id);

        $users = User::get();
        return view("posts.edit", get_defined_vars());


        /**
         * upload image
         * form as html => enctype attribute
         *  php =>$_FILES , laravel => $request->file('image')
         * php => move_uploaded_file(tem_path, newPath)
         * laravel $image->storeAs("/images)
         * name= time(). exten
         */

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        dd(vars: "update page");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        dd("delete page");
    }
}
