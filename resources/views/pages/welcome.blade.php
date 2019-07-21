@extends('main')

@section('title', '| Home')

@section('content')

      <div class="row">
        <div class="col-md">
          <div class="jumbotron">
            <h1 class="display-4">Welcome to my Blog!</h1>
            <p class="lead">Welcome I hope you enjoy diving in with blog your way of being what you want.</p>
            <hr class="my-4">
            <p>Our popular posts are pending for you.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">popular posts</a>
          </div>
        </div>
      </div>

      <!-- posts -->
      <div class="row">
        <div class="col-md-8">
          <div id="app">
            @foreach($posts as $post)
              <post-box href="{{route('blog.single', $post->slug)}}" post-title="{{$post->title}}" post-body="{{str_limit(strip_tags($post->body), 300)}}"></post-box>              
            @endforeach
          </div>
        </div>

        <!-- sidebar -->
        <div class="col-md-3 offset-md-1">
          <h2>Sidebar</h2>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in r mollit anim id est laborum.
        </div>
      </div>

@endsection

@section('scripts')
    <script src="{{asset("js/app.js")}}"></script>
@endsection
