<div>
    @if ($galeria)
    @if (count($galeria)>0)
        <div class="row mb-5">
            <h4>Galeria Actual:</h4>
            @foreach ($galeria as $gal)
                <div class="col-ms-12 col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-toolbar">
                                <button type="button" wire:click='btndescargarPage({{ $gal->id }})'
                                    class="btn btn-sm btn-icon  btn-outline btn-outline-dashed btn-outline-dark btn-active-light-dark me-2">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button type="button" wire:click="$emit('deleteImageGaleriaPa',{{ $gal->id }})"
                                    class="btn btn-sm btn-icon btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                    <i class="fas fa-trash-alt text-danger "></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0 shadow">
                            <div class="mb-5">
                                <div class="text-center px-4">
                                    <img class="mw-100 mh-100 " alt="galeria" src="{{ asset($gal->img) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @endif
    @endif
</div>
@push('js')
    <script>
         Livewire.on('deleteImageGaleriaPa', dataID => {
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
                    Livewire.emit('btnDeleteImageGaleriaPage', dataID);
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