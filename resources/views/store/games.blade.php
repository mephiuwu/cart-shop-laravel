@section('title')
    Tienda Games
@endsection

@extends('layouts.main')

@section('style')
    <!-- CSS -->
    <link href="{{ asset('assets/plugins/ion-rangeSlider/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('rightbar-content')
<div class="contentbar">                
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title d-flex align-items-center"><i class="fa fa-gamepad fa-2x mr-2"></i> Games</h5>
                </div>
                <div class="card-body">
                    <!-- Start row -->
                    <div class="row align-items-center ecommerce-sortby">
                        <!-- Start col -->
                        <div class="col-md-12 col-lg-12 col-xl-4">                                       
                            <select class="form-control" id="productSortBy">
                                <option>Price - Low to High</option>
                                <option>Price - High to Low</option>
                                <option>Newest</option>
                                <option>Popularity</option>
                                <option>Average Rating</option>
                            </select>
                        </div>
                        <!-- End col -->
                        <!-- Start col -->
                        <div class="col-md-12 col-lg-12 col-xl-8">
                            <div class="button-list">
                                <button type="button" class="btn btn-round btn-primary-rgba"><i class="feather icon-grid"></i></button>
                                <button type="button" class="btn btn-round btn-secondary-rgba"><i class="feather icon-list"></i></button>
                            </div>
                        </div>
                        <!-- End col -->
                    </div> 
                    <!-- End row -->
                    <!-- Start row -->
                    <div class="row">
                        @foreach ($games as $game)
                            <div class="col-lg-4 col-xl-3">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="{{url('/ecommerce-single-product')}}">
                                            <img src="{{ $game->imagen }}" class="img-fluid" alt="product" style="height: 380px; width: 380px;">
                                        </a>
                                        {{-- <p><span class="badge badge-success font-14">25% off</span></p> --}}
                                    </div>                                            
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">{{$game->consola->nombre}}</span>
                                                </div>
                                                {{-- <div class="d-inline-block float-right">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">{{$game->nombre}}</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <h5 class="f-w-7 mb-0">$ {{$game->price}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <button type="button" id="comprar" class="btn btn-primary-rgba font-18" onclick="addCart({{$game->id}})"><i class="feather icon-shopping-bag"></i> Comprar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Start row -->
                </div>
            </div>
            <div class="card m-b-30">
                <div class="pepito"></div>
            </div>

            <div class="card m-b-30">
                <div class="card-body ecommerce-pagination">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-6">
                            <p>Showing 1 to 2 of 12 entries</p>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination mb-0">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                            </nav>
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<!-- Range Slider js -->
<script src="{{ asset('assets/plugins/ion-rangeSlider/ion.rangeSlider.min.js') }}"></script>
<!-- eCommerce Shop Page js -->
<script src="{{ asset('assets/js/custom/custom-ecommerce-shop-page.js') }}"></script>
<script>
    function addCart(idGame){
        $.ajax({
            type: "post",
            url: "/store/addGamesCart",
            data: {
                "_token": "{{ csrf_token() }}",
                idGame
            },
            dataType: "json",
            success: function (response) {
                if (!response.status) {
                    Swal.fire({
                        title: '¡Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                } else {
                    Swal.fire({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        title: '¡Ok!',
                        text: response.message,
                        icon: 'success',
                    })

                    refreshCart();
                }
            }
        });
    }
</script>
@endsection