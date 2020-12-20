
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="logo"><a href="#">@if($head) {{ json_decode($head->content)->title }} @else Read @endif<span>@if($head) {{ json_decode($head->content)->subtitle }} @else it @endif</span>.</a></h2>
            <p>@if($head) {{ json_decode($head->content)->desc }} @else Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.@endif</p>
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


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>
