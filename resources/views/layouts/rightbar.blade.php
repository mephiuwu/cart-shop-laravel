<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/')}}" class="mobile-logo"><img src={{ asset('assets/images/logo.svg') }} class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <img src={{ asset('assets/images/svg-icon/horizontal.svg') }} class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                    <img src={{ asset('assets/images/svg-icon/verticle.svg') }} class="img-fluid menu-hamburger-vertical" alt="verticle">
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <img src={{ asset('assets/images/svg-icon/collapse.svg') }} class="img-fluid menu-hamburger-collapse" alt="collapse">
                                    <img src={{ asset('assets/images/svg-icon/close.svg') }} class="img-fluid menu-hamburger-close" alt="close">
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
                                   <img src={{ asset('assets/images/svg-icon/collapse.svg') }} class="img-fluid menu-hamburger-collapse" alt="collapse">
                                   <img src={{ asset('assets/images/svg-icon/close.svg') }} class="img-fluid menu-hamburger-close" alt="close">
                                 </a>
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
                        <li class="breadcrumb-item"><a href="{{url('/juegos/')}}">Home</a></li>
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