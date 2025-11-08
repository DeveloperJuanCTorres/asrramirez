<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                <span class="breadcrumb-item active">Tienda</span>                
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            
            <form id="filterForm">

                <div class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" id="searchInput" class="form-control" placeholder="Buscar producto..." value="{{ request('search') }}">
                        <button type="button" id="clearSearch" class="btn btn-danger">×</button>
                    </div>
                </div>

                <div class="filtro-mobil pb-4">
                    <h4>Filtros</h4>
                    <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategoria" aria-controls="offcanvasCategoria">
                        <span class="badge bg-info text-dark">Categorías</span>                            
                    </a>
                    <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMarca" aria-controls="offcanvasMarca">
                        <span class="badge bg-info text-dark">Marcas</span>
                    </a>
                </div>

                <div class="offcanvas offcanvas-end offcanvas-70" tabindex="-1" id="offcanvasCategoria" aria-labelledby="offcanvasCategoriaLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasCategoriaLabel">Categorías</h5>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close">x</button>
                    </div>
                    <div class="offcanvas-body">
                        @foreach($categories as $key => $category)                        
                        <div class="additional-product-item d-flex align-items-center justify-content-between py-2">
                            <div class="d-flex align-items-center flex-grow-1 me-2">
                                <input type="radio" class="me-2" id="categorym-{{$key}}" name="categories[]" value="{{ $category->id }}" {{ request('categories') == $category->id ? 'checked' : '' }}>
                                <label for="categorym-{{$key}}" class="text-dark mb-0" style="font-size: 14px; word-break: break-word;">{{$category->name}}</label>
                            </div>
                            <span class="badge border font-weight-normal bg-primary text-white">{{$category->productsInStock->count()}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="offcanvas offcanvas-end offcanvas-70" tabindex="-1" id="offcanvasMarca" aria-labelledby="offcanvasMarcaLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasMarcaLabel">Marcas</h5>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
                    </div>
                    <div class="offcanvas-body">
                        @foreach($brands as $key => $brand)
                        <div class="additional-product-item d-flex align-items-center justify-content-between py-2">
                            <div class="d-flex align-items-center flex-grow-1 me-2">
                                <input type="radio" class="me-2" id="brandm-{{$key}}" name="brands[]" value="{{ $brand->id }}">
                                <label for="brandm-{{$key}}" class="text-dark mb-0" style="font-size: 13px; word-break: break-word;">{{$brand->name}}</label>
                            </div>
                            <span class="badge border font-weight-normal bg-primary text-white">{{$brand->productsInStock->count()}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4 text-end">
                    <button type="button" id="resetFilters" class="btn btn-sm btn-danger">Limpiar filtros</button>
                </div>
                
                <div class="accordion filtro-destock" id="accordionExample">
                       
                    <div class="accordion-item">                                
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Filtrar por Categoría
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="bg-light mb-30">
                                    @foreach($categories as $category)
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="radio" class="custom-control-input" name="categories[]" value="{{ $category->id }}"
                                        {{ request('categories') == $category->id ? 'checked' : '' }}>
                                        <label class="custom-control-label">{{$category->name}}</label>
                                        <span class="badge border font-weight-normal bg-primary text-white">{{$category->productsInStock->count()}}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>                            
                    </div>                      
                    
                    <div class="accordion-item">                                
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Filtrar por Marca
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="bg-light mb-30">
                                    @foreach($brands as $brand)
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="radio" class="custom-control-input" name="brands[]" value="{{ $brand->id }}">
                                        <label class="custom-control-label">{{$brand->name}}</label>
                                        <span class="badge border font-weight-normal bg-primary text-white">{{$brand->productsInStock->count()}}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>                            
                    </div> 
                </div>                
            </form>
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <!-- Spinner oculto al principio -->
            <div id="loadingSpinner" class="hidden absolute inset-0 flex items-center justify-center bg-white bg-opacity-75 z-10">
                <div class="w-12 h-12 border-4 border-blue-500 border-dashed rounded-full animate-spin"></div>
            </div>
            <div class="row pb-3" id="productContainer">
                @include('product-list')
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->


@include('partials.footer')

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- <script src="js/addcart.js"></script> -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('filterForm');
        const productContainer = document.getElementById('productContainer');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const searchInput = document.getElementById('searchInput');
        const clearSearch = document.getElementById('clearSearch');
        const resetFilters = document.getElementById('resetFilters');

        let debounceTimeout;

        // 🟦 Buscar mientras escribe (con debounce)
        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                fetchProducts();
            }, 300);
        });

        // 🟨 Limpiar búsqueda (botón "X")
        clearSearch.addEventListener('click', function () {
            searchInput.value = '';
            $('#buscar').val('');            
            updateURLWithoutParams();
            fetchProducts(); // recarga todos los productos
        });

        // 🟥 Limpiar todos los filtros
        resetFilters.addEventListener('click', function () {
            form.reset(); // limpia todos los inputs del formulario
            searchInput.value = '';  
            $('#buscar').val('');
            form.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(el => el.checked = false);
            updateURLWithoutParams();
            fetchProducts(); // recarga todos los productos
        });

        // 🟩 Detectar cambio de categoría o marca
        form.addEventListener('change', function () {
            fetchProducts();
        });

        // 🌀 Cargar productos mediante AJAX
        function fetchProducts(page = 1) {
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);

            loadingSpinner.classList.remove('hidden'); // Mostrar spinner

            fetch(`{{ route('store') }}?${params.toString()}&page=${page}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.text())
            .then(html => {
                productContainer.innerHTML = html;
                updateURLParams(params);
            })
            .finally(() => {
                loadingSpinner.classList.add('hidden'); // Ocultar spinner
            });
        }

        // 🔄 Paginación AJAX
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                const url = new URL(e.target.href);
                const page = url.searchParams.get('page');
                fetchProducts(page);
            }
        });

        // 🧩 Actualiza la URL en tiempo real sin recargar la página
        function updateURLParams(params) {
            const newUrl = `${window.location.pathname}?${params.toString()}`;
            window.history.replaceState({}, '', newUrl);
        }

        // 🧼 Limpia la URL completamente (sin parámetros)
        function updateURLWithoutParams() {
            const cleanUrl = window.location.origin + window.location.pathname;
            window.history.replaceState({}, '', cleanUrl);
        }
    });
</script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('filterForm');
    const productContainer = document.getElementById('productContainer');
    const loadingSpinner = document.getElementById('loadingSpinner');

    form.addEventListener('change', function () {
        fetchProducts();
    });

    function fetchProducts(page = 1) {
        const formData = new FormData(form);
        const params = new URLSearchParams(formData);

        loadingSpinner.classList.remove('hidden'); // Mostrar spinner

        fetch(`{{ route('store') }}?${params.toString()}&page=${page}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            productContainer.innerHTML = html;
        })
        .finally(() => {
            loadingSpinner.classList.add('hidden'); // Ocultar spinner
        });
    }

    document.addEventListener('click', function(e) {
        if (e.target.closest('.pagination a')) {
            e.preventDefault();
            const url = new URL(e.target.href);
            const page = url.searchParams.get('page');
            fetchProducts(page);
        }
    });
});
</script> -->
@endpush

@endsection