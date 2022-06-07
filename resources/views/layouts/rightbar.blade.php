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
                <div class="infobar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="notifybar">
                                <div class="dropdown">
                                    <a class="dropdown-toggle infobar-icon" href="#" role="button" id="cartShop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/svg-icon/ecommerce.svg')}}" class="img-fluid" alt="cartShop">
                                    <span class="live-icon"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" style="width: 455px" aria-labelledby="cartShop">
                                        <div class="notification-dropdown-title">
                                            <h4>Carrito</h4>                            
                                        </div>
                                        <ul class="list-unstyled" id="listCart">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item mt-2">
                            <div class="profilebar">
                                <div class="dropdown">
                                  <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="feather icon-chevron-down live-icon"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                        <div class="dropdown-item">
                                            <div class="profilename">
                                              <h5>{{ Auth::user()->name }}</h5>
                                            </div>
                                        </div>
                                        <div class="userbox">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media dropdown-item">
                                                    <a href="#" class="profile-icon"><img src="{{ asset('assets/images/svg-icon/user.svg') }}" class="img-fluid" alt="user">Mi perfil</a>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <a href="#" class="profile-icon"><img src="{{ asset('assets/images/svg-icon/email.svg') }}" class="img-fluid" alt="email">Email</a>
                                                </li>                                                        
                                                <li class="media dropdown-item">
                                                    <a class="profile-icon" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        <img src="{{ asset('assets/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout">
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

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>

<script>
    $(document).ready(function () {
        refreshCart();
    });

    function refreshCart(){
        $.ajax({
            type: "get",
            url: "/store/refreshCart",
            dataType: "json",
            success: function (response) {
                let { data, total } = response;
                
                let formatter = new Intl.NumberFormat('es-CL', {
                    style: 'currency',
                    currency: 'CLP',
                });
                
                $('#listCart').html('');

                $.map(data, function (game, index){
                    $('#listCart').append(`
                        <li class="media dropdown-item">
                            <img src="${game.attributes.image}" alt="${game.name}" style="height: 50px; width: 60px"></span>
                            <div class="media-body ml-4">
                                <h5 class="action-title">${game.name}</h5>
                                <h6 class="action-title">${formatter.format(game.price)}</h6>
                                <p><span class="timing">Cantidad: 1</span></p>
                            </div>
                        </li>
                    `);
                });

                if(data.length != 0){
                    $('#listCart').append(`
                        <li class="media dropdown-item">
                            <div class="row media-body ml-4">
                                <div class="col-8">
                                    <h6 class="action-title mt-2">Total: ${formatter.format(total)}</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="button" class="btn btn-outline-primary"><i class="feather icon-shopping-cart"></i>  Ver carrito</button>
                                </div>
                            </div>
                        </li>
                    `);
                }
            }
        });
    }
</script>