@extends('layouts.app')


@section('content')

	<div class="container">
		@if($errors->any())
			<div class="alert alert-danger">
				<span>Whoops! Something Went Wrong!</span>
				@foreach($errors->all() as $error)
				<ul>
					<li>{{ $error }}</li>
				</ul>
				@endforeach
			</div>
		@endif
		<h3>Create Categories</h3>
		<form action="/category/store" method="post">
			@csrf
			  <div class="form-group">
			    <label>Category Name:</label>
			    <input type="text" class="form-control" name="cat_name" placeholder="Create Categories..">
			  </div>
			  <button type="submit" class="btn btn-primary">Create Category</button>		   
		</form>

		<h5 class="mt-4">List Of Categories...!</h5>
		
		
		@foreach($category as $cat)
		
		    <ul>
		    	<li>{{$cat->cat_name}}</li>
		    </ul>
		  
		@endforeach
			
	</div>



@endsection