@extends('main')

@section('title', "| {$post->title}")

@section('stylesheets')
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 mx-auto">
			<h1>{{$post->title}}</h1>
			<p class="ranga-font">{{ $post->body}}</p>
			<hr>
			<p>Posted in: {{ $post->category->name ?? "uncategorized"}}</p>
		</div>
	</div>
@endsection
