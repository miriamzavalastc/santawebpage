@if ($config)
    @if ($config->veda === 1)
        <link rel="stylesheet" href="{{ asset('front/css/veda/boostrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/veda/main.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/veda/styles.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('front/css/boostrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
    @endif
@else
    <link rel="stylesheet" href="{{ asset('front/css/boostrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
@endif
