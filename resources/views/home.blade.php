@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                <div class="card-header">{{ __('Dashboard') }}</div>
    
                <h5 class="text-center pt-4 pb-4">Upload Your Profile Image..!</h5>

                <div class="text-center pb-4">
                    <form method="post" action="/upload" enctype="multipart/form-data">
                    @csrf    
                        <input type="file" name="image">

                        <input type="submit" value="Upload">

                       

                    </form>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                    @if($posts->count() > 0)

                    @foreach($posts as $post)
                        <div class="row " style="margin-bottom: 3rem;">
                            <div class="col-4">

                                <img src="{{ asset('/storage/postImages/'.$post->post_img) }}" style="width: 100%">
                            </div>
                            <div class="col-8">
                                <h4>{{ $post->title }}</h4>
                                <small class="badge badge-secondary">Name: {{ Auth::user()->name }}</small>
                                <small class="badge badge-dark">Category:{{$post->category['cat_name']}}</small>
                                <small class="badge badge-light">Created at: {{ $post->created_at }}</small>
                                <p>{{ Illuminate\Support\str::limit($post->body, 200) }}</p>

                            <form action="{{ route('post.destroy', $post->id) }}" method = "POST">
                        
                      
                                <a href="/post/{{$post->id}}" class="btn btn-info">Read Post</a>
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Edit</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                    @else
                        <h6 class="text-center text-dark">No Post Found.. <a class="text-info" href="/post/create">Create One</a></h6>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
