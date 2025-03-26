@php
    $routeName = Route::currentRouteName();
@endphp
<div class="container-fluid pt-4">
    
     <div class="row">
        <div class="col-6 col-xs-12 col-md-8 ">
            <a href="{{route('index')}}"><img class="logo img-fluid " src="{{asset('front/img/logo-santa.png')}}" alt="Gobierno de Santa Catarina" ></a>
        </div>
        <div class="col-6 d-none d-sm-block col-md-4 col-lg-3">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pb-3">Síguenos</h4>
                </div>
                <div class="col-sm-12 icons-social-header gap-auto">
                    <a href="https://www.facebook.com/stacatarinagob/" target="_blank" class="icon-social-nav text-dark"><i class="fa-brands fa-square-facebook fa-lg"></i></a>
                    <a href="https://www.twitter.com/stacatarinagob/" target="_blank" class="icon-social-nav text-dark "><i class="fa-brands fa-x-twitter fa-lg"></i></a>
                    <a href="https://www.instagram.com/stacatarinagob/" target="_blank" class="icon-social-nav text-dark "><i class="fab fa-instagram-square fa-lg"></i></a>
                    <a href="https://www.youtube.com/channel/UCK-6cQJL_904665N1_nLTWw/" target="_blank" class="icon-social-nav text-dark"><i class="fa-brands fa-youtube fa-lg"></i></a>
                </div>
                <div class="col-sm-10 pt-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Buscar</button>
                      </form>
                </div>
            </div>
            
        </div>
     </div>
   
</div>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top pt-4">
        <div class="primary-menu container-fluid justify-content-center">
          <div class="navbar-brand d-block d-sm-none col-8" >
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
              <button class="btn btn-outline-dark" type="submit">Buscar</button>
            </form>  
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0">
              <li class="nav-item mx-2">
                <a class="nav-link @if ($routeName === 'index') active @endif" aria-current="page" href="{{route('index')}}">Inicio</a>
              </li>
              <li class="nav-item mx-2 dropdown">
                <a class="nav-link  @if ($routeName === 'gobierno.alcalde'
                OR $routeName === 'gobierno.dependencias' 
                OR $routeName === 'gobierno.comisiones')
                active  @endif dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Gobierno
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item @if ($routeName === 'gobierno.alcalde') active @endif" href="{{route('gobierno.alcalde')}}">Alcalde</a></li>
                  <li><a class="dropdown-item  @if ($routeName === 'gobierno.cabildo') active @endif" href="{{route('gobierno.cabildo')}}">Integrantes del Cabildo</a></li>
                  <li><a class="dropdown-item @if ($routeName === 'gobierno.dependencias') active @endif" href="{{route('gobierno.dependencias')}}">Dependencias Municipales</a></li>
                 <!-- <li><a class="dropdown-item  @if ($routeName === 'gobierno.titulares.dependencias') active @endif" href="{{route('gobierno.titulares.dependencias')}}">Titulares de las Dependencias</a></li> -->
                  <li><a class="dropdown-item @if ($routeName === 'gobierno.comisiones') active @endif " href="{{route('gobierno.comisiones')}}">Comisiones</a></li>
                  <li><a class="dropdown-item @if ($routeName === 'gobierno.directorio') active @endif " href="{{route('gobierno.directorio')}}">Directorio</a></li>
                  <li><a class="dropdown-item" href="#">Marco Normativo</a></li>                  
                </ul>
              </li>

              

              <li class="nav-item mx-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cerca de ti
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('tramites.index')}}">Trámites y Servicios </a></li>
                  <li><a class="dropdown-item" href="{{ route('programas.index') }}">Programas</a></li>     
                </ul>
              </li>

              
              <li class="nav-item mx-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Noticias
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('noticias.index') }}">Noticias </a></li>
                  <li><a class="dropdown-item" href="{{ route('eventos.index') }}">Eventos</a></li>     
                </ul>
              </li>
             
              
             
              <li class="nav-item mx-2">
                <a class="nav-link" aria-current="page" href="#">Transparencia</a>
              </li>
             
            </ul>
           
          </div>
        </div>
      </nav>
