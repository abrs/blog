@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script>
		tinymce.init({
		  selector: "textarea",
			menubar: false
	});
</script>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			<form id="editPost" method="post" action="{{route('posts.update', $post->id)}}">
				@csrf
				@method('PATCH')

				<div class="form-group">
					<label for="title">Title: </label>
					<input  type="text" class="form-control" name="title" value="{{$post->title}}">
				</div>

				<div class="form-group">
					<label for="slug">Slug: </label>
					<input  type="text" class="form-control" name="slug" value="{{$post->slug}}">
				</div>

				<div class="form-group">
					<label for="category_id">Category: </label>
					<select class="form-control" name="category_id">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}" {{ $category->id === $post->category_id ? "selected" : ""}}>{{ $category->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="tags">Tags: </label>

					<select class="form-control multiple-tags" name="tags[]" multiple>
						{!! $matchedTag = false !!}
						@foreach ($tags as $tag)
							@foreach ($post->tags as $selectedTag)
								@break($matchedTag = $tag->id === $selectedTag->id)
							@endforeach
							<option value="{{ $tag->id }}" {{ $matchedTag ? "selected" : "" }}>{{ $tag->name }}</option>
							{!! $matchedTag = false !!}
						@endforeach
					</select>

				</div>

				<div class="form-group">
					<label for="description">Body: </label>
					<textarea  class="form-control" name="body">{{$post->body}}</textarea>
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
						<span onclick="javascript:document.querySelector('#editPost').submit()" class="btn btn-success btn-block" style="cursor: pointer">Save Changes</span>
					</div>
				</div>
			</div>
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
