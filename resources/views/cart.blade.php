@extends('layouts.app')

@section('content')

@include('partials.topbar')
@include('partials.navbar')


<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        @if(Cart::count() > 0)
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Remover</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach(Cart::content() as $item)
                    <tr>
                        <td class="d-flex" style="text-align: left;">
                                <img src="{{$item->options->image}}" alt="" style="width: 50px;"> 
                                <p class="d-block my-auto px-2">{{$item->name}}</p>                              
                        </td>
                        <td class="align-middle">S/. {{$item->price}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-primary btn-minus" data-rowid="{{ $item->rowId }}">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center qty-input" 
                                        value="{{$item->qty}}" 
                                        data-rowid="{{ $item->rowId }}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-primary btn-plus" data-rowid="{{ $item->rowId }}">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle subtotal-item" data-rowid="{{ $item->rowId }}">S/. {{ number_format($item->price * $item->qty, 2) }}</td>
                        <td class="align-middle">
                            <form action="{{route('removeitem')}}" method="post">
                            @csrf
                                <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container row py-4">
                <a href="{{route('clear')}}" class="btn bg-dark py-2 px-4 text-white" style="border-radius: 10px;">Limpiar carrito</a>
            </div>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Aplicar cupón</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Resumen del carrito</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6 id="subtotal-general">S/. {{number_format(Cart::subtotal() - Cart::subtotal()*0.18,2)}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">IGV</h6>
                        <h6 class="font-weight-medium" id="igv">S/. {{number_format(Cart::subtotal()*0.18,2)}}</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id="cart-total">S/. {{number_format(Cart::subtotal(),2)}}</h5>
                    </div>
                    <a href="/checkout" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Ir a pagar</a>
                </div>
            </div>
        </div>
        @else
        <div class="container">
            <div class="row px-xl-5">
                <h5>No existen productos en tu carrito</h5>
                <div class="d-block m-auto">
                    <a href="/" class="btn btn-primary py-2 px-4" style="border-radius: 10px;">Ir al inicio</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- Cart End -->

@include('partials.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.btn-plus, .btn-minus', function(e) {
        e.preventDefault();
        let input = $(this).closest('.quantity').find('.qty-input');
        let rowId = input.data('rowid');
        let qty   = parseInt(input.val());

        if ($(this).hasClass('btn-plus')) {
            qty++;
        } else {
            if (qty > 1) qty--;
        }

        input.val(qty);

        // AJAX para actualizar carrito
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                rowId: rowId,
                qty: qty
            },
            success: function(response) {
                if (response.success) {
                    // actualizar subtotal del item
                    $(`.subtotal-item[data-rowid='${rowId}']`).text('S/. ' + response.subtotalItem);

                    // actualizar resumen
                    $("#subtotal-general").text('S/. ' + response.subtotalGeneral);
                    $("#igv").text('S/. ' + response.igv);
                    $("#cart-total").text('S/. ' + response.total);
                    $('#cartCount1').text(response.count);
                }
            }
        });
    });
</script>

@endsection