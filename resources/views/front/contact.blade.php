@extends('layouts.front.main')
@section('title', 'Contacto')
@section('content')
    <div class="hero-img-overlay " style="background-image:url('{{ asset('front/img/santa-bg-03.jpg') }}');">

        <div class="title-page" style="background-color: #96262C;">
            <h1 class="hero-encabezado text-white">Contacto</h1>
            <h5>
                <span class="text-white text-subtitulo-encabezado">Gobierno de Santa Catarina</span>
            </h5>
        </div>

    </div>

    <div class="pt-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pb-4">
                @include('flash::message')
            </div>
            <div class="col-12 pb-5">
                <h1 class="title-page-front">Contáctanos </h1>
                <h2 class="subtitle-page-front text-uppercase"> UN GOBIBERNO CERCANO A TI </h2>
            </div>

            <div class="col-sm-12 col-md-8">
                <h5 class="contacto-titulo">Llena el siguiente formulario y nosotros nos comunicaremos contigo</h5>



                <form action="{{ route('form.sugerencias') }}" method="POST" class="pt-4 row">
                    @csrf
                    <div class="col-sm-12 col-md-6 pb-3">
                        <label for="nombre" class="form-label">Nombre(s) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg @error('nombre') is-invalid @enderror"
                            name="nombre" id="nombre" value="{{ old('nombre') }}">
                        @error('nombre')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-sm-12 col-md-6 pb-3">
                        <label for="apellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg @error('apellidos') is-invalid @enderror"
                            name="apellidos" id="apellidos" value="{{ old('apellidos') }}">
                        @error('apellidos')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-6 pb-3">
                        <label for="correo" class="form-label">Correo Electrónico <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control form-control-lg @error('correo') is-invalid @enderror"
                            name="correo" id="correo" value="{{ old('correo') }}">
                        @error('correo')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-6 pb-3">
                        <label for="telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg @error('telefono') is-invalid @enderror"
                            name="telefono" id="telefono" value="{{ old('telefono') }}">
                        @error('telefono')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-12  pb-3">
                        <label for="sugerencia" class="form-label">Sugerencia o queja sobre algún trámite o servicio /
                            Queja sobre el desempeño de algún funcionario público: <span
                                class="text-danger">*</span></label>
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
            <div class="col-sm-12 col-md-4 p-4" style="background-color: #F1F1F1">
                @if ($config)
                    <h4 class="contacto-titulo">CONTÁCTANOS</h4>
                    <hr>
                    <div class="pt-4"></div>


                    @if ($config->email_contact)
                        <h2 class="contacto-titulo-datos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="13" viewBox="0 0 28 23"
                                fill="none">
                                <path
                                    d="M3.5 3.57843L14 12.2598L25.25 3.57843M10.8745 11.3334L3.5 19.3627M24.5 18.7051L17.1245 11.3334M5 20.6667C3.34315 20.6667 2 19.2533 2 17.5098V5.15686C2 3.41338 3.34315 2 5 2H23C24.6569 2 26 3.41338 26 5.15686V17.5098C26 19.2533 24.6569 20.6667 23 20.6667H5Z"
                                    stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            POR CORREO ELECTRÓNICO
                        </h2>
                        <h4 class="contacto-datos">{!! $config->email_contact !!}</h4>
                        <div class="pt-4"></div>
                    @endif

                    @if ($config->phone_contact)
                        <h2 class="contacto-titulo-datos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 28 27"
                                fill="none">
                                <path
                                    d="M21.4422 2L26 6.55783M26 6.55783L21.9745 10.5874M26 6.55783L15.6437 6.55783M23.1229 21.9941C23.1229 21.9941 21.727 23.3651 21.3849 23.7671C20.8276 24.3618 20.171 24.6426 19.3103 24.6426C19.2276 24.6426 19.1393 24.6426 19.0565 24.6371C17.4179 24.5324 15.8951 23.8937 14.753 23.3486C11.6301 21.84 8.88797 19.6981 6.60928 16.9835C4.72785 14.7205 3.46988 12.6282 2.63676 10.3817C2.12364 9.01068 1.93605 7.94249 2.01881 6.93487C2.07398 6.29066 2.32226 5.75656 2.78021 5.29955L4.66164 3.42197C4.93199 3.16868 5.2189 3.03103 5.50029 3.03103C5.84788 3.03103 6.12927 3.24026 6.30583 3.41646C6.31134 3.42197 6.31686 3.42747 6.32238 3.43298C6.65894 3.74683 6.97895 4.07169 7.31551 4.41857C7.48655 4.59477 7.66311 4.77097 7.83966 4.95267L9.34591 6.45584C9.93076 7.03949 9.93076 7.57909 9.34591 8.16274C9.18591 8.32242 9.03142 8.48209 8.87142 8.63626C8.40795 9.10979 8.77203 8.74646 8.29202 9.17594C8.28098 9.18695 8.26995 9.19245 8.26443 9.20347C7.78993 9.67699 7.87821 10.1395 7.97752 10.4534C7.98304 10.4699 7.98856 10.4864 7.99408 10.5029C8.38581 11.45 8.93755 12.342 9.7762 13.4046L9.78171 13.4101C11.3045 15.2822 12.9101 16.7413 14.6812 17.8591C14.9074 18.0023 15.1391 18.1179 15.3598 18.228C15.5584 18.3271 15.746 18.4207 15.906 18.5198C15.9281 18.5308 15.9502 18.5474 15.9722 18.5584C16.1598 18.652 16.3364 18.696 16.5185 18.696C16.9764 18.696 17.2633 18.4097 17.3571 18.3161L18.4386 17.2368C18.6262 17.0496 18.9241 16.8239 19.2717 16.8239C19.6138 16.8239 19.8952 17.0386 20.0662 17.2258C20.0717 17.2313 20.0717 17.2313 20.0773 17.2368L23.1173 20.2707C23.6856 20.8323 23.1229 21.9941 23.1229 21.9941Z"
                                    stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            VÍA TELEFÓNICA
                        </h2>
                        <h4 class="contacto-datos">{!! $config->phone_contact !!}</h4>
                        <div class="pt-4"></div>
                    @endif

                    @if ($config->address_contact)
                        <h2 class="contacto-titulo-datos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 28 28"
                                fill="none">
                                <path
                                    d="M3.76669 6.61107L21.5006 23.9243M3.76669 6.61107C4.4265 5.8578 5.412 5.37959 6.51304 5.37959H12.5081M3.76669 6.61107C3.23602 7.21691 2.91602 8.00069 2.91602 8.85671V21.6062C2.91602 23.5265 4.52646 25.0833 6.51304 25.0833H19.7021C21.6887 25.0833 23.2992 23.5265 23.2992 21.6062V16.3905M12.5081 16.3905L4.71453 23.9243M21.0061 6.85737V6.78329M25.0827 6.7717C25.0827 9.34175 21.0061 12.7685 21.0061 12.7685C21.0061 12.7685 16.9294 9.34175 16.9294 6.7717C16.9294 4.6426 18.7546 2.91663 21.0061 2.91663C23.2575 2.91663 25.0827 4.6426 25.0827 6.7717Z"
                                    stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            EN PERSONA
                        </h2>
                        <h4 class="contacto-datos">{!! $config->address_contact !!}</h4>
                    @endif

                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
