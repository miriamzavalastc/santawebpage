@php
    $routeName = Route::currentRouteName();
@endphp
<nav class="navbar sticky-top navbar-expand-lg bg-light bg-body-tertiary" id="navbar-header">
    <div class="container-fluid">
        <a class="navbar-brand d-block d-sm-block d-md-block d-lg-block d-xl-none"  href="{{route('index')}}">
            <img src="{{asset('front/img/logo-santa.png')}}" width="150px" alt="Gobierno de Santa Catarina">
        </a>

        <a href="{{route('index')}}" id="linklogoheader" class="d-none d-sm-none d-md-none d-lg-none d-xl-block logo-header-desktop">
            <img src="{{asset('front/img/logo-santa.png')}}" width="250px" alt="Gobierno de Santa Catarina"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars fa-lg"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 me-2">

                <li class="nav-item">
                    <a class="nav-link  @if ($routeName === 'index') active @endif" aria-current="page"
                        href="{{ route('index') }}">Inicio</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Gobierno
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item @if ($routeName === 'gobierno.alcalde') active @endif"
                                href="{{ route('gobierno.alcalde') }}">Alcalde</a></li>
                        <li><a class="dropdown-item  @if ($routeName === 'gobierno.cabildo') active @endif"
                                href="{{ route('gobierno.cabildo') }}">Integrantes del Cabildo</a></li>
                        <li><a class="dropdown-item @if ($routeName === 'gobierno.dependencias') active @endif"
                                href="{{ route('gobierno.dependencias') }}">Dependencias Municipales</a></li>
                        <li><a class="dropdown-item  @if ($routeName === 'gobierno.titulares.dependencias') active @endif"
                                href="{{ route('gobierno.titulares.dependencias') }}">Titulares de las Dependencias</a>
                       
                        </li>
                        <li><a class="dropdown-item @if ($routeName === 'gobierno.comisiones') active @endif "
                                href="{{ route('gobierno.comisiones') }}">Comisiones</a></li>
                        <li><a class="dropdown-item @if ($routeName === 'gobierno.directorio') active @endif "
                                href="{{ route('gobierno.directorio') }}">Directorio</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Marco Normativo</a></li>-->
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Cerca de ti
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('tramites.index') }}">Trámites y Servicios </a></li>
                        <!--<li><a class="dropdown-item" href="{{ route('programas.index') }}">Programas</a></li> -->
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Transparencia
                    </a>
                    <ul class="dropdown-menu">
                       @livewire('front.transparencia.links-view')
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{route('contacto.index')}}">Contacto</a>
                </li>
            </ul>

            <div style="width: 63px; height:63px;"> </div>

            <!--
            <a href="{{ url('lang', ['es']) }}" class="btn">
                <svg width="25" height="17" viewBox="0 0 35 27" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_152_10523" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0"
                        width="35" height="27">
                        <rect width="35" height="27" fill="white" />
                    </mask>
                    <g mask="url(#mask0_152_10523)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.0625 0H35V27H24.0625V0Z" fill="#D9071E" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H13.125V27H0V0Z" fill="#006923" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9375 0H24.0625V27H10.9375V0Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.7324 8.90259C15.7324 8.90259 14.9813 9.50183 15.1217 10.1407C15.2622 10.7796 16.7426 10.1407 16.5637 9.52164C16.3847 8.90259 15.7324 8.90259 15.7324 8.90259Z"
                            fill="#FCCA3D" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.585 10.4268C14.023 10.4268 13.7886 9.94499 13.9049 9.43293C13.967 9.15928 14.1284 8.81214 14.3917 8.36108L15.3294 8.94019C15.229 9.11217 15.149 9.26145 15.0896 9.38466C15.2862 9.44439 15.48 9.53312 15.6378 9.63995C16.1484 9.98585 16.3364 10.6022 15.7889 11.0589C15.683 11.1474 15.511 11.4487 15.4161 11.7382C15.6773 11.7532 15.8641 11.7936 16.0362 11.8983C16.5196 12.1924 16.4741 12.7289 16.106 13.1431C15.8451 13.4367 15.4967 13.6749 15.1684 13.7969C14.6224 13.9998 14.0381 13.9221 14.0381 13.203L14.038 13.1978C14.0369 13.1685 14.0351 13.1184 14.279 13.1128M14.2896 13.1125C14.286 13.1126 14.2825 13.1127 14.279 13.1128C13.8629 13.1067 13.7738 12.8801 13.7219 12.4767C13.7088 12.3745 13.7035 12.2772 13.6962 12.0673V12.0673L13.6962 12.0673V12.0673C13.6915 11.9313 13.6915 11.9313 13.6854 11.7977V11.7977L13.6837 11.7681C13.6755 11.6382 13.6698 11.5483 13.9528 11.5483H13.3184V10.4233H13.9528C14.3127 10.4233 14.5115 10.5483 14.6255 10.8067C14.6889 10.6895 14.7579 10.5792 14.8305 10.4803C14.7391 10.4477 14.6463 10.4268 14.585 10.4268M14.2896 13.1125C14.3014 13.1123 14.3136 13.1122 14.3265 13.1122L14.3098 13.1121L14.2896 13.1125ZM15.2817 12.4028L15.2987 12.3841C15.2968 12.3862 15.295 12.3888 15.2932 12.392L15.2817 12.4028ZM14.8029 12.7366C14.8025 12.7367 14.8023 12.7367 14.8025 12.7367L14.8041 12.7363C14.8036 12.7365 14.8032 12.7365 14.8029 12.7366ZM14.8043 12.7363L14.8148 12.7342C14.8105 12.7349 14.8065 12.7358 14.8043 12.7363ZM14.804 12.3123L14.8062 12.3291C14.805 12.3193 14.8038 12.3086 14.8027 12.2965L14.804 12.3123Z"
                            fill="#A8AC71" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.0725 13.9533C21.0725 13.9533 22.0842 10.8693 20.476 9.2729C18.8678 7.67649 17.0094 7.78331 17.0094 7.78331C17.0094 7.78331 16.4742 8.1923 17.0094 8.50421C17.5446 8.81613 17.3204 9.1152 17.3204 9.1152C17.3204 9.1152 16.4241 8.17915 15.8291 8.72603C15.2341 9.2729 16.3845 9.18967 16.2627 9.60144C16.141 10.0132 15.625 11.8414 16.3789 12.7644C17.1328 13.6874 15.6661 13.4871 15.9644 13.4871C16.2627 13.4871 17.3204 13.7019 17.3204 13.4871C17.3204 13.2723 17.688 14.3224 18.0027 14.3224C18.3173 14.3224 18.5602 13.9533 18.5602 13.9533C18.5602 13.9533 19.0013 14.3224 19.2701 14.3224C19.5388 14.3224 20.476 14.0809 20.476 14.0809L18.7047 12.5458C18.7047 12.5458 18.8115 11.8687 18.5602 11.7221C18.3089 11.5756 20.5747 13.0209 20.7521 13.4871C20.9295 13.9533 21.0725 13.9533 21.0725 13.9533Z"
                            fill="#8F4620" />
                        <path
                            d="M12.1037 13.1925C12.1037 13.1925 12.2679 12.6541 12.4438 12.6168C12.5961 12.5844 12.9164 12.8748 12.9164 12.8748C13.4854 16.1259 14.8613 17.3957 17.1442 17.3957C19.454 17.3957 20.8539 16.4308 21.6709 13.4324C21.6709 13.4324 22.1051 12.9762 22.2584 13.0269C22.4252 13.0821 22.6343 13.6857 22.6343 13.6857C22.4252 17.1919 19.9642 19.2702 17.1821 19.2702C14.3731 19.2702 12.0796 16.9414 12.1037 13.1925Z"
                            fill="#9FAB2F" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.584 15.3635C14.584 15.3635 17.87 16.0805 19.167 16.0805C20.464 16.0805 18.029 17.1693 17.0789 17.1693C16.1288 17.1693 14.584 15.3635 14.584 15.3635Z"
                            fill="#2FC2DC" />
                        <rect x="16.041" y="15.8625" width="2.1875" height="1.20536" rx="0.0833333" fill="#F9AA51" />
                        <path
                            d="M13.3164 13.653L14.2118 13.0068C15.3771 14.7153 17.1198 15.2773 19.5571 14.6907L19.8063 15.7861C16.9571 16.4719 14.7547 15.7616 13.3164 13.653Z"
                            fill="#259485" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.147 13.894C18.147 13.894 16.8195 14.6128 17.262 14.6128C17.7045 14.6128 19.4362 14.9721 19.0992 14.6128C18.7623 14.2534 18.147 13.894 18.147 13.894Z"
                            fill="#FCCA3D" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.5766 13.0369C16.5766 13.0369 16.3244 12.2876 15.7995 12.2876C15.2746 12.2876 15.4228 12.9023 15.1704 12.9023C14.9179 12.9023 15.4055 13.3348 15.6229 13.3348C15.8402 13.3348 16.5766 13.0369 16.5766 13.0369Z"
                            fill="#FCCA3D" />
                    </g>
                </svg>

            </a>
            <a href="{{ url('lang', ['en']) }}" class="btn">
                <svg width="25" height="17" viewBox="0 0 35 27" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_152_10524" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0"
                        width="35" height="27">
                        <rect width="35" height="27" fill="white" />
                    </mask>
                    <g mask="url(#mask0_152_10524)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H35V27H0V0Z" fill="#E31D1C" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0 2.25V4.5H35V2.25H0ZM0 6.75V9H35V6.75H0ZM0 13.5V11.25H35V13.5H0ZM0 15.75V18H35V15.75H0ZM0 22.5V20.25H35V22.5H0ZM0 27V24.75H35V27H0Z"
                            fill="#F7FCFF" />
                        <rect width="19.6875" height="15.75" fill="#2E42A5" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.27495 4.89093L3.43415 4.06039L4.33334 4.72624H3.82422L4.85381 5.66291L4.50606 6.97624H3.96139L3.43253 5.77002L2.9815 6.97624H1.63672L2.66631 7.91291L2.27495 9.39093L3.43415 8.56039L4.33334 9.22624H3.82422L4.85381 10.1629L4.50606 11.4762H3.96139L3.43253 10.27L2.9815 11.4762H1.63672L2.66631 12.4129L2.27495 13.8909L3.43415 13.0604L4.55575 13.8909L4.20704 12.4129L5.10778 11.4762H4.69232L5.62165 10.8104L6.52084 11.4762H6.01172L7.04131 12.4129L6.64995 13.8909L7.80915 13.0604L8.93075 13.8909L8.58204 12.4129L9.48278 11.4762H9.06732L9.99665 10.8104L10.8958 11.4762H10.3867L11.4163 12.4129L11.0249 13.8909L12.1841 13.0604L13.3058 13.8909L12.957 12.4129L13.8578 11.4762H13.4423L14.3716 10.8104L15.2708 11.4762H14.7617L15.7913 12.4129L15.3999 13.8909L16.5591 13.0604L17.6808 13.8909L17.332 12.4129L18.2328 11.4762H17.0864L16.5575 10.27L16.1065 11.4762H15.4544L15.1445 10.1629L16.0453 9.22624H15.6298L16.5591 8.56039L17.6808 9.39093L17.332 7.91291L18.2328 6.97624H17.0864L16.5575 5.77002L16.1065 6.97624H15.4544L15.1445 5.66291L16.0453 4.72624H15.6298L16.5591 4.06039L17.6808 4.89093L17.332 3.41291L18.2328 2.47624H17.0864L16.5575 1.27002L16.1065 2.47624H14.7617L15.7913 3.41291L15.4436 4.72624H14.8989L14.37 3.52002L13.919 4.72624H13.2669L12.957 3.41291L13.8578 2.47624H12.7114L12.1825 1.27002L11.7315 2.47624H10.3867L11.4163 3.41291L11.0686 4.72624H10.5239L9.99503 3.52002L9.544 4.72624H8.8919L8.58204 3.41291L9.48278 2.47624H8.33639L7.80753 1.27002L7.3565 2.47624H6.01172L7.04131 3.41291L6.69356 4.72624H6.14889L5.62003 3.52002L5.169 4.72624H4.5169L4.20704 3.41291L5.10778 2.47624H3.96139L3.43253 1.27002L2.9815 2.47624H1.63672L2.66631 3.41291L2.27495 4.89093ZM15.4436 9.22624L15.7913 7.91291L14.7617 6.97624H15.2708L14.3716 6.31039L13.4423 6.97624H13.8578L12.957 7.91291L13.2669 9.22624H13.919L14.37 8.02002L14.8989 9.22624H15.4436ZM13.0833 9.22624L12.1841 8.56039L11.2548 9.22624H11.6703L10.7695 10.1629L11.0794 11.4762H11.7315L12.1825 10.27L12.7114 11.4762H13.2561L13.6038 10.1629L12.5742 9.22624H13.0833ZM9.22881 10.1629L8.88106 11.4762H8.33639L7.80753 10.27L7.3565 11.4762H6.7044L6.39454 10.1629L7.29528 9.22624H6.87982L7.80915 8.56039L8.70834 9.22624H8.19922L9.22881 10.1629ZM9.544 9.22624H8.8919L8.58204 7.91291L9.48278 6.97624H9.06732L9.99665 6.31039L10.8958 6.97624H10.3867L11.4163 7.91291L11.0686 9.22624H10.5239L9.99503 8.02002L9.544 9.22624ZM6.69356 9.22624L7.04131 7.91291L6.01172 6.97624H6.52084L5.62165 6.31039L4.69232 6.97624H5.10778L4.20704 7.91291L4.5169 9.22624H5.169L5.62003 8.02002L6.14889 9.22624H6.69356ZM13.6038 5.66291L13.2561 6.97624H12.7114L12.1825 5.77002L11.7315 6.97624H11.0794L10.7695 5.66291L11.6703 4.72624H11.2548L12.1841 4.06039L13.0833 4.72624H12.5742L13.6038 5.66291ZM8.70834 4.72624L7.80915 4.06039L6.87982 4.72624H7.29528L6.39454 5.66291L6.7044 6.97624H7.3565L7.80753 5.77002L8.33639 6.97624H8.88106L9.22881 5.66291L8.19922 4.72624H8.70834Z"
                            fill="#F7FCFF" />
                    </g>
                </svg>

            </a>

            <a href="#" class="btn btn-primary btn-nav-search" data-bs-toggle="modal"
                data-bs-target="#modalserach">
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.4182 23.8678L29 29.4005M14.5357 7.66494C17.7311 7.66494 20.3214 10.3189 20.3214 13.5928M27.2 14.6467C27.2 21.7764 21.5588 27.5563 14.6 27.5563C7.64121 27.5563 2 21.7764 2 14.6467C2 7.51689 7.64121 1.73706 14.6 1.73706C21.5588 1.73706 27.2 7.51689 27.2 14.6467Z"
                        stroke="white" stroke-width="3" stroke-linecap="round" />
                </svg>

            </a>
            
        -->
        </div>

    </div>

</nav>

<div class="modal fade" id="modalserach" tabindex="-1" aria-labelledby="modalserach" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form action="#" method="GET">
              
                <div class="modal-header">
                    <h5 class="modal-title">Buscador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" name="buscar" class="form-control form-control-lg" id="buscador"
                            placeholder="¿Qué estas buscado?" required>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-lg">Buscar

                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 31 33"
                            fill="none">
                            <path
                                d="M23.4182 24.8645L29 30.6061M14.5357 8.0497C17.7311 8.0497 20.3214 10.8039 20.3214 14.2015M27.2 15.2951C27.2 22.6941 21.5588 28.6923 14.6 28.6923C7.64121 28.6923 2 22.6941 2 15.2951C2 7.89606 7.64121 1.89795 14.6 1.89795C21.5588 1.89795 27.2 7.89606 27.2 15.2951Z"
                                stroke="white" stroke-width="3" stroke-linecap="round" />
                        </svg>

                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
