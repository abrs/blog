<!-- Bootstrap navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Laravel Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{request()->is("/") ? "active" : ""}}">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item {{request()->is("blog") ? "active" : ""}}">
        <a class="nav-link" href="/blog">Blog</a>
      </li>
      <li class="nav-item {{request()->is("about") ? "active" : ""}}">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item {{request()->is("contact") ? "active" : ""}}">
        <a class="nav-link" href="/contact">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav">

      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
            <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
            <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" style="cursor: pointer;" onclick="javascript:document.querySelector('#logout-form').submit()">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
 </div>
</nav> <!-- end of navbar -->
