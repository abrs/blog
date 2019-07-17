@extends('main')

@section('title', '| Edit Comment')

@section('content')
  <div class="row">
    <div class="col-md">
      <form action="{{route('comments.update', $comment->id)}}" method="post">
        <div class="form-group">
          <label for="comment">Comment</label>
          <div class="input-group mb-3">
            <input type="text" name="comment" class="form-control">
            <div class="input-group-append">
              <a class="input-group-text btn-success" href="{{route('comments.edit', $comment->id)}}">Edit</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
