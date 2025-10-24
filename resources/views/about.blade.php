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
                <span class="breadcrumb-item active">Sobre nosotros</span>                
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- About Start -->
<div class="container-fluid overflow-hidden py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="bg-light rounded">
                    @if($nosotros)
                    <img src="storage/{{$nosotros->image}}" class="img-fluid w-100" style="margin-bottom: -7px;" alt="Image">
                    @endif
                </div>
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                <h5 class="sub-title pe-3">{{$nosotros->subtitulo}}</h5>
                <h1 class="display-5 mb-4">{{$nosotros->titulo}}</h1>
                <p class="mb-4">{!! Str::markdown($nosotros->description) !!}</p>
                <div class="row gy-4 align-items-center">
                    <div class="col-4 col-md-3">
                        <div class="bg-light text-center rounded p-3">
                            <div class="mb-2">
                                <i class="fas fa-award fa-4x text-primary"></i>
                            </div>
                            <h1 class="display-5 fw-bold mb-2">{{$nosotros->experiencia}}</h1>
                            <p class="text-muted mb-0">Años de Experiencia</p>
                        </div>
                    </div>
                    <div class="col-8 col-md-9">
                        <div class="d-flex flex-wrap">
                            <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                                <a href="" class="position-relative wow tada" data-wow-delay=".9s">
                                    <i class="fa fa-phone-alt text-primary fa-3x"></i>
                                    <div class="position-absolute" style="top: 0; left: 25px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="text-primary">¿Tienes alguna pregunta?</span>
                                <span class="fw-bold fs-5" style="letter-spacing: 2px;color: #003A66;">{{$nosotros->telefono}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<div class="container-fluid features overflow-hidden py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center text-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="feature-item text-center p-4 bg-light">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-users fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Misión</h5>
                        <p class="mb-3">{!! Str::markdown($nosotros->mision) !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="feature-item text-center p-4 bg-light">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-low-vision fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Visión</h5>
                        <p class="mb-3">{!! Str::markdown($nosotros->vision) !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="feature-item text-center p-4 bg-light">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-user-graduate fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Valores</h5>
                        <p class="mb-3">{!! Str::markdown($nosotros->valores) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('partials.footer')


@endsection