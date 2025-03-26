@extends('layouts.front.main')
@section('title', 'PBR')
@section('content')
<!-- {{ asset('/storage/iconos/pbrserv1.svg') }} -->
<style>
    a{
        font-size:17px;
       
    }
    .qsecc{
        background:#F1F1F1;border-radius:5px;padding:20px;
        display:none;
    }
    .services{
        cursor:pointer;
    }
     .active{
        background: #f1f1f1;
        border-radius: 5px;
    }
    .btn-collapsed-tramites {
        color: #000;
        font-family: Lato;
        font-size: 17px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        border: solid 1px #e4e4e4;
        padding: 10px;
        margin: 2px 0;
    }
    ul{
        line-height: 27px;
    }
</style>
    <div class="hero-img-overlay " style="background-image:url('{{ asset('front/img/santa-bg-01.png') }}');">

        <div class="title-page" style="background-color: #222222;">
            <h1 class="hero-encabezado text-white">Pbr - SED</h1>
            <h5>
                <span class="text-white text-subtitulo-encabezado">Gobierno de Santa Catarina</span>
            </h5>
        </div>

    </div>

    <div class="pt-5"></div>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h5 class="text-tramites-top-primary">Presupuesto Basado en Resultados - Sistema de Evaluación del Desempeño</h5>
                <p class="lead" style="text-align:justify;font-size:18px;">
                    El Presupuesto basado en Resultados - Sistema de Evaluación del Desempeño constituyen un conjunto de herramientas de gestión que han permitido alinear los recursos públicos en función de objetivos específicos y metas claras para resolver problemáticas públicas o atender necesidades de la ciudadanía. Aunado a esto, proporciona un marco metodológico para evaluar el desempeño de los programas públicos desde su diseño, hasta su implementación, permitiendo medir avances, identificar áreas de mejora y optimizar el uso de los recursos públicos.
                </p>
                <p class="lead" style="text-align:justify;font-size:18px;">
                    Lo anterior, permite orientar los esfuerzos de la Administración Pública Municipal hacia un camino de mayor eficacia y eficiencia para mejorar la calidad del gasto y promover la transparencia y rendición de cuentas.
                </p>
            </div>  
        </div>
        <br>
        <div class="container text-center pt-3 pb-3">
            <div class="row justify-content-center">
                <div class="col-4 col-md-2 pt-4 pb-4 card-tramites-home shadow-sm m-2 services" dval="1">
                    <img src="http://stacatarina.gob.mx/storage/iconos/pbrserv5.svg" width="60px" height="60px"
                        alt="Marco Normativo">
                    <p class="text-tramites-nombre pt-4">Marco Normativo</p>
                </div>
                <div class="col-4 col-md-2 pt-4 pb-4 card-tramites-home shadow-sm m-2 services" dval="2">
                    <img src="http://stacatarina.gob.mx/storage/iconos/pbrserv2.svg" width="60px" height="60px"
                        alt="Planeación y Programación">
                    <p class="text-tramites-nombre pt-4">Planeación y Programación</p>
                </div>
                <!-- <div class="col-4 col-md-2 pt-4 pb-4 card-tramites-home shadow-sm m-2 services" dval="3">
                    <img src="http://stacatarina.gob.mx/storage/iconos/pbrserv3.svg" width="60px" height="60px"
                        alt="Presupuestación">
                    <p class="text-tramites-nombre pt-4">Presupuestación</p>
                </div> -->
                <div class="col-4 col-md-2 pt-4 pb-4 card-tramites-home shadow-sm m-2 services" dval="4">
                    <img src="http://stacatarina.gob.mx/storage/iconos/pbrserv1.svg" width="60px" height="60px"
                        alt="Sistema de Seguimiento y Evaluación del Desempeño">
                    <p class="text-tramites-nombre pt-4">Sistema de Seguimiento y Evaluación del Desempeño</p>
                </div>
                <!-- <div class="col-4 col-md-2 pt-4 pb-4 card-tramites-home shadow-sm m-2 services" dval="5">
                    <img src="http://stacatarina.gob.mx/storage/iconos/pbrserv4.svg" width="60px" height="60px"
                        alt="Rendición de Cuentas">
                    <p class="text-tramites-nombre pt-4">Rendición de Cuentas</p>
                </div> -->
                
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                    <div class="qsecc" id="secc1">
                        <h5 class="text-tramites-top-primary">Marco Normativo</h5>
                        <div style="margin:15px 0 0 25px;">
                            <h5 class="contacto-titulo">Federal y Estatal</h5>
                            <ul>
                                <li><a href="https://www.diputados.gob.mx/LeyesBiblio/ref/cpeum.htm" target="_blank">Constitución Política de los Estados Unidos Mexicanos</a></li>
                                <li><a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lgcg.htm" target="_blank">Ley General de Contabilidad Gubernamental</a></li>
                                <li><a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lgtaip.htm" target="_blank">Ley General de Transparencia y Acceso a la Información Pública</a></li>
                                <li><a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lcf.htm" target="_blank">Ley de Coordinación Fiscal</a></li>
                                <li><a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfprh.htm" target="_blank">Ley Federal de Presupuesto y Responsabilidad Hacendaria</a></li>
                                <li><a href="https://www.diputados.gob.mx/LeyesBiblio/ref/ldfefm.htm" target="_blank">Ley de Disciplina Financiera de las Entidades Federativas y los Municipios</a></li>
                                <li><a href="https://www.diputados.gob.mx/LeyesBiblio/regley/Reg_LFPRH.pdf" target="_blank">Reglamento de la Ley Federal de Presupuesto y Responsabilidad Hacendaria</a></li>
                                <li><a href="https://www.conac.gob.mx/work/models/CONAC/normatividad/NOR_01_15_002.pdf" target="_blank">Lineamientos para la construcción y diseño de indicadores de desempeño mediante la Metodología de Marco Lógico.</a></li>
                                <li><a href="https://www.conac.gob.mx/work/models/CONAC/normatividad/NOR_01_14_011.pdf" target="_blank">Norma para establecer el formato para la difusión de los resultados de las evaluaciones de los recursos federales ministrados a las entidades federativas.</a></li>
                                <li><a href="https://www.gob.mx/shcp/documentos/acuerdo-del-sistema-de-evaluacion-del-desempeno" target="_blank">Acuerdo por el que se establecen las disposiciones generales del Sistema de Evaluación del Desempeño.</a></li>
                                <li><a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5123939&fecha=09/12/2009#gsc.tab=0" target="_blank">Lineamientos sobre los indicadores para medir los avances físicos y financieros relacionados con los recursos públicos federales.</a></li>
                                <li><a href="https://www.gob.mx/shcp/documentos/lineamientos-generales-para-la-evaluacion-de-los-programas-federales-de-la-administracion-publica-federal-74200" target="_blank">Lineamientos Generales para la Evaluación de los Programas Federales de la Administración Pública Federal</a></li>
                                <li><a href="https://www.gob.mx/shcp/documentos/mecanismo-para-el-seguimiento-a-los-aspectos-susceptibles-de-mejora" target="_blank">Mecanismo para el seguimiento a los aspectos susceptibles de mejora derivados de informes y evaluaciones a los programas presupuestarios de la Administración Pública Federal</a></li>
                                <li><a href="https://www.hcnl.gob.mx/trabajo_legislativo/leyes/leyes/constitucion_politica_del_estado_libre_y_soberano_de_nuevo_leon/" target="_blank">Constitución Política del Estado Libre y Soberano de Nuevo León.</a></li>
                                <li><a href="https://www.hcnl.gob.mx/trabajo_legislativo/leyes/leyes/ley_de_gobierno_municipal_del_estado_de_nuevo_leon/" target="_blank">Ley de Gobierno Municipal del Estado de Nuevo León.</a></li>
                                <li><a href="https://www.hcnl.gob.mx/trabajo_legislativo/leyes/leyes/ley_de_transparencia_y_acceso_a_la_informacion_publica_del_estado_de_nuevo_leon/" target="_blank">Ley de Transparencia y Acceso a la Información Pública del Estado de Nuevo León.</a></li>
                                <li><a href="https://www.nl.gob.mx/es/publicaciones/ley-de-ingresos-aprobada-2024" target="_blank">Ley de Ingresos de los Municipios de Nuevo León</a></li>
                            </ul>
                            <br>
                            <h5 class="contacto-titulo">Municipal</h5>
                            <ul>
                                <li>Reglamento Orgánico de la Administración Pública Municipal de Santa Catarina, Nuevo León</li>
                                <!-- <li>Manual de Políticas y Procedimiento para la implementación de un Presupuesto basado en Resultados y Sistema de Evaluación del Desempeño</li>
                                <li>Mecanismo para el Seguimiento de los Aspectos Susceptibles de Mejora</li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="qsecc" id="secc2">
                        <h5 class="text-tramites-top-primary">Planeación y Programación</h5>
                        <div style="margin:15px 0 0 25px;">
                            <h5 class="contacto-titulo">Plan Municipal de Desarrollo</h5>
                            <div class="row">
                                <div class="col-12 pb-3">
                                    <div class="accordion accordion-flush" id="a2c1" >
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed btn-collapsed-tramites" type="button" data-bs-toggle="collapse" data-bs-target="#ac2c1" aria-expanded="false" aria-controls="ac2c1">
                                                2024 - 2027
                                                </button>
                                            </h2>
                                            <div id="ac2c1" class="accordion-collapse collapse" data-bs-parent="#a2c1">
                                                <div class="accordion-body">
                                                <ul>
                                                    <li><a href="http://stacatarina.gob.mx/storage/pbr/Plan Municipal de Desarrollo/PMD24-27.pdf" target="_blank">Plan Municipal Desarrollo</a></li>
                                                </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="a2c2">
                                        <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed btn-collapsed-tramites" type="button" data-bs-toggle="collapse" data-bs-target="#ac2c2" aria-expanded="false" aria-controls="ac2c2">
                                            2021 - 2024
                                            </button>
                                        </h2>
                                        <div id="ac2c2" class="accordion-collapse collapse" data-bs-parent="#a2c2">
                                                <div class="accordion-body">
                                                <ul>
                                                    <li><a href="http://stacatarina.gob.mx/storage/pbr/Plan Municipal de Desarrollo/PMD21-24.pdf" target="_blank">Plan Municipal Desarrollo</a></li>
                                                </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="a2c3">
                                        <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed btn-collapsed-tramites" type="button" data-bs-toggle="collapse" data-bs-target="#ac2c3" aria-expanded="false" aria-controls="ac2c3">
                                            2018 - 2021
                                            </button>
                                        </h2>
                                        <div id="ac2c3" class="accordion-collapse collapse" data-bs-parent="#a2c3">
                                                <div class="accordion-body">
                                                <ul>
                                                    <li><a href="http://stacatarina.gob.mx/storage/pbr/Plan Municipal de Desarrollo/PMD18-21.pdf" target="_blank">Plan Municipal Desarrollo</a></li>
                                                </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="a2c4">
                                        <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed btn-collapsed-tramites" type="button" data-bs-toggle="collapse" data-bs-target="#ac2c4" aria-expanded="false" aria-controls="ac2c4">
                                            2015 - 2018
                                            </button>
                                        </h2>
                                        <div id="ac2c4" class="accordion-collapse collapse" data-bs-parent="#a2c4">
                                                <div class="accordion-body">
                                                <ul>
                                                    <li><a href="http://stacatarina.gob.mx/storage/pbr/Plan Municipal de Desarrollo/PMD15-18.pdf" target="_blank">Plan Municipal Desarrollo</a></li>
                                                </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="contacto-titulo">Programas Presupuestarios y Programas Operativos Anuales</h5>
                            <div class="row">
                                <div class="col-12 pb-3">
                                    <div class="accordion accordion-flush" id="a3c1" >
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed btn-collapsed-tramites" type="button" data-bs-toggle="collapse" data-bs-target="#ac3c1" aria-expanded="false" aria-controls="ac3c1">
                                                2025
                                                </button>
                                            </h2>
                                            <div id="ac3c1" class="accordion-collapse collapse" data-bs-parent="#a3c1">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/0100 Contraloría y Transparencia.pdf" target="_blank">0100 Contraloría y Transparencia</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E007 Vialidad y Movilidad.pdf" target="_blank">E007 Vialidad y Movilidad</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E100 Desarrollo Integral de la Familia.pdf" target="_blank">E100 Desarrollo Integral de la Familia</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E110 Protección Civil.pdf" target="_blank">E110 Protección Civil</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E130 Clínica Municipal.pdf" target="_blank">E130 Clínica Municipal</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E140 Vinculación Ciudadana y Acción Comunitaria.pdf" target="_blank">E140 Vinculación Ciudadana y Acción Comunitaria</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E150 Salud Pública y Bienestar Animal.pdf" target="_blank">E150 Salud Pública y Bienestar Animal</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E160 Atención a la Mujer.pdf" target="_blank">E160 Atención a la Mujer</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E180 Educación, Cultura y Jóvenes.pdf" target="_blank">E180 Educación, Cultura y Jóvenes</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E200 Deporte y Activación Física.pdf" target="_blank">E200 Deporte y Activación Física</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E210 Seguridad Pública.pdf" target="_blank">E210 Seguridad Pública</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E230 Asuntos de Gobierno y Normatividad Municipal.pdf" target="_blank">E230 Asuntos de Gobierno y Normatividad Municipal</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E240 Servicios Públicos Municipales.pdf" target="_blank">E240 Servicios Públicos Municipales</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/E260 Justicia Cívica.pdf" target="_blank">E260 Justicia Cívica</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/F001 Turismo, Inversión y Empleo.pdf" target="_blank">F001 Turismo, Inversión y Empleo</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/G110 Control y Desarrollo Urbano.pdf" target="_blank">G110 Control y Desarrollo Urbano</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/G130 Sustentabilidad y Medio Ambiente.pdf" target="_blank">G130 Sustentabilidad y Medio Ambiente</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/K100 Obra Pública.pdf" target="_blank">K100 Obra Pública</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/M001 Finanzas Públicas.pdf" target="_blank">M001 Finanzas Públicas</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/M120 Administración.pdf" target="_blank">M120 Administración</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/P160 Planeación Institucional Ejecutiva.pdf" target="_blank">P160 Planeación Institucional Ejecutiva</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Presupuestarios/2025/P200 Planeación e Innovación Pública.pdf" target="_blank">P200 Planeación e Innovación Pública</a></li>
                                                        <br>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Oficina Ejecutiva de la Presidencia Municipal.pdf" target="_blank">Oficina Ejecutiva de la Presidencia Municipal</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Administración.pdf" target="_blank">Secretaría de Administración</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Cultura y Educación.pdf" target="_blank">Secretaría de Cultura y Educación</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Desarrollo Humano y Bienestar.pdf" target="_blank">Secretaría de Desarrollo Humano y Bienestar</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Economía y Turismo_.pdf" target="_blank">Secretaría de Economía y Turismo</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de la Contraloría y Transparencia.pdf" target="_blank">Secretaría de la Contraloría y Transparencia</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Obras Públicas.pdf" target="_blank">Secretaría de Obras Públicas.pdf</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Planeación, Gestión e Innovación Pública.pdf" target="_blank">Secretaría de Planeación, Gestión e Innovación Pública</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Proximidad y Vinculación Ciudadana.pdf" target="_blank">Secretaría de Proximidad y Vinculación Ciudadana</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Seguridad Pública y Vialidad.pdf" target="_blank">Secretaría de Seguridad Pública y Vialidad</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Servicios Públicos.pdf" target="_blank">Secretaría de Servicios Públicos</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría de Sustentabilidad Urbana y Movilidad.pdf" target="_blank">Secretaría de Sustentabilidad Urbana y Movilidad</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría del Ayuntamiento.pdf" target="_blank">Secretaría del Ayuntamiento</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Secretaría General.pdf" target="_blank">Secretaría General</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Sistema para el Desarrollo Integral de la Familia y Atención a Grupos Vulnerables.pdf" target="_blank">Sistema para el Desarrollo Integral de la Familia y Atención a Grupos Vulnerables</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programas Operativos Anuales/2025/Tesorería Municipal.pdf" target="_blank">Tesorería Municipal</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="qsecc" id="secc4">
                        <h5 class="text-tramites-top-primary">Sistema de Seguimiento y Evaluación del Desempeño</h5>
                        <div style="margin:15px 0 0 25px;">
                            <h5 class="contacto-titulo">Evaluación del Desempeño</h5>
                            <div class="row">
                                <div class="col-12 pb-3">
                                    <div class="accordion accordion-flush" id="a4c1" >
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed btn-collapsed-tramites" type="button" data-bs-toggle="collapse" data-bs-target="#ac4c1" aria-expanded="false" aria-controls="ac4c1">
                                                2024
                                                </button>
                                            </h2>
                                            <div id="ac4c1" class="accordion-collapse collapse" data-bs-parent="#a4c1">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/1. ASM FISM_vf.docx.pdf" target="_blank">1. ASM FISM_vf</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/1. ASM FORTAMUN_v2.docx.pdf" target="_blank">1. ASM FORTAMUN_v2</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/1. ASM Movilidad.docx.pdf" target="_blank">1. ASM Movilidad</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/2. PI FISM.docx" target="_blank">2. PI FISM</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/2. PI FISM.docx.pdf" target="_blank">2. PI FISM</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/2. PI FORTAMUN_v1.docx" target="_blank">2. PI FORTAMUN_v1</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/2. PI FORTAMUN_v1.docx.pdf" target="_blank">2. PI FORTAMUN_v1</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/2. PI Movilidad.docx" target="_blank">2. PI Movilidad</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/2. PI Movilidad.docx.pdf" target="_blank">2. PI Movilidad</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/ED G120 Movilidad y Accesibilidad.pdf" target="_blank">ED G120 Movilidad y Accesibilidad.pdf</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/EDES_FISM_SC_vf2.pdf" target="_blank">EDES_FISM_SC_vf2</a></li>
                                                        <li><a href="http://stacatarina.gob.mx/storage/pbr/Programa Anual de Evaluación/2024/EDES_FORTAMUN_SC_VF2.pdf" target="_blank">EDES_FORTAMUN_SC_VF2</a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <br>
    </div>
    </div>
    
@endsection
@push('js')
    <script>
        $(".services").on( "click", function() {
            console.log('ss');
            $(".services").removeClass('active');
            $(this).addClass('active');
            
            var valid = $(this).attr("dval");
            $('.qsecc').hide();
            $('#secc'+valid).fadeIn(100);
                
        });
    </script>
@endpush

