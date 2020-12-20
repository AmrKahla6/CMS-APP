<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CMS APP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body>

	  <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('homepage')}}">CMS<i>APP</i>.</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="{{route('homepage')}}" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

   <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          	<p class="mb-5">
              <img src="{{asset('images/posts/'.$post->image)}}" alt="" class="img-fluid">
            </p>
            <h2 class="mb-3">{{$post->title}}</h2>
            <p>{!! $post->content !!}</p>
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                  @foreach($post->tags as $tag)
                <a href="#" class="tag-cloud-link">{{$tag->name}}</a>
                  @endforeach
              </div>
            </div>

            <div class="about-author d-flex p-4 bg-light">
                <div class="bio mr-5">
                    <img src="{{asset('images/person_7.jpg')}}" alt="Image placeholder" class="img-fluid mb-4 img-thumbnail" height="100px" width="100px">
                </div>
                <div class="desc">
                    <h3>{{$user->name}}</h3>
                    <p>@if($profile) {{$profile->about}} @else No Information @endif</p>
                </div>
            </div>




          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">

            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                @foreach($categories as $category)
                <li> {{$category->name}} <span class="ion-ios-arrow-forward"></span></li>
                @endforeach
              </div>
            </div>

            <?php use App\Tag;
               $tags = Tag::select('id' , 'name')->orderBy('id')->get();
            ?>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
                  @foreach ($tags as $tag)
                  <a class="tag-cloud-link">{{ $tag->name }}</a>
                  @endforeach
              </div>
            </div>


        </div>
      </div>
    </section> <!-- .section -->
          @php
              use App\Setting;
              $setting = Setting::first();
          @endphp
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="logo"><a href="#">Read<span>it</span>.</a></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="{{ $setting->twitter }}"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="{{ $setting->fb }}"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="{{ $setting->instegram }}"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">latest News</h2>
              @php
                  use App\Post;

                  $posts = Post::select('id' , 'title' , 'description' , 'created_at' , 'image')->orderBy('created_at' , 'DESC')->paginate(2);
              @endphp
              @foreach ($posts as $post)
                <div class="block-21 mb-4 d-flex">
                    <img class="img mr-4 rounded" src="{{ asset('images/posts/'.$post->image) }}"></img>
                    <div class="text">
                    <h3 class="heading"><a  href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></h3>
                    <div class="meta">
                        <div><a href="#"></span>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}  </a></div>
                        {{-- <div><a href="#"></span> Admin</a></div> --}}
                        <div><a href="#"></span> {{$post->created_at->diffForHumans()}}</a></div>
                    </div>
                    </div>
                </div>
             @endforeach
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('homepage') }}" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Home</a></li>
                <li><a href="{{ route('contact') }}" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">{{ $setting->adderss }}<</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ $setting->phone }}</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ $setting->website }}</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>
  <script src="{{asset('js/google-map.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

  </body>
</html>
