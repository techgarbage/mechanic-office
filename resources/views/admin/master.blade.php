
<!doctype html>
<html lang="{{app()->getLocale()}}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @include('admin.shared.styles')
        <title>@yield('title', 'Escritorio') | {{config('app.name')}}</title>
    </head>

    <body class="bg-light">
        @include('admin.shared.navbar')
        <div class="d-flex">
            @include('admin.shared.sidebar')
            <div class="content p-4">
                <h2>@yield('main-title') @yield('action-button')</h2>
                @yield('main')
            </div>
        </div>
        @include('admin.shared.scripts')
    </body>

</html>