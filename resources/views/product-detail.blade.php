@extends('layouts.app')

@section('content')

@include('partials.topbar')
@include('partials.navbar')


<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="/">Inicio</a>
                <span class="breadcrumb-item active">Detalle del producto</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<style>
    .zoom-container {
        position: relative;
        overflow: hidden;
    }

    .zoom-container img {
        transition: transform 0.3s ease;
    }

    .zoom-container:hover img {
        transform: scale(2); /* Nivel de zoom */
        cursor: zoom-in;
    }

    .zoom-container img {
        transform-origin: center center;
    }
</style>

<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    @php
                        $imagenes = json_decode($product->images)
                    @endphp
                    @if($imagenes)
                        @foreach($imagenes as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="zoom-container">
                                <img class="w-100 h-100" src="{{asset('storage/' . $item)}}" alt="Image">
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="carousel-item active">
                        <div class="zoom-container">
                            <img class="w-100 h-100" src="{{asset('storage/' . $business->image)}}" alt="Image">
                        </div>
                    </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3>{{$product->name}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(99 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">S/. {{$product->price}}</h3>
                <p class="mb-4">{{$product->description}}</p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">Categría:</strong>
                    <label class="">{{$product->taxonomy->name}}</label>
                </div>
                <div class="d-flex mb-4">
                    <strong class="text-dark mr-3">Marca:</strong>
                    <label class="">{{$product->brand->name}}</label>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary border-0 text-center" value="1" id="qty">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary px-3 addcart" data-id="{{$product->id}}">
                        <i class="fa fa-shopping-cart mr-1"></i> 
                        Agregar al carrito
                    </a>
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Descripción</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Información</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Descripción del producto</h4>
                        @if($product->description)
                        <p>{!! Str::markdown($product->description) !!}</p>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        @if($product->information)
                        <p>{!! Str::markdown($product->information) !!}</p>        
                        @endif                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->
 
<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="px-xl-5">
        <h2 class="section-title position-relative text-uppercase px-3"><span>También te puede interesar</span></h2>
        <div class="row">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach($relatedProducts as $product)
                    <div class="product-item bg-light mb-4" style="border: 1px solid #ddd;border-radius: 10px;">
                        <div class="product-img position-relative overflow-hidden"
                            style="aspect-ratio: 1 / 1; border-radius: 10px; overflow: hidden;">
                            @php
                                $imagenes = json_decode($product->images)
                            @endphp
                            @if($imagenes)
                            <img class="img-fluid w-100" src="{{asset('storage/' . $imagenes[0])}}" alt=""
                                style="width:100%; height:100%; object-fit:cover;">
                            @else
                            <img class="img-fluid w-100" src="{{asset ('storage/' . $business->image)}}" alt=""
                                style="width:100%; height:100%; object-fit:cover;">
                            @endif
                            <div class="product-action">
                                <input type="hidden" id="qty" value="1">
                                <a class="btn btn-outline-dark" href="{{route('product.detail', $product)}}">
                                    Detalle del producto
                                    <i class="fa fa-search"></i>                            
                                </a>
                            </div>
                        </div>
                        <div class="px-4 py-4">
                            <div class="d-flex  mb-1">
                                <small class="text-muted" style="font-size: 12px;">{{$product->taxonomy->name}}</small>
                            </div>
                            <a class="h6 text-decoration-none text-truncate" href="{{route('product.detail', $product)}}">{{ Str::limit($product->name, 30, '...') }}</a>
                            <div class="d-flex mt-2">
                                <h5>S/. {{$product->price}}</h5><h6 class="text-muted ml-2"><del>S/. {{$product->price*1.20}}</del></h6>
                            </div>  
                            <a class="btn btn-primary addcart w-100" href="javascript:void(0)" data-id="{{$product->id}}">
                                <i class="fa fa-shopping-cart"></i>
                                Agregar al carrito
                            </a>               
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products End -->

@include('partials.footer')

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.zoom-container').forEach(container => {
            const img = container.querySelector('img');

            container.addEventListener('mousemove', function(e) {
                const rect = container.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;

                img.style.transformOrigin = `${x}% ${y}%`;
            });

            container.addEventListener('mouseleave', function() {
                img.style.transformOrigin = "center center";
            });
        });
    </script>
@endpush

@endsection