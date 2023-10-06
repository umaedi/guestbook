<!doctype html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#6236FF ">
    <title>Tulang Bawang - Lampung Fair 2023</title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="{{ asset('img') }}/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    @yield('content')
    <script src="{{ asset('js') }}/lib/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js') }}/base.js"></script>
    <script src="{{ asset('js') }}/jquery-3.3.1.min.js"></script>
    {{-- <script type="module" src="../../unpkg.com/ionicons%405.4.0/dist/ionicons/ionicons.js"></script> --}}
    @stack('js')
  </body>
  </html>