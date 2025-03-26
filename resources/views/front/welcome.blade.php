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
                            <h5>{{ $ba->titulo }}</h5>
                            <p>{{ $ba->subtitulo }}</p>
                            @if ($ba->btn_texto)
                                <a href="{{ $ba->btn_link }}" class="btn btn-primary">{{ $ba->btn_texto }}</a>
                            @endif
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

    <section class="tramites">
        <div class="container">
            <div class="row pt-5">
                <div class="col-sm-12 pt-5">
                    <h2 class="encabezado-separador"><span>Trámites más polulares</span></h2>
                    <div class="pt-5"></div>
                </div>
                <div class="col-sm-12 col-md-4 pb-3">
                    <a href="#" style="text-decoration: none; text-decoration-color: currentcolor;">
                        <div class="card h-100">
                            <div class="card-header" style="background-color: rgb(53,57,53);">
                                <i class="far fa-file-alt fs-2 text-white"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">PAGA TU PREDIAL</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-12 col-md-4 pb-3">
                    <a href="#" style="text-decoration: none; text-decoration-color: currentcolor;">
                        <div class="card h-100">
                            <div class="card-header" style="background-color: rgb(53,57,53);">
                                <i class="far fa-file-alt fs-2 text-white"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">REVISA TUS MULTAS</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-12 col-md-4 pb-3">
                    <a href="#" style="text-decoration: none; text-decoration-color: currentcolor;">
                        <div class="card h-100">
                            <div class="card-header" style="background-color: rgb(53,57,53);">
                                <i class="far fa-file-alt fs-2 text-white"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">SOLICITUD DE PERMISO DE VENTA, CONSUMO
                                    O EXPENDIÓ DE BEBIDAS ALCOHÓLICAS</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-12 col-md-4 pb-3">
                    <a href="#" style="text-decoration: none; text-decoration-color: currentcolor;">
                        <div class="card h-100">
                            <div class="card-header" style="background-color: rgb(53,57,53);">
                                <i class="far fa-file-alt fs-2 text-white"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">ACTA CERTIFICADA DE MATRIMONIO</h5>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-sm-12 col-md-4 pb-3">
                    <a href="#" style="text-decoration: none; text-decoration-color: currentcolor;">
                        <div class="card h-100">
                            <div class="card-header" style="background-color: rgb(53,57,53);">
                                <i class="far fa-file-alt fs-2 text-white"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">COPIA CERTIFICADA DE
                                    ACTA DE DEFUNCIÓN</h5>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-sm-12 col-md-4 pb-3">
                    <a href="#" style="text-decoration: none; text-decoration-color: currentcolor;">
                        <div class="card h-100">
                            <div class="card-header" style="background-color: rgb(53,57,53);">
                                <i class="far fa-file-alt fs-2 text-white"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">LICENCIAS DE CONSTRUCCIÓN</h5>
                            </div>
                        </div>
                    </a>
                </div>



                <div class="col-sm-12 text-center pt-4">
                    <a href="{{ route('tramites.index') }}" class="btn btn-primary">Más trámites <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="servicios-top">
        <div class="container">
            <div class="row pt-5">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link servicio-top-link active " id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                aria-controls="home-tab-pane" aria-selected="true">Nuevo Santa Bus</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link servicio-top-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">BeneDIF</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link servicio-top-link" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                aria-controls="contact-tab-pane" aria-selected="false">Abre Los Ojos</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-sm-12 col-md-8 pb-3">
                                    <img src="{{ asset('front/img/logos/logos_SC_santabus.png') }}" alt="Santa Bus"
                                        class="servicios-top-img img-fluid">
                                    <p class="pt-3"><strong>
                                            Súbete ya al Nuevo Santa Bus, haz tu registro ahora si eres de Santa Catarina.
                                            El Nuevo Santa Bus es un esfuerzo del Gobierno del Municipio para que
                                            puedas continuar tus estudios</strong></p>
                                </div>
                                <div class="col-sm-12 col-md-4 pt-5 pb-3">
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <h3 class="text-primary">Es muy sencillo</h3>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <h3 class="text-primary">Es gratuito</h3>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <h3 class="text-primary">Para habitantes de Santa
                                                Catarina</h3>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="col-sm-12 pb-3">
                                    <h2 class="text-primary">¿Cómo funciona?</h2>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <h2 class="text-primary">1</h2>
                                    <h4 class="text-primary">Fácil...</h4>
                                    <p><strong>
                                            Entra a la página de registro y
                                            descarga la App Nuevo Santa Bus
                                            desde Play Store y App Store.</strong></p>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <h2 class="text-primary">2</h2>
                                    <h4 class="text-primary">Rápido... </h4>
                                    <p><strong>
                                            Completa el registro. Es importante
                                            que los datos sean reales ya que
                                            el sistema enviará validaciones y
                                            formatos de uso de Santa Bus.</strong></p>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <h2 class="text-primary">3</h2>
                                    <h4 class="text-primary">Tu boleto seguro...</h4>
                                    <p><strong>
                                            Una vez terminado el registro tu
                                            AppCard Santa Bus es tu boleto
                                            para usar el Sistema, puedes
                                            personalizarlo</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">...</div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                            tabindex="0">...</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($noticias and count($noticias) > 0)

        <section id="noticias">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-sm-12 pt-5">
                        <h2 class="encabezado-separador"><span>Noticias</span></h2>
                        <div class="pt-5"></div>
                    </div>

                    @foreach ($noticias as $not)
                        @if ($loop->index === 0)
                            <a href="{{ route('noticias.show', ['slug' => $not->slug]) }}"
                                class="text-decoration-none noticia-principal-link">
                                <div class="col-sm-12 col-md-6">
                                    <h2 class="titulo-noticias text-uppercase">{{ $not->titulo }}</h2>
                                    <h6 class="fecha-noticias">{{ \Carbon\Carbon::parse($not->fecha)->format('d/m/Y') }}
                                    </h6>
                                    <a href="{{ route('noticias.show', ['slug' => $not->slug]) }}"
                                        class="text-decoration-none noticia-principal-link">
                                        <img src="{{ asset($not->img) }}" alt="{{ $not->titulo }}" class="img-fluid">
                                        <p class="fw-bold fst-italic pt-2">{{ $not->extracto }}</p>
                                        <br>
                                        <h6>Ver Más...</h6>
                                    </a>
                                </div>
                            </a>
                            <div class="col-sm-12 col-md-6">
                            @else
                                <a href="{{ route('noticias.show', ['slug' => $not->slug]) }}"
                                    class="text-decoration-none noticia-principal-link">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ $not->img }}" class="card-img-top"
                                                    alt="{{ $not->titulo }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title titulo-noticias text-uppercase">
                                                        {{ $not->titulo }}</h5>
                                                    <h6 class="fecha-noticias">
                                                        {{ \Carbon\Carbon::parse($not->fecha)->format('d/m/Y') }}</h6>
                                                    <p class="fw-bold fst-italic pt-2">{{ $not->extracto }}</p>
                                                    <p class="card-text"><small class="text-body-secondary">Ver
                                                            Más...</small></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                        @endif
                    @endforeach
                </div>

                <div class="col-sm-12">
                    <hr>
                    <h5 class="text-end">
                        <a href="{{ route('noticias.index') }}" class="btn btn-dark">Sala de prensa</a>
                    </h5>
                    <hr>
                </div>

            </div>
        </section>

    @endif

    @if ($eventos and count($eventos) > 0)
        <section id="eventos">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-sm-12 pt-5">
                        <h2 class="encabezado-separador"><span>Próximos eventos</span></h2>
                        <div class="pt-5"></div>
                    </div>

                    <div class="row">
                        @foreach ($eventos as $evet)
                            <div class="col-sm-12 col-md-3">

                                <div class="card h-100">
                                    <a href="{{ route('eventos.show', ['slug' => $evet->slug]) }}"
                                        class="text-decoration-none noticia-principal-link">
                                        <div class="bg-image hover-zoom">
                                            <img src="{{ $evet->img }}" class="card-img-top"
                                                alt="{{ $evet->nombre }}">
                                        </div>
                                        <div class="card-body"
                                            style="border-left: solid 15px {{ $evet->categoria->color }};">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="card-title titulo-noticias">{{ $evet->nombre }}</h5>

                                                    @if ($evet->fecha_inicio < $evet->fecha_final)
                                                        <h6 class=" pt-4">Fecha del Evento: <span
                                                                style="font-weight: 300;">
                                                                {{ \Carbon\Carbon::parse($evet->fecha_inicio)->setTimeZone(config('app.timezone'))->format('d/m/Y') }}
                                                                al
                                                                {{ \Carbon\Carbon::parse($evet->fecha_final)->setTimeZone(config('app.timezone'))->format('d/m/Y') }}</span>
                                                        </h6>
                                                    @else
                                                        <h6 class=" pt-4">Fecha del Evento: <span
                                                                style="font-weight: 300;">
                                                                {{ \Carbon\Carbon::parse($evet->fecha_inicio)->setTimeZone(config('app.timezone'))->format('d/m/Y') }}
                                                            </span></h6>
                                                    @endif
                                                    <h6><small>Horario: <br>
                                                            {{ $evet->hora_inicio->format('h:i A') }} -
                                                            {{ $evet->hora_final->format('h:i A') }}</small></h6>
                                                </div>

                                            </div>

                                        </div>
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="col-sm-12 col-md-6 offset-md-6 ">
                        <hr>
                        <h5 class="text-end">
                            <a href="{{ route('eventos.index') }}" class="btn btn-dark">Ver más eventos</a>
                        </h5>
                        <hr>
                    </div>
                </div>

            </div>
        </section>
    @endif

    <section>
        <div class="container">
            <div class="row pt-5">
                <div class="col-sm-12 pt-5">
                    <h2 class="encabezado-separador"><span>Conoce el Tráfico</span></h2>
                    <div class="pt-5"></div>
                </div>

                <div class="col-12">
                    <iframe src="https://embed.waze.com/es/iframe?zoom=14&lat=25.680586&lon=-100.468862&ct=livemap"
                        width="100%" height="600" allowfullscreen></iframe>

                </div>
            </div>

        </div>
    </section>

    <section id="form-sugerencias">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col-sm-12 pt-5">
                    <h2 class="encabezado-separador"><span>Contáctanos</span></h2>
                    <div class="pt-5"></div>
                </div>


                <div class="col-sm-12 col-md-8">
                    <h5>Llena el siguiente formulario y nosotros nos comunicaremos contigo</h5>

                    @include('flash::message')

                    <form action="{{ route('form.sugerencias') }}" method="POST" class="pt-4 row">
                        @csrf
                        <div class="col-sm-12 col-md-6 pb-3">
                            <label for="nombre" class="form-label">Nombre(s)</label>
                            <input type="text"
                                class="form-control form-control-lg @error('nombre') is-invalid @enderror" name="nombre"
                                id="nombre" value="{{ old('nombre') }}">
                            @error('nombre')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col-sm-12 col-md-6 pb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text"
                                class="form-control form-control-lg @error('apellidos') is-invalid @enderror"
                                name="apellidos" id="apellidos" value="{{ old('apellidos') }}">
                            @error('apellidos')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 pb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email"
                                class="form-control form-control-lg @error('correo') is-invalid @enderror" name="correo"
                                id="correo" value="{{ old('correo') }}">
                            @error('correo')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 pb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text"
                                class="form-control form-control-lg @error('telefono') is-invalid @enderror"
                                name="telefono" id="telefono" value="{{ old('telefono') }}">
                            @error('telefono')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-12  pb-3">
                            <label for="sugerencia" class="form-label">Sugerencia o queja sobre algún trámite o servicio /
                                Queja sobre el desempeño de algún funcionario público:</label>
                            <textarea name="sugerencia" rows="5" class="form-control @error('sugerencia') is-invalid @enderror">
@if (old('sugerencia'))
{{ old('sugerencia') }}
@endif
</textarea>
                            @error('sugerencia')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 pb-3">
                            <button type="submit" class="btn btn-lg btn-dark">Enviar Sugerencia / Queja</button>
                        </div>

                    </form>
                </div>
                <div class="col-sm-12 col-md-4 p-4" style="background-color: rgb(228, 228, 228)">
                    <h4>¿Tienes una emergencia?</h4>
                    <hr>
                    <div class="pt-4"></div>
                    <h2 class="">911</h2>
                    <h4 class="">Emergencia</h4>
                    <div class="pt-4"></div>
                    <h2 class="">070</h2>
                    <h4 class="">Informatel / Locatel</h4>
                    <div class="pt-4"></div>
                    <h2 class="">8110270945</h2>
                    <h4 class="">C 4</h4>
                    <div class="pt-4"></div>
                    <h2 class="">8123908765</h2>
                    <h4 class="">Atención Ciudadana</h4>
                </div>
            </div>


        </div>
    </section>
@endsection
@push('js')
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endpush
