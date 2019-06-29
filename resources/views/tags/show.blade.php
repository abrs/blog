@extends('main')

@section('title', " | {$tag->name}")

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1 style="display:inline-block">{{ $tag->name }} </h1><small class="badge"><sub>{{$tag->posts()->count()}} Post</sub></small>
    </div>
    <div class="col-md-2">
      <a href="{{route('tags.index')}}" class="btn btn-block btn-primary">Edit</a>
    </div>
    <div class="col-md-2">
      <form action="{{route('tags.destroy', $tag->id)}}" method="post">@csrf @method('DELETE') <button type="submit" class="btn btn-block btn-danger">Delete</button></form>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Tags</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
            @foreach ($tag->posts as $post)
              <tr>
                <th>{{$post->id}}</th>
                <td>
                  {{$post->title}}
                </td>
                <td>
                  @foreach ($post->tags as $tag)
                    <a href="{{route('tags.show', $tag->id)}}" class="badge badge-dark">{{$tag->name}}</a>
                  @endforeach
                </td>
              <td>
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-light btn-sm">View</a>
              </td>
            </tr>
          @endforeach
        </tbody>

      </table>
    </div>
  </div>
@endsection
