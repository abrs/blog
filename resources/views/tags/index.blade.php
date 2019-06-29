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
						<th></th>
					</tr>
				</thead>

				<tbody id="form-update-trick">
					@foreach($tags as $tag)

						<tr>
							<th>{{ $tag->id }}</th>
							<td><a href="{{route('tags.show', $tag->id)}}">{{ $tag->name }}</a></td>
							<td>
								<edit-a-tag action="{{route('tags.update', $tag->id)}}"></edit-a-tag>
							</td>
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
		<script>

			Vue.component('edit-a-tag', {
				props: ['action'],

				template: `
					<div>
						<button v-if="edit" @click="toggle()" class="btn btn-success btn-sm">Edit</button>
						<template v-if="visible">
							<form :action="action" method="post">
								@csrf
								@method('PATCH')

								<div class="form-group input-group">
									<input type="text" class="form-control" name="name" placeholder="To ??">
									<button type="submit" class="btn btn-success btn-sm">Save</button>
									<button @click="toggle()" class="btn btn-danger btn-sm">Cancel</button>
								</div>
							</form>
						</template>
					</div>
				`,

				data() {
					return {
						edit: true,
						visible: false
					}
				},

				methods: {
					toggle() {
						this.edit = !this.edit;
						this.visible = !this.visible;
					}
				}
			});

			new Vue({
				el: '#form-update-trick'

			})
		</script>
@endsection
