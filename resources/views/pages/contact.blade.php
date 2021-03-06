@extends('main')

@section('stylesheets')
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script>
		tinymce.init({
		  selector: "textarea",
			menubar: false
	});
</script>
@endsection

@section('title', '| Contact')

@section('content')

      <div class="row">
        <div class="col-md">
          <h1>Contact Us</h1>

          <form action="{{ url('/contact') }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="email">email: </label>
              <input type="email" name='mail' class="form-control" placeholder="e.g. name@example.com">
            </div>

            <div class="form-group">
              <label for="subject">subject: </label>
              <input type="text" name='subject' class="form-control" placeholder="e.g. project title">
            </div>

            <div class="form-group">
              <label for="Message">Message: </label>
              <textarea class="form-control" name="message" placeholder="e.g. Lorem ipsum dolor sit amet"></textarea>
            </div>

            <input type="submit" class='btn btn-success' value="Send Message">

          </form>
        </div>
      </div>

@endsection
