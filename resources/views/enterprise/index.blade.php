@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-9 p-4">
                <h5><strong>Empresas</strong></h5>
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
            <div class="col-md-1"><a href="/dashboard"><button type="button" class="btn btn-secondary">Inicio</button></a>
            </div>
            <div class="col-md-1"><a href="enterprise/create"><button type="button"
                        class="btn btn-secondary">Registrar</button></a></div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped">
            <thead class="table-secondary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Contrato</th>
            </thead>
            @foreach ($enterprises as $enterprise)
                <tbody>
                    <td>{{ $enterprise->id }}</td>
                    <td>{{ $enterprise->name }}</td>
                    <td>{{ $enterprise->contract }}</td>
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

