<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Gobierno de Santa Catarina') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('back/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('back/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "system"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>body { background-color: url('{{asset('back/media/auth/bg4.jpeg')}}'); } [data-bs-theme="dark"] body { background-image: url('assets/media/auth/bg4-dark.jpeg'); }</style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-in -->
       @yield('content')
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>var hostUrl = "back/";</script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{asset('back/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('back/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->

    <!--end::Javascript-->
</body>
</html>