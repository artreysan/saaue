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
    </div>
    <br>
    <div class="container">
        <div class="card-header bg-secondary">
            <h6>{{ $project->full_name }}</h6>
        </div>
        <div class="card-body p-5">
            <div class="row">
                <h6 class="col-md-2"><strong>Nombre completo:</strong></h6>
                <input class="col-md-8" type="text" id="full_name" name="full_name"
                    placeholder="{{ $project->full_name }}" required>
            </div>
            <br>
            <div class="row">
                <h6 class="col-md-2"><strong>Nombre corto:</strong></h6>
                <input class="col-md-2" type="text" id="short_name" name="short_name"
                    placeholder="{{ $project->short_name }}" required>
            </div>
            <br>
            <div class="row">
                <h6 class="col-md-2"><strong> Sigla de Unidad:</strong></h6>
                <select class="col-md-2" id="acronym" name="acronym" placeholder="{{ $project->acronym }}">
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
            <br>
            <div class="row">
                <h6 class="col-md-2"><strong> Unidad:</strong></h6>
                <input class="col-md-6" type="text" id="unit" name="unit" placeholder="{{ $project->unit }}"
                    required>
            </div>
            <br>
            <div class="row">
                <h6 class="col-md-2"><strong> Coordinador:</strong></h6>
                <select name="" id="">
                    <option>{{ $project->user->name }} {{ $project->user->last_name }}</option>
                </select>
            </div>
            <br>
            <div class="row">
                <h6 class="col-md-2"><strong> Bases de datos:</strong></h6>
                <div class="col-md-6">
                    @foreach ($databasesid as $databaseid)
                        <tbody>
                            <h6><strong> {{ $databaseid->name }} </strong> - {{ $databaseid->dbms }} -
                                {{ $databaseid->enviroment }}
                                -
                                {{ $databaseid->ip }} - {{ $databaseid->port }} <a style="padding-left:9px "
                                    href="databases/{{ $databaseid->id }}" alt="database"><button
                                        class="fas fa-database"></button></a></h6>
                        </tbody>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-start">
                        <a href="#confirmar" role="button" class="btn btn-secondary" data-toggle="modal">Guardar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Modal / Ventana / Overlay en HTML -->
        <div id="confirmar" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que quieres modificar los datos del proyecto?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <br>
    </div>
    <br>
    {{-- Prueba Ajax --}}
    <div class="row container">
        <h4>Acceso a la Base de Datos</h4>
        <input class="col-sm-1" type="checkbox" id="database">
        <select class="col-md-3" id="selectForm" style="display:none">
            @foreach ($databases as $database)
                <option value="{{ $database->id }}" id="database">{{ $database->name }}</option>
            @endforeach
        </select>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $('#database').change(function() {
                if (this.checked) {
                    $('#selectForm').show();
                } else {
                    $('#selectForm').hide();
                }
            });

            $('#selectForm').change(function() {
                $.ajax({
                    url: '{{ route('route.name') }}',
                    type: 'POST',
                    data: {
                        option: $('#selectForm').val()
                    },
                    success: function(data) {
                        // Acción que se ejecuta en caso de éxito
                        console.log(data);
                    }
                });
            });
        </script>
    </div>
    {{-- Prueba Ajax --}}

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
