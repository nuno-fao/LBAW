<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- Styles -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript">
        // Fix for Firefox autofocus CSS bug
        // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951

    </script>

    <script src="{{ asset('js/like.js') }}" defer> </script>
    <script type="text/javascript" src={{ asset('js/app.js') }} defer>
    </script>
</head>

<body>

    @if (!Auth::check())
        @include('layouts.navbar_visitor')
    @else
        @include('layouts.navbar_user')
    @endif

    {{-- @include('layouts.navbar') --}}
    <main>
        <section id="sidebar">
            @yield('sidebar')
        </section>
        <section id="content">
            @yield('content')
        </section>
    </main>
    @include('layouts.footer')
</body>

</html>
