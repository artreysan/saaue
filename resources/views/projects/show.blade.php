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
    <div class="container">
        <div class="row">
            <div class="col-md-9">
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
                                <h6> <strong>{{ $project->short_name }}</strong></h6>
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
                                <h6><strong>{{ $project->unit }}</strong></h6>
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
                                @if (empty($project->user))
                                    <p>Incompleto</p>
                                @else
                                    <h6> {{ $project->user->name }} {{ $project->user->last_name }} </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <h6><strong> Bases de datos:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                @foreach ($databasesid as $databaseid)
                                    <tbody>
                                        <h6><strong> {{ $databaseid->name }} </strong> - {{ $databaseid->dbms }} - {{ $databaseid->enviroment }}
                                            -
                                            {{ $databaseid->ip }} - {{ $databaseid->port }} <a style="padding-left:9px "
                                                href="databases/{{ $databaseid->id }}" alt="database"><button
                                                    class="fas fa-database"></button></a></h6>
                                    </tbody>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2"><a href="/projects" class="btn btn-secondary"> Proyectos</a></button></div>
                        <div class="col-md-1"><a href="{{$project->id}}/edit"><button type="button" class="btn btn-danger">Editar</button></a></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
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
