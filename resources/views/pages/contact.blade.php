@extends('main')

@section('title', '| Contact')

@section('content')

      <div class="row">
        <div class="col-md">
          <h1>Contact Us</h1>          

          <form>
            <div class="form-group">            
              <label for="email">email: </label>
              <input type="email" class="form-control" placeholder="e.g. name@example.com">
            </div>

            <div class="form-group">            
              <label for="subject">subject: </label>
              <input type="text" class="form-control" placeholder="e.g. project title">
            </div>

            <div class="form-group">            
              <label for="Message">Message: </label>
              <textarea class="form-control" placeholder="e.g. Lorem ipsum dolor sit amet"></textarea>
            </div>

            <input type="submit" class='btn btn-success' value="Send Message">

          </form>
        </div>
      </div>

@endsection