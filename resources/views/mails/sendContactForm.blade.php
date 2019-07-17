@component('mail::message')
# Hello

<h1>{{$request->input('subject')}}.</h1>

<p>{{$request->input('message')}}.</p>

Thanks,<br>
{{ $request->input('mail') }}
@endcomponent
