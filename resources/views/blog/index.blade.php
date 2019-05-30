@extends('main')

@section('title', '| Blog')

@section('content')
	
	<div class="row">
		<div class="col-md-8 mx-auto">
			
			<h1>Blog</h1>
		</div>
	</div>



	<div class="row">
		<div class="col-md-8 mx-auto">
			<div id="app">
				@foreach($posts as $post)

	              <post-box show-published="true" published="{{$post->created_at->diffForHumans()}}" href="{{route('blog.single', $post->slug)}}" post-title="{{$post->title}}" post-body="{{str_limit($post->body, 300)}}"></post-box>
				@endforeach
			</div>
		</div>
	</div>

	<div class="d-flex justify-content-center">
		{{$posts->links()}}
	</div>
@endsection

@section('scripts')
    <script src="{{asset("js/app.js")}}"></script>	
@endsection