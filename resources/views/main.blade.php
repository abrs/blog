<!doctype html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>
  <body>

    @include('partials._nav')

    <!-- Container -->
    <div class="container" style="margin-top:1em">

      <span id="app2">
        @include('partials._messages')
      </span>

      @yield('content')

      @include('partials._footer')
    </div><!-- end of container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    @include('partials._javascript')
    @yield('scripts')
  </body>
</html>
