@section('title') 
Carro
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Carro</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            <div class="cart-container">
                                <div class="cart-head">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Producto</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col" class="text-right">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart as $product)
                                                    <tr>
                                                        <td><img src="{{$product->attributes->image}}" class="img-fluid" width="90" alt="product"></td>
                                                        <td>{{$product->name}}</td>
                                                        <td>
                                                            <div class="form-group mb-0">
                                                                <input type="number" class="form-control cart-qty" name="quantity" id="quantity" value="{{$product->quantity}}" onchange="changeTotal({{$product->id}},{{$product->price}},this.value)" min="1">
                                                            </div>
                                                        </td>
                                                        <td>${{ number_format($product->price, 0, ',', '.')}}</td>
                                                        <td class="total{{$product->id}} totals" valueTotal={{$product->price * $product->quantity}}>${{ number_format($product->price * $product->quantity, 0, ',', '.') }}</td>
                                                        <td class="text-right"><a href="#" class="text-danger"><i class="feather icon-trash"></i></a> Eliminar</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cart-body">
                                    <div class="row">
                                        <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                            <div class="order-note">
                                                <form>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="search" class="form-control" placeholder="Coupon Code" aria-label="Search" aria-describedby="button-addonTags">
                                                            <div class="input-group-append">
                                                                <button class="input-group-text" type="submit" id="button-addonTags" style="line-height: 0.5">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="specialNotes">Special Note for this order:</label>
                                                        <textarea class="form-control" name="specialNotes" id="specialNotes" rows="3" placeholder="Message here"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                            <div class="order-total table-responsive ">
                                                <table class="table table-borderless text-right">
                                                    <tbody>
                                                        <tr>
                                                            <td>Sub Total :</td>
                                                            <td class="subtotal">$ {{ number_format((($total * 81) / 100), 0, ',', '.') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>IVA(19%) :</td>
                                                            <td class="iva">$ {{ number_format((($total * 19) / 100), 0, ',', '.') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="f-w-7 font-18"><h4>Total :</h4></td>
                                                            <td class="f-w-7 font-18"><h4 class="total">$ {{ number_format($total, 0, ',', '.') }}</h4></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-footer text-right">
                                    <button type="button" class="btn btn-primary-rgba my-1"><i class="feather icon-save mr-2"></i>Update Cart</button>
                                    <a href="{{url('/page-checkout')}}" class="btn btn-success-rgba my-1">Proceed to Checkout<i class="feather icon-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
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

<script>
    function changeTotal(id, price, quantity){
        let formatter = new Intl.NumberFormat('es-CL', {
            style: 'currency',
            currency: 'CLP',
        });

        //Al html correspondiente se le actualiza el atributo y el valor de forma dinámica multiplicando el precio por la cantidad
        $('.total'+id).attr("valueTotal", price*quantity).html(formatter.format(price*quantity));

        /* SOLUCIÓN 1
        let newTotal = 0;
        
        for (let item of $(".totals")) {
            newTotal = newTotal + parseInt($(item).attr("valueTotal"));
        }

        $('.subtotal').html(formatter.format((newTotal * 81) / 100));

        $('.iva').html(formatter.format((newTotal * 19) / 100));

        $('.total').html(formatter.format(newTotal)); */
    }
</script>

@endsection 