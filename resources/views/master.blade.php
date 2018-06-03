<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <link rel="icon" type="image/png" href="/favicon.png" />

    @php ($title = App\Setting::getValueByName('sitename')[0]['setting_value'].' | '.App\Setting::getValueByName('sitedescription')[0]['setting_value'] )
    <title>@yield('title',$title)</title>

    @include('shared.styles')

</head>
<body>
<!-- Header Section Start -->
<header id="hero-area" data-stellar-background-ratio="0.5">
    @include('shared.navbarhome')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="contents text-center">
                    <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Mechanic Office - Taller de Mecánica</h1>
                    <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms">Mecánica general, cambio de neumáticos, gestión de siniestros y mucho más </p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->
@yield('main')


@include('shared.footer')

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="lnr lnr-arrow-up"></i>
</a>

<div id="loader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>

@include('shared.scripts')

</body>
</html>