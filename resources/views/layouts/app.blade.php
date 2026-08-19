<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('portfolio.name') . ' — ' . config('portfolio.title'))</title>
    <meta
        name="author"
        content="{{ config('portfolio.name') }}"
    >
    <meta name="description" content="@yield('description', config('portfolio.description'))">
    <link
        rel="canonical"
        href="@yield('canonical', url()->current())"
    >
   {{-- Open Graph --}}
    <meta
        property="og:type"
        content="@yield('og_type', 'website')"
    >
    <meta
        property="og:title"
        content="@yield('og_title', config('portfolio.name') . ' — ' . config('portfolio.title'))"
    >
    <meta
        property="og:description"
        content="@yield('og_description', config('portfolio.description'))"
    >
    <meta
        property="og:url"
        content="{{ url()->current() }}"
    >
    <meta
        property="og:site_name"
        content="{{ config('portfolio.company') }}"
    >
    <meta
        property="og:locale"
        content="{{ config('portfolio.locale') }}"
    >
    <meta
        property="og:image"
        content="{{ asset(config('portfolio.og_image')) }}"
    >
    <meta name="theme-color" content="#12151C">
    
    <link rel="icon" type="image/png" href="{{ asset('mastericon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('head')
</head>
<body class="bg-ink font-sans text-white antialiased">
    
    @include('partials.nav')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
