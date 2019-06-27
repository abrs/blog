@extends('main')

@section('title', '| Tags')

@section('content')

	<div class="row">
		<div class="col-md-8">

			<table class="table">

				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach($tags as $tag)

						<tr>
							<th>{{ $tag->id }}</th>
							<td>{{ $tag->name }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-4">

			<div class="card">

				<h2 class="card-header">New Tags</h2>
				<form class="card-body" action="{{ route('tags.store') }}" method="POST">
					@csrf

					<div class="form-group">
						<label>Tag name</label>
						<input type="text" name="name" class="form-control" />
						<input type="submit" style="margin-top: .6em" class="btn btn-primary btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    <script src="{{asset("js/app2.js")}}"></script>
@endsection
