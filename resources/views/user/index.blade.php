@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-nav">
    <div class="row">
        <div class="col-md-1 p-4"></div>
        <div class="col-md-8 p-4">
            <h5><strong>Lista de usuarios administradores del sistema</strong></h5>
            <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
        </div>
        <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{URL::asset('img/download.png')}}" alt="">
        </div>
    </div>
</div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-1"><a href="user/create"><button type="button" class="btn btn-danger">Registrar</button></a>
            </div>
            <div class="col-md-1"><a href="/dashboard"><button type="button" class="btn btn-warning">Inicio</button></a></div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped">
            <thead class="table-secondary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Role</th>
                <th>Institucion</th>
                <th>Ver</th>
            </thead>
            @foreach ($users as $user)
                <tbody>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->last_name }} {{ $user->last_maternal }}</td>
                    <td>{{ $user->role->name}}</td>
                    <td>{{ $user->enterprise->name }}</td>
                    <td><a href="/user/{{$user->id}}" alt="Perfil" ><button class=" 	fas fa-address-card"></button></a></td>
                </tbody>
            @endforeach
        </table>
        <br>
        <br>
        <br>
        <br>
        ©
        <script>
            document.write(new Date().getFullYear())
        </script>
        Desarrollado en CDMX,<strong> UTIC </strong>
    </div>
@stop

