@php
    $routeName = Route::currentRouteName();
@endphp
<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('sistema.home') }}">
            <h4 class="text-white">Gobierno de Santa Catarina</h4>
        </a>

    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">

                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Administración</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if ($routeName === 'sistema.home') active @endif"
                        href="{{ route('sistema.home') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-graph-4  fs-2 ">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @hasrole('Administrador')
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if ($routeName === 'sistema.users.index') active @endif"
                        href="{{ route('sistema.users.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-user fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Usuarios</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

                 <!--begin:Menu item-->
                 <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if ($routeName === 'sistema.iconos.index' or
                    $routeName === 'sistema.iconos.create' or
                    $routeName === 'sistema.iconos.edit') active @endif"
                        href="{{ route('sistema.iconos.index') }}">
                        
                        <span class="menu-icon">
                            <i class="ki-duotone ki-feather fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            </span>
                        <span class="menu-title">Iconos</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                 <!--begin:Menu item-->
                 <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if ($routeName === 'sistema.transparencia.index' or
                    $routeName === 'sistema.transparencia.create' or
                    $routeName === 'sistema.transparencia.edit') active @endif"
                        href="{{ route('sistema.transparencia.index') }}">
                        
                        <span class="menu-icon">
                            <i class="ki-duotone ki-menu  fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        </i>
                            </span>
                        <span class="menu-title">Links Transparencia</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

                 <!--begin:Menu item-->
                 <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if ($routeName === 'sistema.configuracion.index' or
                    $routeName === 'sistema.configuracion.create' or
                    $routeName === 'sistema.configuracion.edit') active @endif"
                        href="{{ route('sistema.configuracion.index') }}">
                        
                        <span class="menu-icon">
                            <i class="ki-duotone ki-wrench  fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        </i>
                            </span>
                        <span class="menu-title">Configuración de sitio</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @endhasrole
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Modificar el sitio web</span>
                    </div>
                    <!--end:Menu content-->

                </div>
                <!--end:Menu item-->
                @hasrole('Administrador|Home')
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion  @if (
                        $routeName === 'sistema.banner.index' or
                            $routeName === 'sistema.banner.create' or
                            $routeName === 'sistema.banner.edit') hover show @endif ">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-screen fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                            </i>
                        </span>
                        <span class="menu-title">Home</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                   
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.banner.index' or
                                    $routeName === 'sistema.banner.create' or
                                    $routeName === 'sistema.banner.edit') active @endif"
                                href="{{ route('sistema.banner.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Portada Banners</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                @endhasrole
                @hasrole('Administrador|Ayuntamiento')
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (
                        $routeName === 'sistema.alcalde.index' or
                            $routeName === 'sistema.dependencia.index' or
                            $routeName === 'sistema.dependencia.create' or
                            $routeName === 'sistema.dependencia.edit' or
                            $routeName === 'sistema.dependencia.show' or
                            $routeName === 'sistema.titulares.dependencia.index' or
                            $routeName === 'sistema.titulares.dependencia.create' or
                            $routeName === 'sistema.titulares.dependencia.edit' or
                            $routeName === 'sistema.titulares.dependencia.show' or
                            $routeName === 'sistema.comisiones.index' or
                            $routeName === 'sistema.comisiones.create' or
                            $routeName === 'sistema.comisiones.edit' or
                            $routeName === 'sistema.comisiones.show' or
                            $routeName === 'sistema.directorio.index' or
                            $routeName === 'sistema.directorio.create' or
                            $routeName === 'sistema.directorio.edit' or
                            $routeName === 'sistema.directorio.show' or
                            $routeName === 'sistema.cabildo.index' or
                            $routeName === 'sistema.cabildo.create' or
                            $routeName === 'sistema.cabildo.edit' or
                            $routeName === 'sistema.cabildo.show') hover show @endif">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-bank fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Ayuntamiento</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link  @if ($routeName === 'sistema.alcalde.index') active @endif"
                                href="{{ route('sistema.alcalde.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Alcalde</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link  @if (
                                $routeName === 'sistema.dependencia.index' or
                                    $routeName === 'sistema.dependencia.create' or
                                    $routeName === 'sistema.dependencia.edit' or
                                    $routeName === 'sistema.dependencia.show') active @endif"
                                href="{{ route('sistema.dependencia.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dependencias</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.titulares.dependencia.index' or
                                    $routeName === 'sistema.titulares.dependencia.create' or
                                    $routeName === 'sistema.titulares.dependencia.edit' or
                                    $routeName === 'sistema.titulares.dependencia.show') active @endif"
                                href="{{ route('sistema.titulares.dependencia.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Titulares de Dependencias</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.cabildo.index' or
                                    $routeName === 'sistema.cabildo.create' or
                                    $routeName === 'sistema.cabildo.edit' or
                                    $routeName === 'sistema.cabildo.show') active @endif"
                                href="{{ route('sistema.cabildo.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Cabildo</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item ">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.comisiones.index' or
                                    $routeName === 'sistema.comisiones.create' or
                                    $routeName === 'sistema.comisiones.edit' or
                                    $routeName === 'sistema.comisiones.show') active @endif"
                                href="{{ route('sistema.comisiones.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Comisiones</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.directorio.index' or
                                    $routeName === 'sistema.directorio.create' or
                                    $routeName === 'sistema.directorio.edit' or
                                    $routeName === 'sistema.directorio.show') active @endif""
                                href="{{ route('sistema.directorio.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Directorio</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                @endhasrole
                @hasrole('Administrador|Noticias')
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (
                    $routeName === 'sistema.noticias.categoria.index' or
                        $routeName === 'sistema.noticias.categoria.create' or
                        $routeName === 'sistema.noticias.categoria.edit' or
                        $routeName === 'sistema.noticias.categoria.show' or
                        $routeName === 'sistema.noticias.index' or
                        $routeName === 'sistema.noticias.create' or
                        $routeName === 'sistema.noticias.edit' or
                        $routeName === 'sistema.noticias.show')
                        hover show @endif">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-code fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Noticias</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.noticias.index' or
                                    $routeName === 'sistema.noticias.create' or
                                    $routeName === 'sistema.noticias.edit' or
                                    $routeName === 'sistema.noticias.show') active @endif"
                                     href="{{ route('sistema.noticias.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Noticias</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.noticias.categoria.index' or
                                    $routeName === 'sistema.noticias.categoria.create' or
                                    $routeName === 'sistema.noticias.categoria.edit' or
                                    $routeName === 'sistema.noticias.categoria.show') active @endif"
                                href="{{ route('sistema.noticias.categoria.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Categorias</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->


                @endhasrole
                @hasrole('Administrador|Eventos')
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (
                    $routeName === 'sistema.eventos.categoria.index' or
                        $routeName === 'sistema.eventos.categoria.create' or
                        $routeName === 'sistema.eventos.categoria.edit' or
                        $routeName === 'sistema.eventos.categoria.show' or
                        $routeName === 'sistema.eventos.index' or
                        $routeName === 'sistema.eventos.create' or
                        $routeName === 'sistema.eventos.edit' or
                        $routeName === 'sistema.eventos.show')
                        hover show @endif">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-calendar-add fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                                <i class="path5"></i>
                                <i class="path6"></i>
                            </i>
                        </span>
                        <span class="menu-title">Eventos</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.eventos.index' or
                                    $routeName === 'sistema.eventos.create' or
                                    $routeName === 'sistema.eventos.edit' or
                                    $routeName === 'sistema.eventos.show') active @endif"
                                     href="{{ route('sistema.eventos.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Eventos</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if (
                                $routeName === 'sistema.eventos.categoria.index' or
                                    $routeName === 'sistema.eventos.categoria.create' or
                                    $routeName === 'sistema.eventos.categoria.edit' or
                                    $routeName === 'sistema.eventos.categoria.show') active @endif"
                                href="{{ route('sistema.eventos.categoria.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Categorias</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                @endhasrole
                @hasrole('Administrador|Programas')
                 <!--begin:Menu item-->
                 <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if (
                        $routeName === 'sistema.programas.index' or
                            $routeName === 'sistema.programas.edit' or
                            $routeName === 'sistema.programas.create' or
                            $routeName === 'sistema.programas.show') active @endif"
                        href="{{ route('sistema.programas.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-bookmark-2 fs-2">
                            <i class="path1"></i>
                            <i class="path2"></i>
                            </i>
                        </span>
                        <span class="menu-title">Programas</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @endhasrole
                @hasrole('Administrador|Tramites')
                <!--begin:Menu item-->
                <div class="menu-item">
                   <!--begin:Menu link-->
                   <a class="menu-link @if (
                       $routeName === 'sistema.tramites.index' or
                           $routeName === 'sistema.tramites.edit' or
                           $routeName === 'sistema.tramites.create' or
                           $routeName === 'sistema.tramites.show') active @endif"
                       href="{{ route('sistema.tramites.index') }}">
                       <span class="menu-icon">
                        <i class="ki-duotone ki-tablet-ok fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        </i>
                       </span>
                       <span class="menu-title">Trámites y Servicios</span>
                   </a>
                   <!--end:Menu link-->
               </div>
               <!--end:Menu item-->
               @endhasrole

               @hasrole('Administrador|Tramites')
               <!--begin:Menu item-->
               <div class="menu-item">
                  <!--begin:Menu link-->
                  <a class="menu-link @if (
                      $routeName === 'sistema.tramites.top.index' or
                          $routeName === 'sistema.tramites.top.edit' or
                          $routeName === 'sistema.tramites.top.create' or
                          $routeName === 'sistema.tramites.top.show') active @endif"
                      href="{{ route('sistema.tramites.top.index') }}">
                      <span class="menu-icon">
                       <i class="ki-duotone ki-tablet-ok fs-2">
                       <span class="path1"></span>
                       <span class="path2"></span>
                       <span class="path3"></span>
                       </i>
                      </span>
                      <span class="menu-title">Servicios Top</span>
                  </a>
                  <!--end:Menu link-->
              </div>
              <!--end:Menu item-->
              @endhasrole


                @hasrole('Administrador|Paginas')
                 <!--begin:Menu item-->
                 <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if (
                        $routeName === 'sistema.paginas.index' or
                            $routeName === 'sistema.paginas.edit' or
                            $routeName === 'sistema.paginas.create' or
                            $routeName === 'sistema.paginas.show') active @endif"
                        href="{{ route('sistema.paginas.index') }}">
                        <span class="menu-icon">
                        <i class="ki-duotone ki-document fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        </i>
                        </span>
                        <span class="menu-title">Páginas</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @endhasrole
                @hasrole('Administrador|Mensajes')
                  <!--begin:Menu item-->
                  <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if (
                        $routeName === 'sistema.sugerencias.index' or
                            $routeName === 'sistema.sugerencias.edit' or
                            $routeName === 'sistema.sugerencias.show') active @endif"
                        href="{{ route('sistema.sugerencias.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-message-programming fs-2">
                            <i class="path1"></i>
                            <i class="path2"></i>
                            <i class="path3"></i>
                            <i class="path4"></i>
                            </i>
                        </span>
                        <span class="menu-title">Mensajes de la página</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @endhasrole
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->

</div>
<!--end::Sidebar-->
