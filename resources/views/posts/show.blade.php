@extends('layouts.app')

@section('content')
	
	<div class="container" style="margin-top: 100px;">

		<div class="jumbotron" style="margin-top: 4em">
		  <img src="{{ asset('/storage/postImages/'.$post->post_img) }}" style="width: 100%; min-height: 100px;">
		  <h3 style="margin: 0;">{{ $post->title }}</h3>
		  <small>{{ $post->created_at }}</small>
		  <p class="pt-4">{{ $post->body }}.</p>
		</div>

		<div> @comments(['model' => $post])</div>
		
	</div>
@endsection()