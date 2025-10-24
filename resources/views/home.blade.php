@extends('layouts.app')

@section('content')

@include('partials.topbar')
@include('partials.navbar')


<!-- Carousel Start -->
<div class="container-carrusel">
    <div class="row">
        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($banners as $key => $banner)
                        <li data-target="#header-carousel" data-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($banners as $key => $banner)
                        <div class="carousel-item position-relative {{ $key == 0 ? 'active' : '' }}">
                            <!-- Imagen -->
                            <img class="d-block w-100" src="storage/{{$banner->image}}"  
                                 style="max-width: 100%; max-height: 100vh; object-fit: cover;">

                            <!-- Capa semitransparente -->
                            <!-- <div class="overlay"></div> -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>        
    </div>
</div>
<!-- Carousel End -->

<!-- Featured Start -->
<div class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-6 col-md-4 col-lg-3 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-sync-alt fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Devolución Gratuita</h6>
                        <p class="mb-0">¡Garantía de devolución de dinero de 30 días!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.2s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-telegram-plane fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Envío Gratis</h6>
                        <p class="mb-0">Envío gratuito en todos los pedidos.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.3s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-life-ring fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Soporte 24/7</h6>
                        <p class="mb-0">Brindamos soporte en línea las 24 horas del día.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.6s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-blog fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Servicio en Línea</h6>
                        <p class="mb-0">Devolución gratuita de productos en 30 días</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->

<!-- CATEGORÍAS -->
<!-- <div class="container-fluid py-5">
    <div class="text-center py-5">
        <h3>¿Qué tipo de Repuesto estás buscando?</h3>
        <span>Encuentra el repuesto para tu moto que necesitas</span>
    </div>
    <div class="row px-xl-5">        
        <div class="carousel-container">
            <div class="carousel1 py-2">
                @foreach($categories as $key => $category)
                <div class="carousel-item1">
                    @if($category->image)
                    <img src="storage/{{$category->image}}" alt="{{$category->name}}">
                    @else
                    <img src="storage/{{$business->image}}" alt="{{$category->name}}">
                    @endif
                    <div class="d-flex align-items-center justify-content-center m-auto" style="height: 100px;">
                        <h5>{{$category->name}}</h5>
                    </div>
                    <a class="btn btn-primary mt-2" style="border-radius: 10px;" href="{{ route('store', ['categories' => $category->id]) }}" title="productos">Ver productos</a>
                </div>
                @endforeach
            </div>           
        </div>
    </div>
</div> -->
<!-- FIN CATEGORÍAS -->

<!-- brochure Start -->
<div class="container-fluid bg-mobil text-secondary ">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5 my-auto">
           <h4 class="text-white">Descarga Nuestro</h4>
           <h4 class="text-primary">Catálogo Digital 2025</h4>
           <span style="font-size: 12px;">Accede a nuestra completa gama de productos de seguridad industrial y equipamiento profesional en un solo documento.</span>
           <br><br>           
           <div class="d-flex align-items-center">
                <div class="icon-circle me-3">
                    <i class="fas fa-mobile"></i>
                </div>
                <div class="d-flex flex-column px-4">
                    <span class="fw-bold" style="font-size: 12px;">Acceso Multiplataforma</span>
                    <span class="text-muted" style="font-size: 12px;">Compatible con todos tus dispositivos</span>
                </div>
            </div>
            <div class="d-flex align-items-center pt-2">
                <div class="icon-circle me-3">
                    <i class="fas fa-retweet" aria-hidden="true"></i>
                </div>
                <div class="d-flex flex-column px-4">
                    <span class="fw-bold" style="font-size: 12px;">Siempre Actualizado</span>
                    <span class="text-muted" style="font-size: 12px;">Precios y especificaciones al día</span>
                </div>
            </div>
            <div class="d-flex align-items-center pt-2">
                <div class="icon-circle me-3">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <div class="d-flex flex-column px-4">
                    <span class="fw-bold" style="font-size: 12px;">Fichas Técnicas</span>
                    <span class="text-muted" style="font-size: 12px;">Información detallada de cada producto</span>
                </div>
            </div>
            <a href="https://asrramirez.com/pdf/lista_precios_asr_ramirez_sac.pdf" target="_blank" class="btn btn-primary my-4">
                Descargar Catálogo
                <i class="fa fa-download" aria-hidden="true"></i>
            </a>
        </div>
        
        <div class="col-lg-4 col-md-12 pb-4">
            <div class="d-block m-auto">
                <img style="height: 400px; border-radius: 10px;" src="img/brochure.jpg" alt="">
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<!-- brochure End -->

<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="text-center pb-4">
        <h3>Productos Destacados</h3>
        <span>Nuestra selección especial de productos destacados</span>
    </div>
    
    <div class="row px-xl-5">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4" style="border: 1px solid #ddd;border-radius: 10px;">
                <div class="product-img position-relative overflow-hidden m-auto"
                    style="aspect-ratio: 1 / 1; border-radius: 10px; overflow: hidden;">
                    @php
                        $imagenes = json_decode($product->images)
                    @endphp
                    @if($imagenes)
                    <img class="img-fluid w-100" src="storage/{{$imagenes[0]}}" alt=""
                        style="width:100%; height:100%; object-fit:cover;">
                    @else
                    <img class="img-fluid w-100" src="storage/{{$business->image}}" alt=""
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
        </div>
        @endforeach        
    </div>    
    <div class="row px-xl-5">
        <div class="d-block m-auto">
            <a href="/store" class="btn btn-primary py-2 px-4" style="border-radius: 10px;">Ver todos los productos</a>
        </div>
    </div>
</div>
<!-- Products End -->



@include('partials.footer')

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/addcart.js"></script>
<script>
    const baseUrl = "{{ url('/product.detail') }}"; // Esto será "/producto"
</script>
@endpush

@endsection
