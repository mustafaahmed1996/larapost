@extends('layouts.app')

@section('content')
   
   <div class="header" style="background-image: url('/storage/images/home-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="text-sec" style="z-index: 55;">
                <h1>Clean Blog</h1>
                <span>A Blog Theme By Mustafa Ahmed..</span>
            </div>
       </div> 
   </div>

   <section>
   		<div class="container">
   			<div class="row">
   				<div class="col-lg-8 col-md-10 mx-auto">
   					
   						<div class="post">
	   						<h2 class="post-title"><a href="#">Man must explore, and this is exploration at its greatest</a></h2>
				   			<p class="post-body">Problems look mighty small from 150 miles up...</p> 
				   		  <span class="post-date">Posted by <strong>Start Bootstrap</strong> on September 24, 2019 </span>
                <hr class="post-b"></hr>
			   		  </div>

              <div class="post">
                <h2 class="post-title"><a href="#">Man must explore, and this is exploration at its greatest</a></h2>
                <p class="post-body">Problems look mighty small from 150 miles up...</p> 
                <span class="post-date">Posted by <strong>Start Bootstrap</strong> on September 24, 2019 </span>
                <hr class="post-b"></hr>
              </div>
              <div class="post">
                <h2 class="post-title"><a href="#">Man must explore, and this is exploration at its greatest</a></h2>
                <p class="post-body">Problems look mighty small from 150 miles up...</p> 
                <span class="post-date">Posted by <strong>Start Bootstrap</strong> on September 24, 2019 </span>
                <hr class="post-b"></hr>
              </div>
   				</div>
   			</div>
   		</div>
   </section>

    <div class="container">
      <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
             <div class="icons">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
             </div>
         </div>
       </div>
     </div>
   <section>
   		<div class="footer">
   			<div class="container">
   				<h5 class="text-center"> <strong >&copy;2020:</strong> By Mustafa</h5>
   			</div>
   		</div>
   </section>
@endsection

   
