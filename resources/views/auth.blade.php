<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {!! Meta::toHtml() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/images/icons/site.webmanifest">
    <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/images/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>

<body class="relative antialiased dark:bg-slate-800">
    @yield('content')
</body>

</html>
