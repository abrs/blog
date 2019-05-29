@if(session('success'))

	<toast-message title="Success">
		{{session('success')}}
	</toast-message>

@endif

@if($errors->any())

	@foreach($errors->all() as $error)
		<toast-message title="Error">
			{{$error}}
		</toast-message>
	@endforeach

@endif
