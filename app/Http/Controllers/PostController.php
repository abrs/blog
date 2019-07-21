<?php

namespace App\Http\Controllers;

use App\{Post, Tag};
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Category;
use Purifier;
use Image;

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact(['categories', 'tags']));
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
        $attributes['body'] = Purifier::clean($attributes['body']);

        if($request->hasFile('image')) {

          $image = $request->file('image');
          $imageName = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images\\' . $imageName);

          Image::make($image)->resize(800, 400)->save($location);
          $attributes['image'] = $imageName;
        }

        // dd($attributes);

        $post = Post::create($attributes);

        $post->tags()->syncWithoutDetaching ($request->tags);

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
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', compact(['post', 'categories', 'tags']));
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
        $attributes = $this->getTheValidationAttributes($post);
        $attributes['body'] = Purifier::clean($attributes['body']);

        if($request->hasFile('image')) {

          #deleting the previous image
          if ($post->image !== Null)
            unlink(public_path('images\\' . $post->image));

          #adding the new one
          $image = $request->file('image');
          $imageName = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images\\' . $imageName);

          Image::make($image)->resize(800, 400)->save($location);
          $attributes['image'] = $imageName;
        }

        $post->update($attributes);

        $post->tags()->sync($request->tags);

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

        $post->tags()->detach();
        $post->delete();

        session()->flash('success', "\"" . $postTitle . "\" deleted successfully");

        return redirect()->route('posts.index');
    }

    /**
     * return the validation attributes
     * @return array
     */
    private function getTheValidationAttributes(Post $post = null) :array {

        $attributes = request()->validate([
                'title' => ['required', 'max:255'],
                'body'  => ['required'],
                'category_id' => ['required', 'integer'],
                'slug'  => ['required', 'alpha_dash', 'min:5', 'max:255', Rule::unique('posts')->ignore($post)]
            ]);

         return $attributes;
    }
}
