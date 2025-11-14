@extends('layouts.app')

@section('content')

<!-- ====== ICONS & AOS (HEAD) ====== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>

<style>
  :root{
    --metal-1: #0f1113;
    --metal-2: #151619;
    --accent: #ff4d2d;         /* rojo metálico */
    --accent-2: #ffb86b;       /* brillo metálico */
    --glass: rgba(255,255,255,0.03);
    --glass-2: rgba(255,255,255,0.02);
  }

  /* Fuente global para la sección */
  .about-ux { font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }

  /* Fondo industrial texturado */
  .industrial-bg{
    background: linear-gradient(180deg, rgba(6,7,8,1) 0%, rgba(18,18,20,1) 100%);
    background-image: url('https://www.transparenttextures.com/patterns/asfalt-dark.png');
    background-blend-mode: overlay;
    color: #e6e6e6;
  }

  /* contenedor glass */
  .industrial-panel {
    background: linear-gradient(180deg, rgba(22, 22, 24, 0.9), rgba(14, 14, 16, 0.9));
    border: 1px solid rgba(255,255,255,0.04);
    border-left: 1px solid rgba(255,255,255,0.02);
    border-radius: 18px;
    padding: 36px;
    box-shadow:
      0 18px 40px rgba(0,0,0,0.7),
      inset 0 1px 0 rgba(255,255,255,0.02);
    backdrop-filter: blur(6px);
  }

  /* headline */
  .about-headline {
    font-weight: 800;
    letter-spacing: -0.6px;
    /* color: #fff; */
    font-size: 2.05rem;
  }
  .about-sub {
    color: #333;
    margin-top: 6px;
  }

  /* imagen principal con efecto 3D / parallax soft */
  .about-img-wrap{
    border-radius: 14px;
    overflow: hidden;
    transform-style: preserve-3d;
    perspective: 1200px;
    box-shadow: 0 30px 70px rgba(0,0,0,0.7);
    transition: transform .6s cubic-bezier(.2,.9,.2,1), box-shadow .4s ease;
    border: 1px solid rgba(255,255,255,0.03);
  }

  .about-img-wrap img{
    width:100%;
    height: auto;
    display:block;
    transform-origin: center;
    transition: transform .9s ease;
    will-change: transform;
  }

  .about-img-wrap:hover{
    transform: translateY(-8px) rotateX(2deg);
    box-shadow: 0 40px 90px rgba(0,0,0,0.85);
  }

  .about-img-wrap:hover img{
    transform: scale(1.07);
  }

  /* features list */
  .feat-metal {
    background: linear-gradient(180deg, rgba(255,255,255,0.015), rgba(255,255,255,0.01));
    border-radius: 12px;
    padding: 18px;
    display:flex;
    gap:16px;
    align-items:center;
    border:1px solid rgba(255,255,255,0.03);
    transition: transform .28s ease, box-shadow .28s ease;
  }

  .feat-metal:hover{
    transform: translateX(8px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.6);
  }

  .feat-metal .ico{
    width:64px;
    height:64px;
    display:grid;
    place-items:center;
    border-radius:12px;
    background: linear-gradient(135deg, rgba(255,77,45,0.12), rgba(255,184,107,0.06));
    box-shadow: 0 6px 18px rgba(255,77,45,0.06), inset 0 1px 0 rgba(255,255,255,0.02);
    font-size:28px;
    color: var(--accent);
  }

  .feat-metal h6{
    margin:0;
    font-weight:700;
    color:#fff;
  }
  .feat-metal p{ margin:0; color:#c3c7cb; font-size:0.95rem; }

  /* Cards mission/vision/values - metallic 3D */
  .metal-card{
    background: linear-gradient(180deg, rgba(22,22,24,0.9), rgba(14,14,16,0.9));
    border-radius:14px;
    padding:26px;
    border: 1px solid rgba(255,255,255,0.03);
    box-shadow:
      8px 12px 30px rgba(0,0,0,0.6),
      inset -3px -3px 10px rgba(255,255,255,0.01);
    transition: transform .32s cubic-bezier(.2,.9,.2,1), box-shadow .32s ease;
  }

  .metal-card:hover{
    transform: translateY(-10px);
    box-shadow:
      18px 30px 70px rgba(0,0,0,0.75),
      inset -6px -6px 24px rgba(255,255,255,0.015);
  }

  .metal-card .card-title{
    display:flex;
    gap:12px;
    align-items:center;
    font-weight:800;
    color:#fff;
  }

  .metal-card .card-ico{
    font-size:26px;
    color:var(--accent);
    background: rgba(255,77,45,0.06);
    padding:10px;
    border-radius:10px;
    box-shadow: 0 6px 16px rgba(255,77,45,0.035);
  }

  .metal-card p{ color:#c6c9cc; margin-top:10px; }

  /* valores list style */
  .val-list li{
    margin-bottom:10px;
    color:#d0d4d7;
    font-weight:600;
    display:flex;
    gap:10px;
    align-items:center;
    font-size:0.95rem;
  }

  .val-list i{
    width:34px;height:34px;border-radius:8px;display:grid;place-items:center;
    background: rgba(255,255,255,0.02);
    color: var(--accent-2);
    border:1px solid rgba(255,255,255,0.03);
  }

  /* CTA metal button */
  .cta-metal{
    display:inline-flex;
    align-items:center;
    gap:12px;
    padding:14px 20px;
    border-radius:12px;
    font-weight:800;
    letter-spacing:0.6px;
    text-decoration:none;
    background: linear-gradient(90deg, rgba(255,77,45,0.13), rgba(255,184,107,0.06));
    color:#fff;
    border:1px solid rgba(255,77,45,0.18);
    transition: transform .22s ease, box-shadow .22s ease;
    box-shadow: 0 10px 30px rgba(255,77,45,0.03);
  }

  .cta-metal:hover{
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 30px 70px rgba(255,77,45,0.08);
  }

  /* Map wrapper - industrial */
  .map-industrial{
    border-radius:14px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,0.03);
    box-shadow: 0 28px 70px rgba(0,0,0,0.75);
  }

  /* Responsive tweaks */
  @media (max-width:991px){
    .about-headline{ font-size:1.6rem; }
    .feat-metal{ padding:14px; gap:12px; }
  }
</style>


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

<!-- ====== SECTION - ABOUT INDUSTRIAL (MAIN) ====== -->
<section class="industrial-bg about-ux py-5">
  <div class="container">
    <div class="industrial-panel">
      <div class="row g-5 align-items-center">

        <!-- LEFT: IMAGE (PARALLAX / 3D) -->
        <div class="col-lg-6" data-aos="fade-right" data-aos-offset="120">
          <div class="about-img-wrap" id="parallaxWrap">
            @if($nosotros)                    
            <img
                src="storage/{{$nosotros->image}}"
                alt="ASR Ramires - repuestos motocicleta"
                loading="lazy">
            @endif
          </div>
        </div>

        <!-- RIGHT: TEXT + FEATURES -->
        <div class="col-lg-6" data-aos="fade-left" data-aos-offset="120">
          <div class="mb-3">
            <div class="about-headline">{{$nosotros->titulo}}</div>
          </div>

          <p class="mb-4" style="color:#c7c9cb;">
            {!! Str::markdown($nosotros->description) !!}
          </p>

          <div class="row row-cols-1 row-cols-md-1 g-3">
            <div class="col">
              <div class="feat-metal" role="article" aria-label="Calidad certificada">
                <div class="ico"><i class="bi bi-award-fill" aria-hidden="true"></i></div>
                <div>
                  <h6>Calidad Certificada</h6>
                  <p>Componentes con certificación y pruebas de resistencia para uso profesional.</p>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="feat-metal" role="article" aria-label="Servicio técnico">
                <div class="ico"><i class="bi bi-gear-fill" aria-hidden="true"></i></div>
                <div>
                  <h6>Soporte Técnico Especializado</h6>
                  <p>Asesoría técnica y asistencia posventa para integradores y talleres.</p>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="feat-metal" role="article" aria-label="Distribución">
                <div class="ico"><i class="bi bi-truck" aria-hidden="true"></i></div>
                <div>
                  <h6>Distribución Nacional</h6>
                  <p>Logística confiable y envíos con seguimiento para cada pedido.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /row -->
    </div> <!-- /panel -->
  </div>
</section>

<!-- ====== SECTION - MISION / VISION / VALORES ====== -->
<section class="industrial-bg py-5">
  <div class="container">
    <div class="row g-4 d-flex align-items-stretch">

      <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="metal-card d-flex flex-column">
            <div class="card-title">
                <div class="card-ico"><i class="bi bi-bullseye"></i></div>
                <div>Misión</div>
            </div>
            <div class="card-body-content">
                <p class="text-center">{!! Str::markdown($nosotros->mision) !!}</p>
            </div>
        </div>
      </div>

      <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="80">
        <div class="metal-card d-flex flex-column">
            <div class="card-title">
                <div class="card-ico"><i class="bi bi-eye-fill"></i></div>
                <div>Visión</div>
            </div>
            <div class="card-body-content">
                <p class="text-center">{!! Str::markdown($nosotros->vision) !!}</p>
            </div>
        </div>
      </div>

      <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="80">
        <div class="metal-card d-flex flex-column">
            <div class="card-title">
                <div class="card-ico"><i class="bi bi-stars"></i></div>
                <div>Valores</div>
            </div>
            <div class="card-body-content">
            <ul class="val-list mt-3">
                <li><i class="bi bi-check-lg"></i> Calidad industrial</li>
                <li><i class="bi bi-check-lg"></i> Integridad profesional</li>
                <li><i class="bi bi-check-lg"></i> Compromiso con el cliente</li>
                <li><i class="bi bi-check-lg"></i> Innovación técnica</li>
                <li><i class="bi bi-check-lg"></i> Seguridad</li>
            </ul>
        </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ====== SECTION - MAP & CONTACT CTA ====== -->
<section class="industrial-bg py-5">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-7" data-aos="fade-right">
        <h4 class="about-headline">Encuéntranos</h4>
        <p class="about-sub">Visítanos o solicita una cotización técnica personalizada.</p>

        <div class="map-industrial mt-3">
          <!-- Google Maps embed: Lima center by default. Replace coords if you have exact address -->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.62841496596369!2d-79.83619252288946!3d-6.763192601461019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904cef92e3804373%3A0x30adef4a7bfeb2d0!2sCasa!5e0!3m2!1ses!2spe!4v1762135763036!5m2!1ses!2spe"
            width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

      </div>

      <div class="col-lg-5" data-aos="fade-left">
        <div class="industrial-panel">
          <h5 class="fw-bold text-white">Contactanos</h5>
          <p class="mb-3" style="color:#c6c9cc;">Solicita cotización técnica, soporte posventa o información sobre distribución.</p>

          <div class="d-grid gap-3">
            <a href="{{ url('/contact') }}" class="cta-metal d-block text-center my-2">
              <i class="bi bi-telephone-fill"></i> Llamar / Solicitar Cotización
            </a>

            <a href="mailto:{{$business->email}}" class="cta-metal d-block text-center my-2" style="background:transparent;border:1px solid rgba(255,255,255,0.06); color:#fff;">
              <i class="bi bi-envelope-fill"></i> {{$business->email}}
            </a>

            <a href="{{ url('/catalogo') }}" class="cta-metal d-block text-center my-2" style="background: linear-gradient(90deg, rgba(255,184,107,0.08), rgba(255,77,45,0.06));">
              <i class="bi bi-box-seam"></i> Ver Catálogo
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



@include('partials.footer')

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<script>
    // AOS
    AOS.init({ duration: 900, once: true, offset: 120 });

    // GSAP: subtle entrance animations
    gsap.registerPlugin(ScrollTrigger);

    gsap.from(".about-headline", { y: 30, opacity:0, duration:1, ease:"power3.out" });
    gsap.from(".feat-metal", { y: 30, opacity:0, duration:0.9, stagger: 0.12, ease:"power2.out", scrollTrigger:{trigger:".feat-metal", start:"top 85%"} });
    gsap.from(".metal-card", { y: 30, opacity:0, duration:1, stagger: 0.15, ease:"power2.out", scrollTrigger:{trigger:".metal-card", start:"top 85%"} });

    // Micro parallax for image based on mouse (desktop)
    (function(){
        const wrap = document.getElementById('parallaxWrap');
        if(!wrap) return;
        const img = wrap.querySelector('img');

        // mouse move tilt for desktop
        let active = false;
        const onMove = (e) => {
        const rect = wrap.getBoundingClientRect();
        const cx = rect.left + rect.width/2;
        const cy = rect.top + rect.height/2;
        const dx = (e.clientX - cx) / rect.width;
        const dy = (e.clientY - cy) / rect.height;
        gsap.to(img, { rotationY: dx * 6, rotationX: dy * -6, scale: 1.03, transformOrigin: "center", duration: 0.8, ease:"power2.out" });
        };
        const reset = () => gsap.to(img, { rotationY:0, rotationX:0, scale:1, duration:0.8, ease:"power2.out" });

        if(window.innerWidth > 991){
        wrap.addEventListener('mousemove', onMove);
        wrap.addEventListener('mouseleave', reset);
        }
    })();
</script>

@endsection