<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a class="logo logo-large"><img src={{ asset('assets/images/logo.svg') }} class="img-fluid" alt="logo"></a>
            <a class="logo logo-small"><img src={{ asset('assets/images/small_logo.svg') }} class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="javaScript:void();">
                      <img src={{ asset('assets/images/svg-icon/dashboard.svg') }} class="img-fluid" alt="dashboard"><span>Modulos</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('juegos.index')}}">Juegos</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>