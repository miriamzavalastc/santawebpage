<div>
    <section id="noticias">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="title-page-front">Programas</h1>
                    <h2 class="subtitle-page-front text-uppercase"> CONOCE LOS PROGRAMAS QUE TENEMOS PARA TI </h2>
                 </div>

                <div class="col-sm-12 col-md-4 pb-2">
                    <input type="text" wire:model.defer="search_nombre" class="form-control form-control-lg"
                        placeholder="Nombre del Programa">
                </div>
                <div class="col-sm-12 col-md-4 pb-2">
                    <select name="" wire:model.defer="search_secretaria" class="form-select form-select-lg"
                        id="">
                        <option value="">Todas las Secretarías</option>
                        @foreach ($secretarias as $se)
                            <option value="{{ $se->id }}">{{ $se->secretaria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 pb-2">
                    <button wire:click="applyFilters" class="btn btn-lg btn-dark"><i class="fas fa-search"></i>
                        Buscar</button>
                    <button wire:click="clearFilters" class="btn btn-lg btn-outline-dark">Limpiar Filtros</button>
                </div>

                <div class="col-sm-12 pt-5 pb-5">

                    @if (count($data) > 0)

                        @foreach ($data as $d)
                            <table class="table table-bordered">
                                <tr style="border-left:solid 10px #f26522; ">
                                    <td style="width: 25px; border-right:0px;"></td>
                                    <td style="border-width: 0px;  vertical-align: middle; width: 300px;">
                                        <h3>{{ $d->nombre }}</h3>
                                        <p style="font-size: 18px; font-weight: 200;">{{ $d->dependencia->secretaria }}
                                        </p>
                                        <h6>
                                            <span class="badge bg-light text-dark text-uppercase"> PROGRAMA
                                                {{ $d->tipo_de_programa }}</span>
                                        </h6>
                                    </td>
                                    <td style="border-width: 0px; max-width: 300px; vertical-align: middle;">
                                        <p>{!! $d->objetivo !!}</p>
                                    </td>
                                    <td style=" border-width: 0px; vertical-align: middle; text-align:right;"
                                        valign="center">
                                        <a href="{{route('programas.show', $d->slug)}}" class="btn btn-outline-dark">Ver Programa <i
                                                class="fas fa-angle-right"></i></a>
                                    </td>
                                </tr>
                            </table>
                        @endforeach
                    @else
                        <h4 class="text-center">No hay datos para mostrar</h4>
                    @endif

                </div>
                <div class="pt-4 pb-5 d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
