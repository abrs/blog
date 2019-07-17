<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Category, Tag, Comment};

class Post extends Model
{
    protected $fillable = [

    	'title',
    	'body',
    	'slug',
      'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function addComment() {
      $this->comments()->create(
        request()->validate([
          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
          'comment' => 'required|min:5|max:2000'
        ])
      );

    }

}
