@extends('main')

@section('title', '| Edit Blog Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<form method="post" action="{{route('posts.update', $post->id)}}">
				@csrf
				@method('PATCH')

				<div class="form-group">
					<label for="title">Title: </label>
					<input  type="text" class="form-control" name="title" value="{{$post->title}}">
				</div>

				<div class="form-group">
					<label for="description">Body: </label>
					<textarea  class="form-control" name="body">{{$post->body}}</textarea>
				</div>				

				<div class="form-group">
					<label for="slug">Slug: </label>
					<input  type="text" class="form-control" name="slug" value="{{$post->slug}}">
				</div>
			</form>
			
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
						<a href="{{route('posts.show', $post->id)}}" class="btn btn-danger btn-block">Cancel</a>
					</div>

					<div class="col-sm-6">
						<span onclick="javascript:document.forms[0].submit()" class="btn btn-success btn-block" style="cursor: pointer">Save Changes</span>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
    <script src="{{asset("js/app2.js")}}"></script>
@endsection