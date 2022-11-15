   <!-- Sidemenu -->
   <div class="main-sidebar main-sidebar-sticky side-menu">
       <div class="sidemenu-logo">
           <a class="main-logo" href="{{ url('home') }}">
               <img src="{{ URL::asset('assets/img/brand/logo2-light.png') }}" class="header-brand-img desktop-logo"
                   alt="logo">
               <img src="{{ URL::asset('assets/img/brand/icon-light.png') }}" class="header-brand-img icon-logo"
                   alt="logo">
               <img src="{{ URL::asset('assets/img/brand/logo2.png') }}"
                   class="header-brand-img desktop-logo theme-logo" alt="logo">
               <img src="{{ URL::asset('assets/img/brand/icon.png') }}" class="header-brand-img icon-logo theme-logo"
                   alt="logo">
           </a>
       </div>
       <div class="main-sidebar-body">
           <ul class="nav">
               @can('Dashboard')
                   <li class="nav-header"><span class="nav-label">Dashboard</span></li>
                   <li class="nav-item" disabled>
                       <a class="nav-link" href="{{ url('home') }}"><span class="shape1"></span><span
                               class="shape2"></span><i class="ti-home sidemenu-icon"></i><span
                               class="sidemenu-label">Dashboard</span></a>
                   </li>
               @endcan
               @can('Doctors Card')
                   <li class="nav-header"><span class="nav-label">Applications</span></li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ url('DoctorSearch') }}"><span class="shape1"></span><span
                               class="shape2"></span><i class="ti-server sidemenu-icon"></i><span
                               class="sidemenu-label">Doctors Card</span></a>
                   </li>
               @endcan
               @can('Settings')
                   <li class="nav-item">
                       <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                               class="shape2"></span><i class="ti-write sidemenu-icon"></i><span
                               class="sidemenu-label">Settings</span><i class="angle fe fe-chevron-right"></i></a>
                       <ul class="nav-sub">
                           @can('Doctors Table')
                               <li class="nav-sub-item">
                                   <a class="nav-sub-link" href="{{ url('doctors') }}">Doctors Table</a>
                               </li>
                           @endcan
                           @can('Appointments')
                               <li class="nav-sub-item">
                                   <a class="nav-sub-link" href="{{ url('appointments') }}">Appointments</a>
                               </li>
                           @endcan
                           @can('Sections')
                               <li class="nav-sub-item">
                                   <a class="nav-sub-link" href="{{ url('sections') }}">Sections</a>
                               </li>
                           @endcan
                           @can('Users list')
                               {{-- <li class="nav-sub-item">
                                   <a class="nav-sub-link" href="{{ url('users') }}">Users list</a>
                               </li> --}}
                           @endcan
                           @can('Permission')
                               <li class="nav-sub-item">
                                   <a class="nav-sub-link" href="{{ url('roles') }}">Permission</a>
                               </li>
                           @endcan
                       </ul>
                   </li>
               @endcan
           </ul>
       </div>
   </div>
   <!-- End Sidemenu -->
