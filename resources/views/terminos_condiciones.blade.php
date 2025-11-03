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
                <span class="breadcrumb-item active">Términos y Condiciones</span>                
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<div class="container">
    @if($business->terminos_condiciones)
    {!! Str::markdown($business->terminos_condiciones) !!}
    @endif
</div>


@include('partials.footer')


@endsection