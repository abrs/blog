@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary">Create Post</a>
		</div>

		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>
					@foreach($posts as $post)

						<tr>
							<th> {{$post->id}} </th>

							<td> {{$post->title}} </td>

							<td> {{ str_limit(strip_tags($post->body), 50)}} </td>

							<td> {{$post->created_at->diffForHumans()}} </td>

							<td>
								<div class="row">
									<div class="col-md-6">
										<a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-block btn-warning">Edit</a>
									</div>
									<div class="col-md-6">
										<a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-block btn-info">View</a>
									</div>
								</div>
							</td>
						</tr>

					@endforeach
				</tbody>
			</table>

			<div class="d-flex justify-content-center">
			 {{ $posts->links() }}
			</div>
		</div>
	</div>

@endsection

@section('scripts')
    <script src="{{asset("js/app2.js")}}"></script>
@endsection
