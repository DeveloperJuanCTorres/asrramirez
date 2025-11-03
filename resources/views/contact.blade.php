@extends('layouts.app')

@section('content')

@include('partials.topbar')
@include('partials.navbar')


 <!-- Breadcrumb Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Inicio</a>
                <span class="breadcrumb-item active">Contáctanos</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contáctanos</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form id="contactForm" method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control inputTexto" id="name" name="name" placeholder="Nombre"
                            required="required" data-validation-required-message="Por favor ingrese su nombre" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control inputTexto" id="email" name="email" placeholder="Email"
                            required="required" data-validation-required-message="Por favor ingrese su correo" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control inputTexto" id="subject" name="subject" placeholder="Asunto"
                            required="required" data-validation-required-message="Ingrese el asunto" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control inputTexto" rows="8" id="message" name="message" placeholder="Mensaje..."
                            required="required"
                            data-validation-required-message="Ingrese un mensaje"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit">Enviar mensaje</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <div class="bg-light">
                <iframe style="width: 100%; height: 320px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.62841496596369!2d-79.83619252288946!3d-6.763192601461019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904cef92e3804373%3A0x30adef4a7bfeb2d0!2sCasa!5e0!3m2!1ses!2spe!4v1762135763036!5m2!1ses!2spe"
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="bg-light p-30 mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{$business->address}}</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{$business->email}}</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>{{$business->phone}}</p>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    document.querySelectorAll('.inputTexto').forEach(function (input) {
        input.addEventListener('input', function (e) {
            const prohibido = /[<>{};*$%=()&]/g; // Caracteres que quieres bloquear
            if (prohibido.test(e.target.value)) {
                e.target.value = e.target.value.replace(prohibido, '');
            }
        });
    });
</script> 

<script>
    document.getElementById("contactForm").addEventListener("submit", function(e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);

        // Mostrar loading
        Swal.fire({
            title: 'Enviando...',
            text: 'Por favor espere',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            Swal.close(); // cerrar loading

            if (data.status) {
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "success",
                title: data.msg
                });  

                form.reset(); // limpiar formulario
            } else {
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "error",
                title: data.msg
                });  

                form.reset(); // limpiar formulario
            }
        })
        .catch(error => {
            Swal.close();

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "error",
                title: 'Hubo un problema al enviar. Inténtalo más tarde.'
                });  
            
                form.reset(); // limpiar formulario
            console.error(error);
        });
    });
</script>

@endsection