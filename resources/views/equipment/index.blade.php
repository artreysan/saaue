@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content_header')
<div class="container-nav">
    <div class="row">
        <div class="col-md-1 p-4"></div>
        <div class="col-md-9 p-4">
            <h5><strong>Equipos de computo</strong></h5>
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
            <div class="col-md-1"><a href="equipment/create"><button type="button" class="btn btn-secondary">Registrar</button></a></div>
        </div>
    </div>
<br>
    <div class="container">
        <table class="table table-striped shadow-lg" id="equipments">
            <thead class="table-secondary">
                <th>Id</th>
                <th class="col-sm-1">Tipo</th>
                <th class="col-sm-1">Marca</th>
                <th class="col-sm-2">Modelo</th>
                <th class="col-sm-2">Serie</th>
                <th>Mac Ethernet</th>
                <th>Mac wifi</th>
                <th class="col-sm-1">Ver</th>
            </thead>
            @foreach ($equipments as $equipment)
                <tbody>
                    <td>{{ $equipment->id }}</td>
                    <td>{{ $equipment->tipo }}</td>
                    <td>{{ $equipment->marca }}</td>
                    <td>{{ $equipment->modelo }}</td>
                    <td>{{ $equipment->serie }}</td>
                    <td>{{ $equipment->mac_ethernet }}</td>
                    <td>{{ $equipment->mac_wifi }}</td>
                    <td><a href="equipment/{{$equipment->id}}" alt="equipment"><button class="fas fa-address-card"></button></a></td>
                </tbody>
            @endforeach
        </table>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#equipments').DataTable({
                "language": {
                    "search": "Buscar proyecto",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_ ",
                    "paginate": {

                        "previous": "Anterior",
                        "next": "Siguiente",
                        "first": "Primero",
                        "last": "Última"
                    }
                }
            });
        });
        </script>
    @endsection
        <br>
        <br>
        <br>
        <br>
        ©
        <script>
            document.write(new Date().getFullYear())
        </script>
        Desarrollado en CDMX,<strong> UTIC </strong>
@stop
