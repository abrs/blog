<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->getTheValidationAttributes();

        $post = Post::create($attributes);

        session()->flash('success', 'the post has been stored successfully!');

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $this->getTheValidationAttributes();

        $post->update($attributes);

        session()->flash('success', 'the post has been updated successfully!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $postTitle = $post->title;

        $post->delete();

        session()->flash('success', "\"" . $postTitle . "\" deleted successfully");

        return redirect()->route('posts.index');
    }

    /**
     * return the validation attributes
     * @return array
     */
    private function getTheValidationAttributes() :array {
         $attributes = request()->validate([
            'title' => ['required', 'max:255'],
            'body'  => ['required'],
            'slug'  => ['required', 'alpha_dash', 'min:5', 'max:255', 'unique:posts']
        ]);

         return $attributes;
    }
}
