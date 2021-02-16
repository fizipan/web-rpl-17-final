<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="/images/favicon.ico">
    <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16" />

    <title>@yield('title')</title>

    {{-- style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

</head>

<body>

    <div id="app">
        <section class="hero-img">
        {{-- navbar --}}
        @include('includes.navbar')
        {{-- main --}}
        @yield('main')
    </section>

        {{-- page-content --}}
        @yield('content')

        {{-- footer --}}
        @include('includes.footer')
    </div>
    

    
    {{-- style --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>