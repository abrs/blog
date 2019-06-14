@extends('main')

@section('title', "| {$post->title}")

@section('stylesheets')
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 mx-auto">
			<h1>{{$post->title}}</h1>
			<p class="ranga-font">{{ $post->body, 223}}</p>
			<hr>
			<p>Posted in: {{ $post->category->name, 223}}</p>
		</div>
	</div>
@endsection
