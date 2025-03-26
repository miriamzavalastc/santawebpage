<div>


    @if (count($comisiones) > 0)



        <div class="col-12 pb-5">
            <h1 class="title-page-front">Comisiones Permanentes </h1>
            <h2 class="subtitle-page-front text-uppercase"> CONOCE NUESTRAS COMISIONES </h2>
        </div>


        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($comisiones as $d)
                <div class="col pb-4">
                    @if ($config)
                        @if ($config->veda == false)
                            <div class="card   h-100 dependencias shadow " style="border-left: 20px solid #ea5b0c;">
                            @else
                                <div class="card   h-100 dependencias shadow " style="border-left: 20px solid #222222;">
                        @endif
                    @else
                        <div class="card   h-100 dependencias shadow " style="border-left: 20px solid #ea5b0c;">
                    @endif
                    <div class="card-header pt-5 p-4">
                        <div class="row ">
                            <div class="col-sm-2">
                                @if ($config)
                                    @if ($config->veda == false)
                                        <img src="{{ asset('img/icons/naranja.svg') }}" alt="{{ $d->icono->nombre }}"
                                            width="50px">
                                    @endif
                                @else
                                    <img src="{{ asset('img/icons/naranja.svg') }}" alt="{{ $d->icono->nombre }}"
                                        width="50px">
                                @endif

                            </div>
                            <div class="col-sm-10">
                                <h5 class="card-title mx-3 "> {{ $d->nombre }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h6 class="card-subtitle mb-2 text-muted"><strong>Presidente:</strong></h6>
                        <p class="card-text">{{ $d->presidente ?? '' }}</p>
                        <h6 class="card-subtitle mb-2 text-muted"><strong>Secretario:</strong></h6>
                        <p class="card-text">{{ $d->secretario }}</p>
                        <h6 class="card-subtitle mb-2 text-muted"><strong>Vocal:</strong></h6>
                        <p class="card-text">{{ $d->vocal }}</p>
                    </div>
                </div>
        </div>
    @endforeach

</div>
@endif

@if (count($especiales) > 0)

    <div class="col-12 pb-5">
        <h1 class="title-page-front">Comisiones Especiales </h1>
        <h2 class="subtitle-page-front text-uppercase"> CONOCE NUESTRAS COMISIONES </h2>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($especiales as $d)
            <div class="col pb-4">
                @if ($config)
                    @if ($config->veda == false)
                        <div class="card   h-100 dependencias shadow " style="border-left: 20px solid #ea5b0c;">
                        @else
                            <div class="card   h-100 dependencias shadow " style="border-left: 20px solid #222222;">
                    @endif
                @else
                    <div class="card   h-100 dependencias shadow " style="border-left: 20px solid #ea5b0c;">
                @endif
                <div class="card-header pt-5 p-4">
                    <div class="row ">
                        <div class="col-sm-2">
                            @if ($config)
                                @if ($config->veda == false)
                                    <img src="{{ asset('img/icons/naranja.svg') }}" alt="{{ $d->icono->nombre }}"
                                        width="50px">
                                @endif
                            @else
                                <img src="{{ asset('img/icons/naranja.svg') }}" alt="{{ $d->icono->nombre }}"
                                    width="50px">
                            @endif
                        </div>
                        <div class="col-sm-10">
                            <h5 class="card-title mx-3 "> {{ $d->nombre }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <h6 class="card-subtitle mb-2 text-muted">Presidente:</h6>
                    <p class="card-text">{{ $d->presidente ?? '' }}</p>
                    <h6 class="card-subtitle mb-2 text-muted">Secretario:</h6>
                    <p class="card-text">{{ $d->secretario }}</p>
                    <h6 class="card-subtitle mb-2 text-muted">Vocal:</h6>
                    <p class="card-text">{{ $d->vocal }}</p>
                </div>
            </div>
    </div>
@endforeach

</div>

@endif



</div>
