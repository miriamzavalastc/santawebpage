<div>
    @if ($pagina)
    @if ($pagina->archivo)
    <div class="col-sm-12 ">
        <div class="mb-5">
            <label for="archivo" class="form-label ">Archivo PDF Actual:</label>

            <div class="col-ms-12 col-md-3">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="card-toolbar">
                         
                            <button type="button" wire:click='btndescargarFilePagina({{ $pagina->id }})'
                                class="btn btn-sm btn-icon  btn-outline btn-outline-dashed btn-outline-dark btn-active-light-dark me-2">
                                <i class="fas fa-download"></i>
                            </button>
                            <button type="button" wire:click="$emit('deleteFilePagina', {{ $pagina->id }})"
                                class="btn btn-sm btn-icon btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                <i class="fas fa-trash-alt text-danger "></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0 shadow">
                        <div class="mb-5">
                            <div class="text-center px-4 pt-5 pb-2">
                                <i class="fa-regular fa-file-pdf " style="font-size: 80px"></i>
                                <p class="pt-2">{{
                                 str_replace('storage/paginas/',"", $pagina->archivo);}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

</div>
@push('js')
    <script>
         Livewire.on('deleteFilePagina', dataID => {
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
                    Livewire.emit('btnDeleteFilePagina', dataID);
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