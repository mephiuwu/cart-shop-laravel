@section('title') 
Inicio
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<style>
    .breadcrumbbar{
        display: none;
    }

    .cardindex{
        margin: 174px 30px 30px 30px;
    }

    .imgCarousel{
        height: 600px;
        widows: 300px;
    }

    h1 {
        text-align: center;
        border-bottom: 1px solid #ddd;
        border-top: 1px solid #ddd;
        line-height: 0;
        padding: 0;
    }

    h1 span {
        background: #fff;
        padding: 0 15px;
    }
</style>
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row d-flex justify-content-center">
        <!-- Start col -->
        <div class="col-md-11 col-lg-11 col-xl-11">
            <div class="card m-b-30 cardindex">
                <div class="card-body">
                    <br>
                    <h1><span>Novedades</span></h1>
                    <br>
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item carousel-item-next carousel-item-left">
                                <img src="{{asset('assets/images/carousel/assasins.jpg')}}" class="d-block w-100 imgCarousel" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('assets/images/carousel/battlefield.jpg')}}" class="d-block w-100 imgCarousel" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item active carousel-item-left">
                                <img src="{{asset('assets/images/carousel/mariobros.jpg')}}" class="d-block w-100 imgCarousel" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previo</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>                             
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')

@endsection