@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-9 p-4">
                <h5><strong>Bases de datos</strong></h5>
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
            <div class="col-md-10"></div>
            <div class="col-md-1"><a href="databases/create"><button type="button"
                        class="btn btn-danger">Registrar</button></a>
            </div>
            <div class="col-md-1"><a href="/dashboard"><button type="button" class="btn btn-warning">Inicio</button></a>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped">
            <thead class="table-secondary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Proyecto</th>
                <th>Dbms</th>
                <th>S.O</th>
                <th>Criticidad</th>
                <th>Ambiente</th>
                <th>I.P</th>
                <th>Puerto</th>
            </thead>
            @foreach ($databases as $database)
                <tbody>
                    <td>{{ $database->id }}</td>
                    <td>{{ $database->name }}</td>
                    <td>
                        @if (empty($database->project->short_name))
                            <p>Incompleto</p>
                        @else
                            {{ $database->project->short_name }}
                        @endif
                    </td>
                    <td>{{ $database->dbms }}</td>
                    <td>{{ $database->so }}</td>
                    <td>{{ $database->criticality }}</td>
                    <td>{{ $database->enviroment }}</td>
                    <td>{{ $database->ip }}</td>
                    <td>{{ $database->port }}</td>
                </tbody>
            @endforeach
        </table>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <footer class="display">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            Desarrollado en CDMX,<strong> UTIC </strong>
        </footer>
    </div>
@stop
