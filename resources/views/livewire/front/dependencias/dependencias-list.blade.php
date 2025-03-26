<div>
    <div class="col-12 pb-5">
       <h1 class="title-page-front">Dependencias Municipales</h1>
       <h2 class="subtitle-page-front text-uppercase"> CONOCE Y UBICA NUESTRAS DEPENDENCIAS </h2>
    </div>
   
    @if ($data)

        <div class="row row-cols-1 row-cols-md-3 g-4 ">
            @foreach ($data as $d)
                <div class="col pb-4">
                    <div class="card   h-100 dependencias shadow ">
                        <div class="card-header  pt-5 p-4" >
                            <div class="row ">
                                <div class="col-3">
                                    <!-- <img src="{{ asset($d->icono->icono) }}" alt="{{ $d->icono->nombre }}"
                                        width="80px"> -->
                                </div>
                                <div class="col-9">
                                    <h5 class="card-title mx-3 card-title-dependencia"> {{ $d->secretaria }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-5 ps-4 pe-4">
                            <h6 class="card-subtitle  card-subtitle-dependencia"><strong>Titular:</strong></h6>
                            <p class="card-text mb-3 card-text-dependencia">{{ $d->secretario }}</p>
                            <h6 class="card-subtitle card-subtitle-dependencia"><strong>Dirección:</strong></h6>
                            <p class="card-text mb-2 card-text-dependencia">{{ $d->direccion }}</p>
                        </div>
                        <div class="card-footer card-footer-dependencia p-4">
                            <div class="row">
                                <div class="col-6">
                                    <a href="tel:{{ $d->telefono }}" class="card-link ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 28 27" fill="none">
                                            <path d="M21.4422 2L26 6.55783M26 6.55783L21.9745 10.5874M26 6.55783L15.6437 6.55783M23.1229 21.9941C23.1229 21.9941 21.727 23.3651 21.3849 23.7671C20.8276 24.3618 20.171 24.6426 19.3103 24.6426C19.2276 24.6426 19.1393 24.6426 19.0565 24.6371C17.4179 24.5324 15.8951 23.8937 14.753 23.3486C11.6301 21.84 8.88797 19.6981 6.60928 16.9835C4.72785 14.7205 3.46988 12.6282 2.63676 10.3817C2.12364 9.01068 1.93605 7.94249 2.01881 6.93487C2.07398 6.29066 2.32226 5.75656 2.78021 5.29955L4.66164 3.42197C4.93199 3.16868 5.2189 3.03103 5.50029 3.03103C5.84788 3.03103 6.12927 3.24026 6.30583 3.41646C6.31134 3.42197 6.31686 3.42747 6.32238 3.43298C6.65894 3.74683 6.97895 4.07169 7.31551 4.41857C7.48655 4.59477 7.66311 4.77097 7.83966 4.95267L9.34591 6.45584C9.93076 7.03949 9.93076 7.57909 9.34591 8.16274C9.18591 8.32242 9.03142 8.48209 8.87142 8.63626C8.40795 9.10979 8.77203 8.74646 8.29202 9.17594C8.28098 9.18695 8.26995 9.19245 8.26443 9.20347C7.78993 9.67699 7.87821 10.1395 7.97752 10.4534C7.98304 10.4699 7.98856 10.4864 7.99408 10.5029C8.38581 11.45 8.93755 12.342 9.7762 13.4046L9.78171 13.4101C11.3045 15.2822 12.9101 16.7413 14.6812 17.8591C14.9074 18.0023 15.1391 18.1179 15.3598 18.228C15.5584 18.3271 15.746 18.4207 15.906 18.5198C15.9281 18.5308 15.9502 18.5474 15.9722 18.5584C16.1598 18.652 16.3364 18.696 16.5185 18.696C16.9764 18.696 17.2633 18.4097 17.3571 18.3161L18.4386 17.2368C18.6262 17.0496 18.9241 16.8239 19.2717 16.8239C19.6138 16.8239 19.8952 17.0386 20.0662 17.2258C20.0717 17.2313 20.0717 17.2313 20.0773 17.2368L23.1173 20.2707C23.6856 20.8323 23.1229 21.9941 23.1229 21.9941Z" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                        {{ $d->telefono }}</a>

                                </div>
                                <div class="col-6  text-end">
                                    <a href="{{ $d->mapa }}" target="_blank" class="card-link text-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 28 28" fill="none">
                                            <path d="M3.76767 6.61107L21.5016 23.9243M3.76767 6.61107C4.42748 5.8578 5.41298 5.37959 6.51402 5.37959H12.5091M3.76767 6.61107C3.23699 7.21691 2.91699 8.00069 2.91699 8.85671V21.6062C2.91699 23.5265 4.52743 25.0833 6.51402 25.0833H19.7031C21.6897 25.0833 23.3001 23.5265 23.3001 21.6062V16.3905M12.5091 16.3905L4.7155 23.9243M21.007 6.85737V6.78329M25.0837 6.7717C25.0837 9.34175 21.007 12.7685 21.007 12.7685C21.007 12.7685 16.9304 9.34175 16.9304 6.7717C16.9304 4.6426 18.7556 2.91663 21.007 2.91663C23.2585 2.91663 25.0837 4.6426 25.0837 6.7717Z" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                        ¿Cómo llegar?</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @else
        <div class="row pt-5">
            <h4>No hay dependecias para mostrar</h4>
        </div>
    @endif



</div>
