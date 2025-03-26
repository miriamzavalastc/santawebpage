<div>
    <div class="container">
        <section id="eventos" class="pb-5">
            <div class="row">
                <div class="col-sm-12 text-end">
                    <a href="{{route('eventos.index')}}" class="btn btn-lg btn-outline-dark"><i class="fas fa-redo-alt"></i> Ver
                        Próximos Eventos</a>
                </div>
                <div class="col-sm-12 pt-5">
                    <h2 class="encabezado-separador"><span>Eventos pasados</span></h2>
                    <div class="pt-5"></div>
                </div>
                @if ($eventos and count($eventos) > 0)

                    @foreach ($eventos as $evet)
                    <div class="col-sm-12 col-md-4 mb-3">
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

                    <div class="pt-4 d-flex justify-content-center">

                        {{ $eventos->links() }}
                    </div>
                @else
                    <h3 class="text-center">Por El Momento No Hay Eventos Pasados </h3>

                @endif


            </div>
        </section>
    </div>
</div>
