<div>
    <div class="col-12 pb-5">
        <h1 class="title-page-front">Conoce a los titulares de las dependencias </h1>
        <h2 class="subtitle-page-front text-uppercase"> ELLLOS SON LOS TITULARES DE LAS DEPENDENCIAS </h2>
     </div>
    

    @if (count($data)>0)
    <div class="row row-cols-1 row-cols-md-4 row-cols-xl-4  g-4">
        @foreach ($data as $d)
            <div class="col pb-4">
              
                <div class="card  h-100 dependencias shadow ">
                   <img src="{{asset($d->img)}}" class="card-img-top img-fluid"  alt="{{$d->nombre}}">
                    <div class="card-body p-4">
                        <p><small>{{$d->dependencia->secretaria}}</small></p>
                        <hr>
                        <h6 class="card-subtitle mb-2 text-muted"><strong>{{$d->nombre}}</strong></h6>
                        <p><small>{{$d->cargo}}</small> <br> <small style="font-size: 12px;">{{$d->correo}}</small></p>
                    </div>
                    <div class="card-footer p-4 pb-3">
                        <div class="row">
                            <div class="col-6">
                                <a href="tel:{{ $d->telefono }}" class="card-link"><i class="fas fa-phone-alt"></i>
                                    {{ $d->telefono }}</a>

                            </div>
                            <div class="col-6  text-end">
                                <p class="card-link">Ext. {{$d->extension}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    @else
        <div class="row">
            <h4 class="text-center">No hay titulares de dependecias para mostrar</h4>
        </div>
    @endif
</div>
