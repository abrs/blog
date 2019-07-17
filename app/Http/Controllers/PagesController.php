<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactForm;
use App\Post;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->take(4)->get();
    	return view('pages.welcome', compact('posts'));
    }

    public function about()
    {
    	return view('pages.about');
    }

    public function contact()
    {
    	return view('pages.contact');
    }

    public function SendContact()
    {
      Mail::to('mhmmdhi@hotmail')->send(new SendContactForm(request()));
      return redirect('/');
    }
}
