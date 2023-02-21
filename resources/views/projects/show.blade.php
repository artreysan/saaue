@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-8 p-4">
                <h5><strong>Proyecto</strong></h5>
                <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-1"><a href="/projects" class="btn btn-secondary">Ver todos</a></button></div>
        <div class="col-md-1"><a href="projects/{project}/edit"><button type="button"
                    class="btn btn-danger">Editar</button></a></button></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card-header card-header-primary bg-secondary">
                    <div class="card-title">{{ $project->full_name }}</div>
                </div>
                <div class="card-body table-bordered">
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <h6><strong>Nombre corto:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <h6> {{ $project->short_name }} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <h6><strong> Sigla de Unidad:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div>
                                <h6> {{ $project->acronym }} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <h6><strong> Unidad:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div>
                                <h6> {{ $project->unit }} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <h6><strong> Coordinador:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <h6> {{ $project->user->name }} {{ $project->user->last_name }} </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-7">
            <div class="p-5">
                <div class="p-2 container"
                    style="background-color: #f4f6f9; color: rgb(41, 41, 41); with:300px; higth: 50px">
                    <h6>Bases de datos de {{ $project->full_name }}</h6>
                </div>
                <table class="table" id="petitions">
                    <thead class="table-secondary">
                        <th>Nombre</th>
                        <th>DBMS</th>
                        <th>S.O</th>
                        <th>Criticidad</th>
                        <th>Ambiente</th>
                        <th>I.P</th>
                        <th>Port</th>
                    </thead>
                    @foreach ($databases as $database)
                        <tbody>
                            <td>{{ $database->name }}</td>
                            <td>{{ $database->dbms }}</td>
                            <td>{{ $database->so }}</td>
                            <td>{{ $database->criticality }}</td>
                            <td>{{ $database->enviroment }}</td>
                            <td>{{ $database->ip }}</td>
                            <td>{{ $database->port }}</td>
                            <td><a href="/database/{{ $database->id }}" alt="ver" class="col-md-1 fas fa-eye"></a></td>
                    @endforeach
                </table>
            </div>
        </div>
    {{-- <div>
        <h6> <strong>Equipos</strong></h6>
        @foreach ($equipments as $equipment)
            <tbody>
                <h6>{{ $equipment->tipo }} {{ $equipment->marca }} {{ $equipment->modelo }}
                    -
                    {{ $equipment->serie }} <a style="padding-left:9px " href="equipment/{{ $equipment->id }}"
                        alt="equipment"><button class="	fas fa-laptop"></button></a></h6>
            </tbody>
        @endforeach
    </div> --}}
    <footer class="footer py-3 bg-green-900">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Desarrollado en CDMX,<strong> UTIC </strong>
                    <a href="https://www.creative-tim.com" class="font-weight-bold " target="_blank">
                </div>
            </div>
        </div>
    </footer>

@stop
