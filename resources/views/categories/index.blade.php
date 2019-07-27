@extends('main')

@section('title', '| Categories')

@section('content')

	<div id='addCategory' class="row">
		<div class="col-md-8">

			<table class="table">

				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th><span @click='refresh()' class="badge badge-dark" style="cursor: pointer">Refresh</span></th>
					</tr>
				</thead>

				<tbody>
					{{-- @foreach($categories as $category) --}}

					<template v-for="category in categories">
						<tr>
							<th v-text='category.id'></th>
							<td v-text='category.name'></td>
						</tr>
					</template>

					{{-- @endforeach --}}
				</tbody>
			</table>
		</div>

		<div class="col-md-4">

			<div class="card">

				<h2 class="card-header">New Categories</h2>
				<form class="card-body" action="{{ route('categories.store') }}" method="POST" @submit.prevent='addCategory()'>
					@csrf

					<div class="form-group">
						<label>Category name</label>
						<input type="text" name="name" class="form-control" v-model='category'/>
						<input type="submit" style="margin-top: .6em" class="btn btn-primary btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    <script src="{{asset("js/app2.js")}}"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script>

			new Vue({
				el: '#addCategory',

				data: {
					category: '',
					categories: []
				},

				mounted() {
					axios.get('cag').then(response => this.categories = response.data);
				},

				methods: {
					addCategory() {
						axios.post('{{ route('categories.store') }}', {name: this.category});
						this.category = '';
					},

					refresh() {
						 axios.get('cag').then(response => this.categories = response.data);
					}
				}
			});
		</script>
@endsection
