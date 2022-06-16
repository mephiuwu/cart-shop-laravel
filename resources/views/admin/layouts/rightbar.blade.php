<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/')}}" class="mobile-logo"><img src={{ asset('admin/assets/images/logo.svg') }} class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <img src={{ asset('admin/assets/images/svg-icon/horizontal.svg') }} class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                    <img src={{ asset('admin/assets/images/svg-icon/verticle.svg') }} class="img-fluid menu-hamburger-vertical" alt="verticle">
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <img src={{ asset('admin/assets/images/svg-icon/collapse.svg') }} class="img-fluid menu-hamburger-collapse" alt="collapse">
                                    <img src={{ asset('admin/assets/images/svg-icon/close.svg') }} class="img-fluid menu-hamburger-close" alt="close">
                                 </a>
                             </div>
                        </li>                                
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="topbar">
        <div class="row align-items-center">
            <div class="col-md-12 align-self-center">
                <div class="togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                   <img src={{ asset('admin/assets/images/svg-icon/collapse.svg') }} class="img-fluid menu-hamburger-collapse" alt="collapse">
                                   <img src={{ asset('admin/assets/images/svg-icon/close.svg') }} class="img-fluid menu-hamburger-close" alt="close">
                                 </a>
                             </div>
                        </li>
                    </ul>
                </div>
                <div class="infobar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mt-2">
                            <div class="profilebar">
                                <div class="dropdown">
                                  <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('admin/assets/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="feather icon-chevron-down live-icon"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                        <div class="dropdown-item">
                                            <div class="profilename">
                                              <h5>{{ Auth::user()->name }}</h5>
                                            </div>
                                        </div>
                                        <div class="userbox">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media dropdown-item">
                                                    <a href="#" class="profile-icon"><img src="{{ asset('admin/assets/images/svg-icon/user.svg') }}" class="img-fluid" alt="user">Mi perfil</a>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <a href="{{route('home')}}" class="profile-icon"><img src="{{ asset('admin/assets/images/svg-icon/settings.svg') }}" class="img-fluid" alt="user">Tienda</a>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <a href="#" class="profile-icon"><img src="{{ asset('admin/assets/images/svg-icon/email.svg') }}" class="img-fluid" alt="email">Email</a>
                                                </li>                                                        
                                                <li class="media dropdown-item">
                                                    <a class="profile-icon" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        <img src="{{ asset('admin/assets/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout">
                                                        Salir
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                                   
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">@yield('title')</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                </div>                        
            </div>
        </div>          
    </div>
    <!-- End Breadcrumbbar -->
    @yield('rightbar-content')
    <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">© 2022 Ramiro - All Rights Reserved.</p>
        </footer>
    </div>
    <!-- End Footerbar -->
</div>