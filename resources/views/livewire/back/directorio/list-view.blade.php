@push('css')

@endpush
<div>
    <div class="row mb-10 pt-6">
        <div class="col-sm-12">
            <h3>Filtros:</h3>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="mb-5">
                <label for="search_departamento" class="form-label">Departamento</label>
                <input type="text" class="form-control" wire:model.defer="search_departamento" id="search_departamento"
                    placeholder="Departamento..." />
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="mb-5">
                <label for="search_lugar" class="form-label">Lugar</label>
                <input type="text" class="form-control" wire:model.defer="search_lugar" id="search_lugar"
                    placeholder="Lugar..." />
            </div>
        </div>
       
        <div class="col-sm-12 col-md-4">
            <div class="mb-5">
                <label for="search_aprobado" class="form-label">Aprobado</label>
                <select class="form-select" id="search_aprobado" wire:model.defer="search_aprobado"
                    aria-label="Selecciona...">
                    <option>Selecciona...</option>
                    <option value="1">Si</option>
                    <option value="false">No</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 pt-8">
            <a href="#" wire:click="applyFilters" class="btn btn-dark">Buscar</a>
            <a href="#" wire:click="clearFilters" class="btn btn-secondary">Limpiar Filtros</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row pt-2">

                <div class="col-md-12 col-sm-12 col-xs-6 p-2 px-3 mb-2 d-flex align-items-center">
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
                <table wire:sortable="updateDirectorioOrder"  id="kt_datatable_horizontal_scroll" class="table table-striped table-row-bordered gy-5 gs-7">
 


                    <thead>
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gray-300 ">
                            <th></th>
                            <th>DEPARTAMENTO</th>
                            <th>LUGAR</th>
                            <th class="text-center">APROBADO</th>
                            <th style="max-width: 130px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                            @foreach ($data as $d)
                                <tr  wire:sortable.item="{{ $d->id }}" wire:key="dependecia-{{ $d->id }}" >
                                    <td style="cursor: move;" wire:sortable.handle>
                                        <i class="ki-duotone ki-arrow-up-down fs-2x">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        </i>
                                    </td>
                                    <td>{{ $d->departamento }}</td>
                                    <td>{{ $d->lugar }}</td>
                                    <td class="text-center">
                                        @if ($d->aprobado == true)
                                            <i class="ki-duotone ki-check-circle text-success fs-2x">
                                                <i class="path1"></i>
                                                <i class="path2"></i>
                                            </i>
                                        @else
                                            <i
                                                class="ki-duotone ki-cross-circle  text-danger fs-2x                      ">
                                                <i class="path1"></i>
                                                <i class="path2"></i>
                                            </i>
                                        @endif
                                    </td>
                                    <td style="max-width: 130px;">
                                        <a href="#" class="btn btn-secondary btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Acciones
                                            <i class="ki-duotone ki-down fs-5 m-0"></i>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-400 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true" style="">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('sistema.directorio.show', $d->id) }}"
                                                    class="menu-link px-3">
                                                    Mostrar
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('sistema.directorio.edit', $d->id) }}"
                                                    class="menu-link px-3">
                                                    Editar
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" wire:click="$emit('deleteDirectorios',{{$d->id}})" data-kt-subscriptions-table-filter="delete_row"
                                                    class="menu-link px-3">
                                                    Eliminar
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">
                                    <i class="ki-duotone ki-information-3 fs-5x">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                    </i> <br>
                                    <h3>No hay datos para mostrar</h3>
                                    <br>
                                    <a href="{{ route('sistema.directorio.create') }}" class="btn btn-dark">Registrar
                                        un Departamento
                                        </a>
                                </td>
                            </tr>

                        @endif

                    </tbody>
                </table>


            </div>
        </div>
        <div class="card-footer">
            {{ $data->links() }}
        </div>
    </div>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>    
<script>
    window.addEventListener('dropCreate', function(e) {
            KTMenu.createInstances();
            KTMenu.updateDropdowns();
        });
    Livewire.on('deleteDirectorios', dataID => {
    Swal.fire({
        title: '¿Seguro que deseas eliminar el registro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#212529',
        cancelButtonColor: '#e74a3b',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'

    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleteDirectorio', dataID);
            Swal.fire({
                title: 'Eliminado',
                confirmButtonColor: '#212529',
                icon: 'success',
            })
        }
    })
});
</script>
@endpush