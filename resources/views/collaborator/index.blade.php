@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-nav">
    <div class="row">
        <div class="col-md-1 p-3"></div>
        <div class="col-md-9 p-3">
            <h5><strong>Colaboradores</strong></h5>
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
            <div class="col-md-1"><a href="/dashboard"><button type="button" class="btn btn-secondary">Inicio</button></a></div>
            <div class="col-md-1"><a href="collaborator/create"><button type="button" class="btn btn-secondary">Registrar</button></a></div>
        </div>
    </div>
<br>
    <div class="container">
        <table class="table table-striped">
            <thead class="table-secondary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Rol</th>
                <th>Empresa</th>
                <th>Ver</th>
            </thead>
            @foreach ($collaborators as $collaborator)
                <tbody>
                    <td>{{ $collaborator->id }}</td>
                    <td>{{ $collaborator->name }}</td>
                    <td>{{ $collaborator->last_name }} {{ $collaborator->last_maternal }} </td>
                    <td>{{ $collaborator->rol->rol }} </td>
                    <td>{{ $collaborator->enterprise->name }} </td>
                    <td><a href="/collaborator/{{$collaborator->id}}" alt="Perfil" ><button class=" fas fa-address-card"></button></a></td>
                </tbody>
            @endforeach
        </table>
    </div>
    <br>
    <div class="container">
        <footer>
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            Desarrollado en CDMX,<strong> UTIC </strong>
        </footer>
    </div>
@stop
