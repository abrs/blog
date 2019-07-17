<?php

namespace App\Http\Controllers;

use App\{Comment, Post};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Post $post) {

 			$post->addComment();

 			session()->flash('success', 'your comment has been submitted.');

 			return redirect()->route('blog.single', $post->slug);
 		}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $attributes = request()->validate(['comment' => 'required|min:5|max:2000']);
        $comment->update($attributes);

        session()->flash('success', 'your comment has been updated successfully.');
        return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        session()->flash('success', 'your comment has been deleted successfully.');
        return redirect()->route('posts.show', $comment->post->id);
    }
}
