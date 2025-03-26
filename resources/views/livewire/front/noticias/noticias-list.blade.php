<div>
    @if ($noticias and count($noticias) > 0)
    <section id="noticias" class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 pb-5">
                    <h2 class="header-section" id="">Noticias</h2>
                    <h3 class="subheader-section text-uppercase">NOTICIAS DE TU INTERÉS</h3>
                </div>

                <div class="col-sm-12 pb-3">
                   <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="mb-2">
                            <label for="search_nombre" class="form-label">Título</label>
                            <input type="text" class="form-control form-control-lg" wire:model.defer="search_nombre" id="search_nombre"
                                placeholder="Título..." />
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="mb-2">
                            <label for="search_categoria" class="form-label">Categoria</label>
                            <select  wire:model.defer="search_categoria" class="form-select form-select-lg">
                                <option value="" selected hidden>Selecciona...</option>
                                @foreach ($categorias as $cat)
                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                @endforeach
                            </select>
                          
                        </div>
                    </div>
                   
                
                    <div class="col-sm-12 col-md-4 pt-4 mt-1">
                        <a href="javascript:void(0);" wire:click="applyFilters" class="btn btn-lg btn-dark"><i class="fas fa-search"></i> Buscar</a>
                        <a href="javascript:void(0);" wire:click="clearFilters" class="btn  btn-lg btn-outline-dark">Limpiar Filtros</a>
                    </div>
                   </div>
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
       
        <div class="pt-4 d-flex justify-content-center">

            {{ $noticias->links() }}
        </div>
               
            </div>
        </div>
    </section>
    @endif
</div>
