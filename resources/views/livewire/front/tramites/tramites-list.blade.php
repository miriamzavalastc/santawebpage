<div>
    <section id="noticias">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 pb-5">
                    <h2 class="header-section" id="">Trámites más solicitados</h2>
                    <h3 class="subheader-section text-uppercase">Realiza tus tràmites online </h3>
                </div>

                @if ($tramitestop and count($tramitestop) > 0)
                    
                
                <div class="container text-center pt-3 pb-5">
                    <div class="row justify-content-center">
                        @foreach ($tramitestop as $tra)
                        <div class="col-4 col-md-2 pt-4 pb-4 card-tramites-home shadow-sm m-2">
                            <a class="link-tramites-home" href="{{route('tramites.show', $tra->slug)}}">
                             <img src="{{asset($tra->icono->icono)}}" width="60px" height="60px" alt="{{$tra->nombre}}">
                             <p class="text-tramites-nombre pt-4">{{$tra->nombre}}</p>
                            </a>
                           </div>
                        @endforeach
                      
                      
                    </div>
                    
                  </div>
                  @endif

                <div class="col-sm-12 pb-2">
                    <h2 class="header-section" id="">Buscar trámites </h2>
                </div>

                <div class="col-sm-12 col-md-4 pb-2">
                    <input type="text" wire:model.defer="search_nombre" class="form-control form-control-lg"
                        placeholder="Nombre del Trámite o Servicio">
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
                                <tr style="border-left:solid 10px #222222;">
                                    <td style="width: 25px; border-right:0px"></td>
                                    <td style="border-width: 0px;  vertical-align: middle; width: 500px;  padding-top:20px;  padding-bottom:20px;  ">
                                        <h3 style="font-weight: 800;">{{ $d->nombre }}</h3>
                                        <p style="font-size: 18px; font-weight: 400;">{{ $d->dependencia->secretaria }}</p>
                                        <h6>
                                            @if($d->presencial == true)
                                            <span class="badge bg-primary text-light text-uppercase">Presencial</span>   
                                            @endif                                         
                                            @if ($d->en_linea == true)
                                            <span class="badge bg-primary text-light text-uppercase">En Línea</span>
                                            @endif
                                            @if($d->telefonico == true)
                                            <span class="badge bg-primary text-light text-uppercase">Por Teléfono</span>
                                            @endif
                                          
                                        </h6>
                                    </td>
                                    <td style="border-width: 0px; max-width: 300px; vertical-align: middle;">
                                        <p>{!! $d->objetivo !!}</p>
                                    </td>
                                    <td style=" border-width: 0px; vertical-align: middle; text-align:right;"
                                        valign="center">
                                        <a href="{{route('tramites.show', $d->slug)}}" class="btn btn-outline-dark">Ver Trámite o Servicio <i
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
