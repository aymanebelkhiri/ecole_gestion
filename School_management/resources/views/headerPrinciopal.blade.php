<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>@yield("titre")</title>
    
    <!-- Bootstrap core CSS -->
    <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{ url('css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ url('css/style3.css') }}">
<link rel="stylesheet" href="{{ url('css/owl2.css') }}">
<link rel="stylesheet" href="{{ url('css/lightbox.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<!--
    
TemplateMo 557 ISGI

https://templatemo.com/tm-557-grad-school

-->
<style>
        /* The Modal (background) */
        body a{
          text-decoration: none;

        }

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  
  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
  }
  
  /* Add Animation */
  @-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
  }
  
  @keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }
  
  /* The Close Button */
  .close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
    color: white;
    text-decoration: none;
    /* cursor: pointer; */
  }
  
  .modal-header {
    padding: 2px 16px;
    background-color:  rgba(22,34,57,0.99);
    color: white;
    padding: 10px;
  }
  
  .modal-body {padding: 20px 16px;}
  
  .modal-footer {
    padding: 2px 16px;
    background-color: rgba(22,34,57,0.99);
    color:white;
    }


        /* The Modal (background) */
.modal2 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  
  /* Modal Content */
  .modal-content2 {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop2;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop2;
    animation-duration: 0.4s
  }
  
  /* Add Animation */
  @-webkit-keyframes animatetop2 {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
  }
  
  @keyframes animatetop2 {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }
  
  /* The Close Button */
  .close2 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  
  .close2:hover,
  .close2:focus {
    color: white;
    text-decoration: none;
    /* cursor: pointer; */
  }
  
  .modal-header2 {
    padding: 2px 16px;
    background-color:  rgba(22,34,57,0.99);
    color: white;
    padding: 10px;
  }
  
  .modal-body2 {padding: 20px 16px;}
  
  .modal-footer2 {
    padding: 2px 16px;
    background-color: rgba(22,34,57,0.99);
    color:white;
    }

    </style>
  </head>

<body>

   
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="{{route('home')}}"><svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 24 24" style="margin-top: -10px"><path fill="#EB1616" d="m12 21l-7-3.8v-6L1 9l11-6l11 6v8h-2v-6.9l-2 1.1v6zm0-8.3L18.85 9L12 5.3L5.15 9zm0 6.025l5-2.7V12.25L12 15l-5-2.75v3.775zm0-3.775"/></svg> <em> IS</em>GI</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="{{route('courses')}}" class="external">DISCOVER ALL BRANCHS</a></li>
        <li><a href="{{route('about')}}" class="external">About ISGI</a></li>
        <li><a href="{{ route('Contact') }}" class="external">Contact</a></li>
        @if (Route::has('login'))
            
                @auth
                <li>
                  @if(auth()->check())
                      @if(auth()->user()->role === 'admin')
                          <a href="{{ route('events.index')}}" class="external">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                  <path fill="white" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/>
                              </svg>
                          </a>
                      @elseif(auth()->user()->role === 'etudiants')
                          <a href="{{ route('etudiant') }}" class="external">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                  <path fill="white" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/>
                              </svg>
                          </a>
                      @elseif(auth()->user()->role === 'profs')
                          <a href="{{ route('prof') }}" class="external">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                  <path fill="white" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/>
                              </svg>
                          </a>
                      @endif
                  @endif

                </li>
                <li>
                  <a class="external" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                @else
                <li><a  href="{{ route('login') }}" class="external">Connect</a></li>

                    <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif -->
                @endauth
            @endif
        
      </ul>
    </nav>
  </header>

  <!-- modal -->
    <!-- The Modal -->
    <div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header" >
      <h4>Login</h4>
    <span class="close">&times;</span>
  </div>
  <div class="modal-body"><br>
      <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end text-dark">{{ __('Email Address') }}</label>

              <div class="col-md-6">
                  <input id="email" type="email" placeholder="UserName@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

              <div class="col-md-6">
                  <input id="password" type="password" placeholder="****************" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </div>
              </div>
          </div>

          <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn " style="background-color:#f5a425;color:white;">
                      {{ __('Login') }}
                  </button>

                  @if (Route::has('password.request'))
                      <a class="btn btn-link" id="myBtn2" style="color:rgba(22,34,57,0.99);" >
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
              </div>
          </div>
      </form><br>
  </div>
  <!-- <div class="modal-footer">
    <br><br>
  </div> -->
  
</div>
  <!-- modal -->
    <!-- The Modal -->
    <div id="myModal2" class="modal">

<!-- Modal content -->
<div class="modal-content2">
  <div class="modal-header2" >
      <h4>Reset Password</h4>
    <span class="close2">&times;</span>
  </div>
  <div class="modal-body2"><br>
  <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row mb-3">
                          3 a 6 ()
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color:#f5a425;color:white;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
  </div>
  <!-- <div class="modal-footer2">
    <br><br>
  </div> -->
  
</div>
    </div>
</div>
    @yield("content")
    <!-- Footer Start -->
    <div class="container-fluid  footer  wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
          <div class="row g-5">
              <div class="col-lg-3 col-md-6">
                  <h4 class="text-white mb-3">Quick Link</h4>
                  <a class="btn btn-link" href="">About Us</a>
                  <a class="btn btn-link" href="">Contact Us</a>
                  <a class="btn btn-link" href="">Privacy Policy</a>
                  <a class="btn btn-link" href="">Terms & Condition</a>
                  <a class="btn btn-link" href="">FAQs & Help</a>
              </div>
              <div class="col-lg-3 col-md-6">
                  <h4 class="text-white mb-3">Contact</h4>
                  <p class="mb-2 text-white   "><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                  <p class="mb-2 text-white   "><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                  <p class="mb-2 text-white   "><i class="fa fa-envelope me-3"></i>info@example.com</p>
                  <div class="d-flex pt-2">
                      <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                      <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                      <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                      <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <h4 class="text-white mb-3">Gallery</h4>
                  <div class="row g-2 pt-2">
                      <div class="col-4">
                          <img class="img-fluid bg-light p-1" src="{{url('images/course-1.jpg')}}" alt="">
                      </div>
                      <div class="col-4">
                          <img class="img-fluid bg-light p-1" src="{{url('images/course-2.jpg')}}" alt="">
                      </div>
                      <div class="col-4">
                          <img class="img-fluid bg-light p-1" src="{{url('images/course-3.jpg')}}" alt="">
                      </div>
                      <div class="col-4">
                          <img class="img-fluid bg-light p-1" src="{{url('images/course-2.jpg')}}" alt="">
                      </div>
                      <div class="col-4">
                          <img class="img-fluid bg-light p-1" src="{{url('images/course-3.jpg')}}" alt="">
                      </div>
                      <div class="col-4">
                          <img class="img-fluid bg-light p-1" src="{{url('images/course-1.jpg')}}" alt="">
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="copyright">
              <div class="row">
                  <div class="col-md-6 text-center text-white text-md-start mb-3 mb-md-0">
                      &copy; <a class="border-bottom" style="color: red" href="#">ISGI</a>, All Right Reserved.

                      Designed By <a class="border-bottom" >ISGI Students</a><br><br>
                  </div>
                  <div class="col-md-6 text-center text-md-end">
                      <div class="footer-menu">
                          <a href="">Home</a>
                          <a href="">Cookies</a>
                          <a href="">Help</a>
                          <a href="">FQAs</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Footer End -->
<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ url('js/isotope.min.js') }}"></script>
<script src="{{ url('js/owl-carousel.js') }}"></script>
<script src="{{ url('js/lightbox.js') }}"></script>
<script src="{{ url('js/tabs.js') }}"></script>
<script src="{{ url('js/video.js') }}"></script>
<script src="{{ url('js/slick-slider.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>
<!-- Custom script -->
<script src="{{ asset('js/msg.js') }}"></script>

    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
          if($(e.target).hasClass('external')) {
            return;
          }
          e.preventDefault();
          $('#menu').removeClass('active');
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>

    <!-- modal -->
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
    <!-- modal -->
    <script>
    // Get the modal
    var modal2 = document.getElementById("myModal2");
    
    // Get the button that opens the modal
    var btn2 = document.getElementById("myBtn2");
    
    // Get the <span> element that closes the modal
    var span2 = document.getElementsByClassName("close2")[0];
    
    // When the user clicks the button, open the modal 
    btn2.onclick = function() {
      modal2.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span2.onclick = function() {
      modal2.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal2) {
        modal2.style.display = "none";
      }
    }
    </script>
</body>
</html>