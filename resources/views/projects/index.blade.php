@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-9 p-4">
                <h5><strong>Proyectos</strong></h5>
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
            <div class="col-md-1"><a href="projects/create"><button type="button" class="btn btn-danger">Registrar</button></a>
            </div>
            <div class="col-md-1"><a href="/dashboard"><button type="button" class="btn btn-warning">Inicio</button></a></div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped">
            <thead class="table-secondary">
                <th class="col-md-1">Id</th>
                <th class="col-md-6">Nombre largo</th>
                <th class="col-md-1">Nombre corto</th>
                <th class="col-md-2">Coordinador</th>
                <th class="col-md-1">Acronym</th>
                <th class="col-md-1">Ver</th>
            </thead>
            @foreach ($projects as $project)
                <tbody>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->full_name }}</td>
                    <td>{{ $project->short_name }}</td>
                    <td>{{ $project->user_id }}</td>
                    <td>{{ $project->acronym }}</td>
                    <td><a href="projects/{{$project->id}}" alt="project"><button class="fas fa-address-card"></button></a></td>
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
