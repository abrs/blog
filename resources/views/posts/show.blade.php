@extends('main')

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ucfirst($post->title)}}</h1>
			<p class="lead">{{ucfirst($post->body)}}</p>
		</div>

		<div class="col-md-4">
			<div class="shadow p-3 mb-5 bg-light">
				<dl>
					<dt>Created At:</dt>
					<dd>{{date('M j, Y h:i a', strtotime($post->created_at))}}</dd>
				</dl>

				<dl>
					<dt>Last Uploaded:</dt>
					<dd>{{date('M j, Y h:i a', strtotime($post->created_at))}}</dd>
				</dl>

				<hr>

				<div class="row">
					<div class="col-sm-6">
						<a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
					</div>

					<div class="col-sm-6">
						<span onclick="javascript:document.forms[0].submit()" class="btn btn-danger btn-block" style="cursor: pointer">Delete</span>
					</div>					
				</div>

				<div class="row">
					<div class="col-sm">
						<a href="{{route('posts.index')}}" class="btn btn-light btn-block"><< See All Posts</a>
					</div>
				</div>
			</div>
		</div>

		<form method="post" action="{{route('posts.destroy', $post->id)}}" style="display: none">@csrf @method('DELETE')</form>
	</div>

@endsection