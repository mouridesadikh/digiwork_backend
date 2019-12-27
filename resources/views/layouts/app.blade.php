<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('/home_css/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('/home_css/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/home_css/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/home_css/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/home_css/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/home_css/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/home_css/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/home_css/css/aos.css') }}">
    <link href="{{ asset('/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/highlightjs/styles/github.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bracket.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('/home_css/css/style.css') }}">
    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #overlay{position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0,0, 0.6);
        }
    </style>
</head>
<body>
    <div id="app">
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


      
      
      @auth
      <div class="bg-primary py-3 top-bar shadow d-none d-md-block">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-md-left pl-0">
              <a href="#" class=" pr-3 pl-0">home</a>
              <a href="#" class="p-3">Events</a>
              <a href="#" class="p-3">Become A Volunteer</a>
            </div>
            <div class="col-md-6 text-md-right">
              <a href="#" class="p-3"><span class="icon-twitter"></span></a>
              <a href="#" class="p-3"><span class="icon-facebook"></span></a>
            </div>
          </div>
        </div>
      </div>
      @endauth
      <header class="site-navbar site-navbar-target bg-secondary shadow" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">
            

            <div class="site-logo">
              <a class="text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'DIGIWORK') }}
                </a>
            </div>


            <nav class="site-navigation text-left ml-auto " role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
            @auth
               <li class="active"><a href="{{route('home')}}" class="nav-link">Accueil</a></li>
                <li><a href="about.html" class="nav-link">Annonces</a></li>
                <li><a href="causes.html" class="nav-link">Je recherche un préstataire</a></li>
                <li><a href="contact.html" class="nav-link">Contact</a></li>
              
                <!-- Authentication Links -->
                @php $locale = session()->get('locale'); @endphp
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        @switch($locale)
                            @case('fr')
                            <img src="{{asset('img/fr.png')}}" width="30px" height="20x"> French
                            @break
                            @case('ge')
                            <img src="{{asset('img/ge.png')}}" width="30px" height="20x"> German
                            @break
                            @case('es')
                            <img src="{{asset('img/es.png')}}" width="30px" height="20x"> Spanish
                            @break
                            @case('in')
                            <img src="{{asset('img/in.png')}}" width="30px" height="20x"> Hindi
                            @break
                            @case('pk')
                            <img src="{{asset('img/pk.png')}}" width="30px" height="20x"> Urdu
                            @break
                            @default
                            <img src="{{asset('img/us.png')}}" width="30px" height="20x"> English
                        @endswitch
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="lang/en"><img src="{{asset('img/us.png')}}" width="30px" height="20x"> English</a>
                        <a class="dropdown-item" href="lang/fr"><img src="{{asset('img/fr.png')}}" width="30px" height="20x"> French</a>
                       
                    </div>
                </li>
                @endauth
                @guest
                <li>
                <a class="nav-link" href="{{ route('login') }}">@lang("login")</a>
                </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">@lang("register")</a>
                        </li>
                    @endif
                @else
                <li>
                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                               

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('editProfil') }}">Profil</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  
                                </div>
                 </li>
                 @endguest
            </ul>
            </nav>


            <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white"><span class="icon-menu h3 text-white"></span></a></div>

            

          </div>
        </div>

      </header>




            @yield('content')
       
             
    <footer class="site-footer bg-white">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-7">
                  <h2 class="footer-heading mb-4">About Us</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem modi, quaerat laborum id fugit blanditiis ratione delectus assumenda.</p>
  
                </div>
                <div class="col-md-4 ml-auto">
                  <h2 class="footer-heading mb-4">Features</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
  
              </div>
            </div>
            <div class="col-md-4 ml-auto">
  
              <div class="mb-5">
                <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
                <form action="#" method="post" class="footer-suscribe-form">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control rounded-0 border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                    </div>
                  </div>
              </div>
  
  
              <h2 class="footer-heading mb-4">Follow Us</h2>
              <a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </form>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="pt-5">
                <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
              </div>
            </div>
  
          </div>
        </div>
      </footer>
  
      </div>
  
        </div>
        <script src="{{asset('/home_css/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('/home_css/js/popper.min.js')}}"></script>
        <script src="{{asset('/home_css/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/home_css/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('/home_css/js/jquery.sticky.js')}}"></script>
        <script src="{{asset('/home_css/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('/home_css/js/jquery.animateNumber.min.js')}}"></script>
        <script src="{{asset('/home_css/js/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('/home_css/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{asset('/home_css/js/aos.js')}}"></script>
    
        <script src="{{asset('/home_css/js/main.js')}}"></script>
        <script src="{{ asset('js/app.js') }}" ></script> 

       {{-- import fichier js admin --}}
        <script src="{{asset('/lib/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
        <script src="{{asset('/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('/lib/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('/lib/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('/lib/highlightjs/highlight.pack.min.js')}}"></script>
        <script src="{{asset('/lib/jquery-steps/build/jquery.steps.min.js')}}"></script>
        <script src="{{asset('/lib/parsleyjs/parsley.min.js')}}"></script>
        
       <script>
      
       $(document).ready(function(){

      
        'use strict';
        

        $('#wizard1').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
        });

        $('#wizard2').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          onStepChanging: function (event, currentIndex, newIndex) {
            if(currentIndex < newIndex) {
              // Step 1 form validation
              if(currentIndex === 0) {
                var fname = $('#prenom').parsley();
                var lname = $('#nom').parsley();
                var img = $('#image').parsley();
                var sexe = $('#sexe').parsley();

                if(fname.isValid() && lname.isValid() && img.isValid() && sexe.isValid()) {
                  return true;
                } else {
                  fname.validate();
                  lname.validate();
                  img.validate();
                  sexe.validate();
                }
              }

              // Step 2 form validation
              if(currentIndex === 1) {
                var domaine = $('#domaine').parsley();
                var specialite = $('#specialite').parsley();
                if(domaine.isValid() && specialite.isValid()) {
                  return true;
                } else {
                     specialite.validate();
                     domaine.validate();
                     }
              }
            // Always allow step back to the previous step even if the current step is not valid.
            } else { return true; }
          }
        });

        $('#wizard3').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          stepsOrientation: 1
        });

        $('#wizard4').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard step-equal-width'
        });

        $('#wizard5').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard wizard-style-1'
        });

        $('#wizard6').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard wizard-style-2'
        });

        $('#wizard7').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          cssClass: 'wizard wizard-style-3'
        });

      });
      $(document).ready(function(){
                    $('#domaine').change(function(){
                     var data  = JSON.parse(this.value);
                     var html = "";
                     data.forEach(element=>{

                     html = html + "<option value='"+element.id+"'>"+element.libele+"</option>";
                     
                     });
                     
                     $('#specialite').html(html);
                     console.log(html);
                    
                   
                     
                     
                    });
                });   
      </script>

    </div>
</body>
</html>
