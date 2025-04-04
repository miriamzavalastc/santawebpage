@php
    setlocale(LC_ALL, 'es_ES.UTF-8');
    setlocale(LC_TIME, 'es_ES');
    \Carbon\Carbon::setLocale('es_ES');
@endphp
@extends('layouts.front.main')
@section('title', 'Gobierno Santa Catarina')
@section('content')
    @if (count($banners) > 0)
        <div id="carouselHomeSlider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($banners as $ba)
                    <button type="button" data-bs-target="#carouselHomeSlider" data-bs-slide-to="{{ $loop->index }}"
                        @if ($loop->index === 0) class="active" @endif aria-current="true" aria-label=""></button>
                @endforeach
            </div>
            <div class="carousel-inner">

                @foreach ($banners as $ba)
                    <div class="carousel-item @if ($loop->index === 0) active @endif" data-bs-interval="10000">
                        <img src="{{ asset($ba->img) }}" class="d-block w-100" alt="{{ $ba->titulo }}">
                        <div class="carousel-caption d-block d-md-block">
                           <img src="{{asset('front/img/250314LS.png')}}" alt="Gobierno de Santa Catarina" class="imgsta" width="390px" style="-webkit-filter: brightness(100%);">
                           <!-- <h5>{{ $ba->titulo }}</h5>
                            <p>{{ $ba->subtitulo }}</p>
                            @if ($ba->btn_texto)
                                <a href="{{ $ba->btn_link }}" class="btn btn-primary">{{ $ba->btn_texto }}</a>
                            @endif-->
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomeSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHomeSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif

    @if ($tramites and count($tramites) > 0)
        <section id="tramites" class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 pb-3">
                        <h2 class="text-center header-section" id=""> {{ trans('home.tramites_mas_solicitados') }}
                        </h2>
                        <h3 class="text-center subheader-section text-uppercase">Realiza tus tràmites online</h3>
                    </div>

                    <div class="container text-center pt-3 pb-3">
                        <div class="row justify-content-center">
                            @foreach ($tramites as $tra)
                                <div class="col-4 col-md-2 pt-4 pb-4 card-tramites-home shadow-sm m-2">
                                    <a class="link-tramites-home" href="{{ route('tramites.show', $tra->slug) }}">
                                        <img src="{{ asset($tra->icono->icono) }}" width="60px" height="60px"
                                            alt="{{ $tra->nombre }}">
                                        <p class="text-tramites-nombre pt-4">{{ $tra->nombre }}</p>
                                    </a>
                                </div>
                            @endforeach


                        </div>

                    </div>

                    <div class="col-sm-12 text-center pt-3">
                        <a href="{{ route('tramites.index') }}" class="btn btn-lg btn-outline-dark text-center ">Ver todos los
                            trámites</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

@if ($tramites_top AND  count($tramites_top) > 0)
<section id="tramites-populares" class=" pb-5">
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12 ">
                <ul class="nav nav-tabs nav-pills nav-fill flex-column flex-sm-row " id="myTab" role="tablist">
                @foreach ($tramites_top as $top)
                <li class="nav-item" role="presentation">
                    <button class="servtop nav-link servicio-top-link @if($loop->index  == 0) active @endif" id="home-tab-{{$loop->index}}" data-bs-toggle="tab"
                        data-bs-target="#home-tab-pane-{{$loop->index}}" type="button" role="tab" aria-controls="home-tab-pane-{{$loop->index}}"
                        aria-selected="true">{{$top->nombre}}</button>
                </li>
              
                @endforeach
                </ul>
                <div class="tab-content shadow-sm p-5" id="myTabContent">
                @foreach ($tramites_top as $top)
               
                    <div class="tab-pane fade  @if($loop->index  == 0) show active @endif" id="home-tab-pane-{{$loop->index}}" role="tabpanel" aria-labelledby="home-tab-{{$loop->index}}"
                        tabindex="0">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 pt-3 pb-3 secctop">
                                <img src="{{ asset($top->logo) }}" alt="{{$top->nombre}}"
                                    class="servicios-top-img img-fluid">
                                <p class="pt-3 text-tramites-top"><strong>
                                       {!! $top->descripcion !!}</strong></p>
                            </div>
                            <div class="col-sm-12 col-md-4 pt-3 pb-3">
                                <a href="{{$top->link}}" class="card-tramites-top-link-url " target="_blank">
                                    <div class="card card-tramites-top-link">
                                        <div class="card-body">
                                            <p class="card-tramites-top-link-text">Iniciar el Trámite</p>
                                            <div class="row">
                                                <div class="col-3">
                                                    <p class="card-tramites-top-link-icon"> <i
                                                            class="fa-solid fa-up-right-from-square"></i></p>
                                                </div>
                                                <div class="col-9">
                                                    <p class="text-white"> Link para inciar <br> su solicitud</p>
                                                </div>
                                            </div>
        
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-12 pb-1 pt-3 mt-3">
                                <h2 class="text-tramites-top-primary">¿Cómo funciona?</h2>
                            </div>
                            <div class="col-sm-12 col-md-4 p-4 pb-0">
                                <p class="text-primary text-tramites-top-number">01 <span
                                        class="text-tramites-top-list">{{$top->punto_uno_titulo}}</span></p>
                                <p class="text-tramites-top-descriptio">
                                    {{$top->punto_uno_descripcion}}</p>
                            </div>

                            <div class="col-sm-12 col-md-4 p-4 pb-0">
                                <p class="text-primary text-tramites-top-number">02 <span
                                        class="text-tramites-top-list">{{$top->punto_dos_titulo}}</span></p>
                                <p class="text-tramites-top-descriptio">
                                    {{$top->punto_dos_descripcion}}.</p>
                            </div>


                            <div class="col-sm-12 col-md-4 p-4 pb-0">
                                <p class="text-primary text-tramites-top-number">03 <span
                                        class="text-tramites-top-list">{{$top->punto_tres_titulo}}</span></p>
                                <p class="text-tramites-top-descriptio">
                                    {{$top->punto_tres_descripcion}}
                                </p>
                            </div>


                        </div>
                    </div>

                @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</section>
@endif
   

    @if ($noticias and count($noticias) > 0)
        <section id="noticias" class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 pb-5">
                        <h2 class="text-center header-section" id="">Noticias</h2>
                        <h3 class="text-center subheader-section text-uppercase">NOTICIAS DE TU INTERÉS</h3>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($noticias as $not)
                        
                            
                            <div class="col ">
                                <a href="{{ route('noticias.show', ['slug' => $not->slug]) }}"
                                    class="text-decoration-none noticia-principal-link">
                                   <div class="shadow-sm p-3 h-100">
                                    <div class="card ">
                                        <img src="{{ $not->img }}" class="card-img" alt="{{ $not->titulo }}">
                                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end"
                                            style="padding: 0px">
                                            <div class="card-footer eventos-footer-card-color"
                                                style="background-color: {{ $not->categoria->color }};  ">
                                                <span style="font-weight: 300;">
                                                    <span class="cat-name-light-noticia"> {{ $not->categoria->nombre }}
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="card-body pb-0 mb-0">
                                            <h5 class="card-title titulo-noticias"> {{ $not->titulo }}</h5>
                                            <p class="text-end fecha-noticia mb-0">
                                                {{ \Carbon\Carbon::parse($not->fecha)->translatedFormat('d F Y') }}</p>
                                        </div>
                                   </div>
                                    
                                </a>
                            </div>
                        
                    @endforeach
                </div>
                    <div class="col-sm-12 text-center pt-5">
                        <a href="{{ route('noticias.index') }}" class="btn btn-lg btn-outline-dark text-center ">Ver todas las
                            noticias</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($eventos and count($eventos) > 0)
        <section id="eventos" class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 pb-5">
                        <h2 class="text-center header-section" id="">Eventos Próximos</h2>
                        <h3 class="text-center subheader-section text-uppercase">ESTOS SON LOS EVENTOS QUE TENEMOS PARA TI
                        </h3>
                    </div>
                    @foreach ($eventos as $evet)
                        <div class="col-sm-12 col-md-4 mb-3 pb-3">
                            <a href="{{ route('eventos.show', ['slug' => $evet->slug]) }}"
                                class="text-decoration-none noticia-principal-link">
                                <div class="shadow-sm p-3 h-100">                                
                                    <div class="card text-bg-dark ">
                                        <img src="{{ $evet->img }}" class="card-img" alt="{{ $evet->nombre }}">
                                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end"
                                            style="padding: 0px">
                                            <div class="card-footer eventos-footer-card-color"
                                                style="background-color: {{ $evet->categoria->color }};  ">
                                                <span style="font-weight: 300;">
                                                    <span class="date-light-event"> del </span>
                                                    <span class="date-dark-event">
                                                        {{ \Carbon\Carbon::parse($evet->fecha_inicio)->format('d') }}
                                                    </span>
                                                    <span class="date-light-event">
                                                        {{ \Carbon\Carbon::parse($evet->fecha_inicio)->translatedFormat('M') }}
                                                    </span>
                                                    <span class="date-light-event">
                                                        al
                                                    </span>
                                                    <span class="date-dark-event">
                                                        {{ \Carbon\Carbon::parse($evet->fecha_final)->format('d') }}
                                                    </span>
                                                    <span class="date-light-event">
                                                        {{ \Carbon\Carbon::parse($evet->fecha_final)->translatedFormat('M') }}
                                                    </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title titulo-noticias">{{ $evet->nombre }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    <div class="col-sm-12 text-center pt-3">
                        <a href="{{ route('eventos.index') }}" class="btn btn-lg btn-outline-dark text-center ">Ver todos los
                            eventos</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section id="ruta" class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 pb-3">
                    <h2 class="text-center header-section" id="">Revisa Tu Ruta</h2>
                    <h3 class="text-center subheader-section text-uppercase">TOMA CON TIEMPO TU CAMINO</h3>
                </div>
                <div class="col-12">
                    <iframe src="https://embed.waze.com/es/iframe?zoom=14&lat=25.680586&lon=-100.468862&ct=livemap"
                        width="100%" height="600" allowfullscreen></iframe>

                </div>

            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
