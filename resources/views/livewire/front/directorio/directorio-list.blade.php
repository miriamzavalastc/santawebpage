<div>
    <div class="col-12 pb-5">
        <h1 class="title-page-front">Directorio de dependencias </h1>
        <h2 class="subtitle-page-front text-uppercase"> CONOCE NUESTRAS Oficinas </h2>
     </div>

    <div class="container-fluid">
         <div>
        <div class="row mb-10 pt-6">
            <div class="col-sm-12">
                <h3>Filtros:</h3>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label for="search_departamento" class="form-label">Departamento</label>
                    <input type="text" class="form-control form-control-lg" wire:model.defer="search_departamento" id="search_departamento"
                        placeholder="Departamento..." />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label for="search_lugar" class="form-label">Lugar</label>
                    <input type="text" class="form-control form-control-lg" wire:model.defer="search_lugar" id="search_lugar"
                        placeholder="Lugar..." />
                </div>
            </div>
           
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label for="search_ubicacion" class="form-label">Ubicación</label>
                    <input type="text" class="form-control form-control-lg" wire:model.defer="search_ubicacion" id="search_ubicacion"
                        placeholder="Ubicación..." />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <button wire:click="applyFilters" class="btn btn-lg btn-dark"><i class="fas fa-search"></i>
                    Buscar</button>
                <button wire:click="clearFilters" class="btn btn-lg btn-outline-dark">Limpiar Filtros</button>
            </div>
        </div>

        
    </div>
    <div class="pb-5"></div>
    </div>

    @if (count($data)>0)

   <div class="container-fluid">
   

  

    <div class="card border-light">
        <div class="card-header" style="background-color: #fff;">
            <div class="row pt-2">

                <div class="col-md-3 col-sm-12 col-xs-6 p-2 px-3 mb-2 d-flex align-items-center">
                    <span>Mostrar</span>
                    <select wire:model="perpage" class="mx-2 select-form-table form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Registros</span>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover directorio">
                    <thead>
                        <tr>
                          <th scope="col">Departamento</th>
                          <th scope="col">Lugar</th>
                          <th scope="col">Ubicación</th>
                          <th scope="col">Teléfono</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{$d->departamento}}</td>
                                <td>{{$d->lugar}}</td>
                                <td><i class="fas fa-map-marker-alt"></i> {{$d->ubicacion}}</td>
                                <td><i class="fas fa-phone-alt"></i> {{$d->telefono}}</td>
                            </tr>
                        @endforeach
                      </tbody>
                  </table>
            </div>
        </div>
        <div class="card-footer pt-4" style="background-color: #fff;">
            {{ $data->links() }}
        </div>
    </div>
   </div>

    @else
    <div class="row">
        <h4 class="text-center">No hay elementos para mostrar</h4>
    </div>
@endif

</div>
