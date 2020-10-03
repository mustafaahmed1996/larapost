<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top" style="z-index: 999;">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="{{ url('/') }}">
                    Blogs App
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                         <li class="nav-item">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/post" class="nav-link">Post</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">About </a>
                        </li>
                        

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                 
                            @endif
                        @else
                            <li class="nav-item">
                            <a href="/post/create" class="nav-link">Create Post</a>
                            </li>
                            <li class="nav-item">
                            <a href="/home" class="nav-link">My Account</a>
                            </li>
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->avatar)
                                    <img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile" style="width: 35px; height: 35px; border-radius: 50%;margin-top: -5px;">
                                    @else
                                        <img src="{{asset('/storage/images/default-avatar.png')}}" style="width: 40px; height: 40px; border-radius: 50%;" alt="NoImage">
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="/home" class="dropdown-item">{{ Auth::user()->name }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
            {{-- <div class="container">
                @if(session('success'))
    
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif            
            </div> --}}
    
            @yield('content')
        
    </div>
</body>
</html>
<style type="text/css">
    .border{
        width: 40%;
    }
    .navbar-brand{font-family: 'Raleway'; font-size: 22px; letter-spacing: 1.5px; font-weight: 900;}
    /*.overlay{position: absolute; background-color: #000; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.4;}*/
    .header{background-size: cover; background-position: center center;  position: relative; min-height: 600px;}
    .header .text-sec{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .header h1{font-size: 84px; font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: 900; color: #fff;}
    .header span{
        font-size: 24px;
        font-weight: 300;
        line-height: 1.1;
        display: block;
        margin: 10px 0 0;
        color: #fff;
        text-align: center;
        font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;
    }
    .header .overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: #212529;
        opacity: 0.4;
    }
    .navbar-light .navbar-nav .nav-link {
        color: #000 !important;
        font-size: 13px;
        font-family: sans-serif;
        padding-right: 18px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 500;
        line-height: 30px;
    }
    
    section{position: relative; margin-top: 8%;}
    
    .post-title{font-size: 40px; line-height: 50px; font-weight: 800; color: #000; font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif; text-decoration: none;}
    .post-body{margin-top: 1rem; color: #242424e6;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 28px; margin: 8px 0 0 0;}
    .post-date{font-family: font: unset; font-size: 18px;margin-top: 10px;}
    .footer{background-color: #000; }
    .footer h5{color: #fff; font-size: 18px; margin: 0; padding: 1.5rem 0;}
    .post{margin-bottom: 30px;}
    .post a{color: #000; transition: 0.5s all ease;}
    .post .post-title a:hover{color:#17a2b8; text-decoration: none;}
    hr.post-b{border:0; border-top: 1px solid rgba(0,0,0,0.2); margin: 2.2em 0;}

    .icons a i {
        color: #fff;
        background-color: #212529;
        font-size: 40px;
        border: 1px solid #000;
        border-radius: 50%;
        width: 75px;
        height: 75px;
        text-align: center;
        line-height: 70px;
        transition: 0.5s all ease;
    }
    .icons a {
        margin-left: 20px;
    }
    .icons a:hover i {
        background-color: #17a2b8;
        border: 0;
        transform: translateY(8px);
    }

</style>