@extends('main')

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ucfirst($post->title)}}</h1>
			<p class="lead">{!! ucfirst($post->body) !!}</p>
			<div class="tags">
				@foreach ($post->tags as $key => $tag)
					<span class="badge badge-pill badge-dark" style="font-size: 1em">
						{{$tag->name ?? "uncategorized"}}
					</span>
				@endforeach
			</div>

			<table class="table shadow p-3 mb-5 bg-light">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
					</tr>
				</thead>

				<tbody id='editComment'>
					@foreach ($post->comments as $comment)
						<tr>
							<td> {{$comment->name}} </td>
							<td> {{$comment->email}} </td>
							<td>
								<update-comment
									action="{{route('comments.update', $comment->id)}}"
									commento="{{$comment->comment}}"
									del="{{route('comments.destroy', $comment->id)}}">
								</update-comment>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<div class="shadow p-3 mb-5 bg-light">
				<dl>
					<dt>Url:</dt>
					<dd><a href="{{route('blog.single', $post->slug)}}">{{route('blog.single', $post->slug)}}</a></dd>
				</dl>

				<dl>
					<dt>Categorized as:</dt>
					<dd>{{$post->category->name ?? "uncategorized"}}</dd>
				</dl>

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
						<span onclick="javascript:document.querySelector('#deleteForm').submit()" class="btn btn-danger btn-block" style="cursor: pointer">Delete</span>
					</div>
				</div>

				<div class="row">
					<div class="col-sm">
						<a href="{{route('posts.index')}}" class="btn btn-light btn-block"><< See All Posts</a>
					</div>
				</div>
			</div>
		</div>

		<form id="deleteForm" method="post" action="{{route('posts.destroy', $post->id)}}" style="display: none">@csrf @method('DELETE')</form>
	</div>

@endsection

@section('scripts')
    <script src="{{asset("js/app2.js")}}"></script>
		<script>

			Vue.component('update-comment', {
				props: ['action', 'commento', 'del'],

				template: `
					<form :action="action" method="POST">
						@csrf
						@method('PATCH')
						<div class="input-group mb-3">
							<input type='text' name="comment" class="form-control" :disabled="disabled" :value="commento">
							<div class="input-group-append">
								<a class="btn btn-primary" style="cursor:pointer; color:#FFF" @click="toggleDisabled()"><i class="material-icons" v-text="edit"></i></a>
								<button type="submit" v-if="!disabled" class="btn btn-warning"><i class="material-icons">save</i></button>
								<form :action="del" method="POST"> @csrf @method('DELETE') <i class="material-icons"><button type="submit" class="btn btn-danger">delete</button></i></form>
							</div>
						</div>
					</form>
				`,

				data() {
					return {
						disabled: true,
						edit: 'edit'
					}
				},

				methods: {
					toggleDisabled() {
						this.disabled = !this.disabled;
						this.edit = this.edit == 'edit' ? 'cancel' : 'edit';
					}
			}
		});

			new Vue({
				el: '#editComment'

			});
		</script>
@endsection
