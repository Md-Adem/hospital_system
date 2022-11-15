   <!-- Main Header-->
   <div class="main-header side-header sticky">
       <div class="container-fluid">
           <div class="main-header-left">
               <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
           </div>
           <div class="main-header-center">
               <div class="responsive-logo">
                   <a href="{{ url('index') }}"><img src="{{ URL::asset('assets/img/brand/logo2.png') }}"
                           class="mobile-logo" alt="logo"></a>
                   <a href="{{ url('index') }}"><img src="{{ URL::asset('assets/img/brand/logo2-light.png') }}"
                           class="mobile-logo-dark" alt="logo"></a>
               </div>
           </div>
           <div class="main-header-right">
               <div class="dropdown d-md-flex">
                   <a class="nav-link icon full-screen-link" href="">
                       <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                       <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                   </a>
               </div>
               <div class="dropdown main-profile-menu">
                   <a class="d-flex" href="">
                       @if (Auth::user()->status == 'male')
                           <span class="main-img-user"><img alt="avatar"
                                   src="{{ URL::asset('assets/img/users/profile-male.png') }}"></span>
                       @elseif (Auth::user()->status == 'female')
                           <span class="main-img-user"><img alt="avatar"
                                   src="{{ URL::asset('assets/img/users/profile-female.png') }}"></span>
                       @endif
                   </a>
                   <div class="dropdown-menu">
                       <div class="header-navheading">
                           <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
                           <p class="main-notification-text">{{ Auth::user()->department }}
                           </p>
                           <span class="badge badge-success">{{ Auth::user()->roles_name }}</span>
                       </div>
                       <a class="dropdown-item border-top" href="{{ url('profile') }}">
                           <i class="fe fe-user"></i> My Profile
                       </a>
                       <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                               class="fe fe-power"></i>{{ __('Logout') }}
                       </a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                   </div>
               </div>
               <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse"
                   data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                   aria-expanded="false" aria-label="Toggle navigation">
                   <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
               </button><!-- Navresponsive closed -->
           </div>
       </div>
   </div>
   <!-- End Main Header-->
