
<!-- Topbar Start -->
 <div class="sticky-top">
    <div class="container-fluid bg-mobil sticky-top">
        <div class="row align-items-center px-xl-5 d-none d-lg-flex">        
            <div class="col-lg-4">
                <a href="/" class="text-decoration-none">
                    <img width="250" src="{{asset ('storage/' . str_replace('\\', '/', $business->image))}}" alt="">
                </a>
            </div>
            <div class="col-lg-5 col-6 text-left">
                <form action="{{ url('/store') }}" method="GET">
                    <div class="input-group" style="position: relative;">
                        <input type="text" id="buscar" name="search" class="form-control" style="border-radius: 5px 0 0 5px;" placeholder="Encuentra tus productos" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary" style="border-radius: 0 5px 5px 0;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <ul id="resultados" style="position: absolute; z-index:9;width: 350px;" class="list-group mt-5"></ul>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <div class="navbar-nav ml-auto py-0 d-lg-block">
                    <a href="/cart" class="btn px-0 ml-3">
                        <i class="fas fa-shopping-cart text-white"></i>
                        <span id="cartCount1" class="badge text-white border border-secondary rounded-circle" style="padding-bottom: 2px;">
                            {{\Cart::count()}}
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<!-- Topbar End -->

