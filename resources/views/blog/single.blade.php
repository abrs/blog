@extends('main')

@section('title', "| " . htmlspecialchars($post->title))

@section('stylesheets')
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 mx-auto">
			<h1>{{$post->title}}</h1>
			@if($post->image)
				<img style="box-shadow:.1em .2em; width: 100%" src="{{ asset('images\\' . $post->image) }}" alt="Post Image">
			@endif
			<p class="ranga-font">{!! $post->body !!}</p>
			<hr>
			<p>Posted in: {{ $post->category->name ?? "uncategorized"}}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 offset-md-2">
			<form action="{{route('comments.store', $post->id)}}" method="post">
				@csrf

				<div class="row">
					<div class="form-group col-md">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control">
					</div>

					<div class="form-group col-md">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-md form-group">
						<label for="comment">Comment</label>
						<textarea class="form-control" name="comment" rows="8" ></textarea>
						<input class="btn btn-success btn-block" type="submit" value="Comment">
					</div>
				</div>

			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 offset-md-2 shadow p-3 mb-5 bg-light">
			<h1>Comments</h1>
			@foreach ($post->comments as $comment)
				<h3 class="ranga-font">{{$comment->name . ':  ' . $comment->comment}}</h3>
			@endforeach
		</div>
	</div>
@endsection

@section('scripts')
    <script src="{{asset("js/app2.js")}}"></script>
@endsection
