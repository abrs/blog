<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
          'name' => ['required', 'max:255']
        ]);

        $tag = Tag::create($attributes);

        session()->flash('success', $tag->name . ' is saved..');

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
      $attributes = request()->validate([
        'name' => ['required', 'max:255']
      ]);

      $tag_name = $tag->name;

      $tag->update($attributes);

      session()->flash('success', $tag_name . ' updated to ' . $tag->name);

      return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {

        $tag_name = $tag->name;

        $tag->posts()->detach();
        $tag->delete();

        session()->flash('success', $tag_name . 'has been deleted..');

        return redirect()->route('tags.index');
    }
}
