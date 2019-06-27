@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 offset-md-2">

			<h1>Create New Post</h1>

			<form method="post" action="{{route('posts.store')}}">
				@csrf

				<div class="form-group">
					<label for="title">Title: </label>
					<input  type="text" class="form-control" name="title" placeholder="e.g. post title" value="{{old('title')}}">
				</div>

				<div class="form-group">
					<label for="slug">slug: </label>
					<input  type="text" class="form-control" name="slug" placeholder="e.g. nature-post" value="{{old('slug')}}">
				</div>

				<div class="form-group">
					<label for="category_id">Category: </label>
					<select class="form-control" name="category_id">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="tags">Tags: </label>
					<select class="form-control multiple-tags" name="tags[]" multiple>
						@foreach ($tags as $tag)
							<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="body">Body: </label>
					<textarea  class="form-control" name="body" placeholder="e.g. post body">{{old('body')}}</textarea>
				</div>

				<input type="submit" class="btn btn-success btn-lg btn-block" value="Create Post">
			</form>

		</div>

	</div>
@endsection

@section('scripts')
    <script src="{{asset("js/app2.js")}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
		<script>
			$('.multiple-tags').select2();
		</script>
@endsection
