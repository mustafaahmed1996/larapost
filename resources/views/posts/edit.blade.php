@extends('layouts.app')

@section('content')
	
	<div class="container" style="margin-top: 100px;">
		<h2 class="text-center pt-4 pb-2 text-info text-uppercase">Create Your Post Now</h2>
		<hr class="border">

		{{-- @if ($errors->any())
		    <div class="alert alert-danger">
		        <strong>Whoops!</strong> There were some problems with your input.<br><br>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif --}}


		<!--form-->
		<form action="{{ route('post.update', $post->id) }}" method = "post" >
			@csrf
			@method('PUT')
			  <div class="form-group">
			    <label>Title:</label>
			    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title" value="{{$post->title}}">
			  </div>
			@error('title')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			  <div class="form-group">
			    <label>Body:</label>
			    <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="7">{{$post->body}}</textarea>
			  </div>
			  @error('body')
			  	<div class="alert alert-danger">{{ $message }}</div>
			  @enderror

			  <select class="form-control mb-4" name="category_id">
			  	<?php $selectValue = $post->category_id  ?>
			  		@foreach($cat as $value)
			  			<option value="{{ $value->id }}" {{$selectValue == $value->id ? 'selected = "selected"' : ''}}>{{ $value->cat_name }}</option>
			  		@endforeach
			  </select>
			 <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection