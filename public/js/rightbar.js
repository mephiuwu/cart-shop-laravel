'use strict'

$(document).ready(function () {
    refreshCart();
});

$('.dropdown-cart').on('click', function (e) {
    e.stopPropagation();
});

function refreshCart(){
    $.ajax({
        type: "get",
        url: "/cart/refreshCart",
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
                            <p><span class="timing">Cantidad: ${game.quantity}</span></p>
                        </div>
                    </li>
                `);
            });

            if(data.length != 0){
                $('#listCart').append(`
                    <li class="media dropdown-item" style="position: ;">
                        <div class="row media-body ml-4">
                            <div class="col-7">
                                <h6 class="action-title mt-2">Total: ${formatter.format(total)}</h6>
                            </div>
                            <div class="col-5 text-right">
                                <a class="btn btn-primary" href="/cart" role="button"><i class="feather icon-shopping-cart mr-1"></i> Ver carrito</a>
                            </div>
                        </div>
                    </li>
                `);
            }
        }
    });
}