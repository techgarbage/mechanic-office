<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand"><img class="img-fulid" src="{{App\Setting::getValueByName('logo')[0]['setting_value']}}" height="50px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lnr lnr-menu"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#hero-area">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#services">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#portfolios">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#team">Equipo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#contact">Contacto</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="login">Zona clientes</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Mobile Menu Start -->
    <ul class="mobile-menu">
        <li>
            <a class="page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#hero-area">Inicio</a>
        </li>
        <li>
            <a class="page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#services">Servicios</a>
        </li>
        <li>
            <a class="page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#portfolios">Portfolio</a>
        </li>
        <li>
            <a class="page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#pricing">Equipo</a>
        </li>
        <li>
            <a class="page-scroll" href="{{(Request::path()=='/') ? '':'/'}}#contact">Contacto</a>
        </li>
        <li>
            <a class="page-scroll" href="login">Zona clientes</a>
        </li>
    </ul>
    <!-- Mobile Menu End -->

</nav>
<!-- Navbar End -->