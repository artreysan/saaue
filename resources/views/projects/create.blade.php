@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')

    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-9 p-4">
                <h5><strong>Iniciar proyecto</strong></h5>
                <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-1"><a href="/dashboard"><button type="button" class="btn btn-secondary">Inicio</button></a>
            </div>
            <div class="col-md-2"><a href="/projects"><button type="button" class="btn btn-secondary">Ver
                        todos</button></a></div>
        </div>
    </div>
    <br>
    <div class="container card-header bg-secondary">
        <div class="col-md-4 p-1">
            <h4><strong>Nuevo proyecto:</strong></h4>
        </div>
    </div>
    <div class="container">
        <div class="container shadow table-bordered p-4">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                {{-- Inicio del contenedor de los datos del colaborador collaborador_id --}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><strong>Nombre completo:</strong></div>
                        <div class="col-md-3"><input type="text" id="full_name" name="full_name" required></div>
                        <div class="col-md-2"><strong>Nombre corto:</strong></div>
                        <div class="col-md-3"><input type="text" id="shor" name="last_name">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2"><strong>Siglas de la Unidad</strong></div>
                        <div class="col-md-3">
                            <select id="acronym" name="acronym">
                                <option>AFAC</option>
                                <option>ARTF</option>
                                <option>CSIC</option>
                                <option>DGAF</option>
                                <option>DGC</option>
                                <option>DGCC</option>
                                <option>DGDFM</option>
                                <option>DGP</option>
                                <option>DGPMPT</option>
                                <option>DGPOP</option>
                                <option>DGRH</option>
                                <option>DGTFM</option>
                                <option>OCS</option>
                                <option>UAF</option>
                                <option>UAJ</option>
                                <option>UTIC</option>
                                <option>UPCP</option>
                            </select>
                        </div>
                        <div class="col-md-1"><strong>Unidad:</strong></div>
                        <div class="col-md-3">
                            <select name="unit" id="unit">
                                <option>Agencia Federal de Aviación Civil</option>
                                <option>Agencia Regulatoria del Transporte Ferroviario</option>
                                <option>Coordinacion de la Sociedad de la Informacion y el Conocimiento</option>
                                <option>Direccion de General de Carreteras</option>
                                <option>Direccion de Planeación</option>
                                <option>Direccion General de Autotransporte Federal</option>
                                <option>Direccion General de Concervación de Carreteras</option>
                                <option>Direccion General de Desarrollo Ferroviario y Multimodal</option>
                                <option>Direccion General de Programacion, Organizacion y Presupuesto </option>
                                <option>Direccion General de Proteccion y Medicina Preventiva en el Transporte</option>
                                <option>Direccion General de Recursos Humanos</option>
                                <option>Dirección General de Transporte Ferroviario y Multimodal</option>
                                <option>Oficina del Secretario</option>
                                <option>Unidad de Administración y Finanzas</option>
                                <option>Unidad de Asuntos Jurídicos</option>
                                <option>Unidad de Política y Control Presupuestario.</option>
                                <option>Unidad de Tecnologías de la Información y Comunicaciones</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2"><strong>Base de datos:</strong></div>
                        <div class="col-md-3"><input type="text" id="database_id" name="database_id"></div>
                        <div class="col-md-3"><strong>Coordinador del proyecto:</strong></div>
                        <div class="col-md-2">
                            <select name="user_id" id="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                </div>
        </div>
    </div>
    <br>
    <br>
@stop
