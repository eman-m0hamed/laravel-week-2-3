<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::get();
        $posts = PostResource::collection($posts);
        $response = [
            'success' => true,
            'status' => 200,
            'data' => $posts,
            'message' => 'posts retrieved successfully',

        ];
        return response($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // try {

            // $validData = $request->validate([
            //     'title' => 'required|string|min:5|max:10',
            //     'description' => ['required', 'string', 'min:20']
            // ]);

            $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5|max:10',
            'description' => ['required', 'string', 'min:20']
            ]);

            if($validator->fails()){
                return response([
                    'message' => 'invalid data',
                    'errors' => $validator->errors()
                ], 400);
            }

            $validData = $validator->validate();
            
            $validData['user_id'] = auth()->id();
            $post = Post::create($validData);
            return response()->json(['message' => 'post created successfully', 'data' => $post]);
        // } catch (\Exception $e) {

        //     return response()->json(['message' => $e->getMessage()]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);
        // $post = PostResource::make($post);
        $post = new PostResource($post);
        $response = [
            'success' => true,
            'status' => 200,
            'data' => $post,
            'message' => 'post record retrieved successfully',
        ];
        return response($response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
