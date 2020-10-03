@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h1 class="text-center text-uppercase" style="margin-top: 8rem;">Post</h1>
			<hr class="border"></hr>
		<div class="row" style="margin-top: 25px;">

			<div class="col-9">
		
			 @if(session('success'))
	    
	                    <div class="alert alert-success">
	                        {{ session('success') }}
	                    </div>

	         @endif
			 @if($errors->any())

	                    <div class="alert alert-danger">Whoops! Some Problem With Your File..Try Uploading Again
	                    @foreach($errors->all() as $error)
	                        <ul class="pt-2">
	                            <li>{{ $error }}</li>
	                        </ul>
	                    @endforeach
	                    </div>
	         @endif
			
			@if(count($post) > 0)
			@foreach($post as $p)
			<div class="card mb-4">
				 <div class="card-body">
				 	<div class="row">
				 		<div class="col-md-4">
				 			@if($p->post_img)

				 				<img src="{{ asset('/storage/postImages/'.$p->post_img) }}" style="width: 100%;">
				 			@else
				 				<img src="{{ asset('/storage/postImages/noimage.png') }}" style="width: 100%;">
				 			@endif
				 		</div>
				 		<div class="col-md-8">
						    <h4 class="card-title" style="margin: 0;">{{$p->title}}</h4>
						    <small>Written On : {{$p->created_at}}</small>

						    <span class="badge badge-dark">Author: {{ $p->name}}</span>

						    <span class="badge badge-dark">Category: {{ $p->category['cat_name'] }}</span>
						    <p class="card-text pt-4">{{ Illuminate\Support\Str::limit($p->body, 300) }}</p>
						   	<a href="/post/ {{ $p->id }}" class="btn btn-info">Read More</a>
					   	</div>
				   	</div>
				 </div>
			</div>
			
			@endforeach()
			@else
				<p class="text-danger text-center" style="font-size: 18px; margin-top: 20px; font-family: fantasy;">OpppS! Sorry Not Found Result..</p>
			@endif

			</div>
			<div class="col-3">
				<form action="/search" method="GET" style="margin-top: 50px;">
					<div class="input-group mb-3">
					  <input type="search" name="search" class="form-control" placeholder="Search by Post..">
					    <span class="input-group-prepend ">
					    	<button type="submit" class="btn btn-info">Search</button>
					    </span>
					 </div>
				</form>
			</div>
		</div>

		{{ $paginate->links() }}
	</div>

@endsection()



