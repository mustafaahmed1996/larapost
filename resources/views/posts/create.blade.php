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
		<form action="{{ route('post.store') }}" method = "post" enctype="multipart/form-data">
			@csrf
			  <div class="form-group">
			    <label>Author Name:</label>
			    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Author..">
			  </div>
			  @error('name')
				<div class="text-danger">{{ $message }}</div>
			  @enderror
			  <div class="form-group">
			    <label>Title:</label>
			    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title">
			  </div>
			@error('title')
				<div class="text-danger">{{ $message }}</div>
			@enderror
			  <div class="form-group">
			    <label>Body:</label>
			    <textarea class="form-control @error('body') is-invalid @enderror" name="body" placeholder="Enter Your Post Body.." rows="7"></textarea>
			  </div>
			  @error('body')
			  	<div class="text-danger">{{ $message }}</div>
			  @enderror

			  <select class="form-control mb-4" name="category_id">
			  	<option>--Select Category--</option>
			  	@foreach($cat as $value)
			  		<option value="{{ $value->id }}">{{ $value->cat_name }}</option>
			  	@endforeach
			  </select>

			  <input type="file" name="image"> <span>Upload Post Image...</span><br><br>

			 <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection