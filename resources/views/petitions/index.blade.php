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
                <h5><strong>Todas las solicitudes pendientes:</strong></h5>
                <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <p> Aqui van a ir cuadros estadisticos de las solicitudes </p>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped" id="petitions">
            <thead class="table-secondary">
                <th>Folio</th>
                <th>Empresa</th>
                <th>Fecha</th>
                <th>Colaborador</th>
                <th>Status</th>
                <th>Ver</th>
            </thead>
            @foreach ($petitions as $petition)
                <tbody>
                    <td>{{ $petition->fileID }}</td>
                    <td>{{ $petition->collaborator->enterprise->name }}</td>
                    <td>{{ $petition->created_at }}</td>
                    <td>{{ $petition->collaborator->name }} {{ $petition->collaborator->last_name }}</td>
                    <td>
                        <?php
                        switch ($petition->status) {
                            case 0:
                                echo '<div class="fas fa-circle pendiente"></div>';
                                break;
                            case 1:
                                echo '<div class="fas fa-circle en-proceso"></div>';
                                break;
                            case 2:
                                echo '<div class="fas fa-circle atendida"></div>';
                                break;
                            case 3:
                                echo '<div class="fas fa-circle validada"></div>';
                                break;
                        }
                        ?>
                    </td>
                    <td><a href="/petition/{{ $petition->id }}" alt="ver" class="col-md-1 fas fa-eye"></a></td>
                </tbody>
            @endforeach
        </table>
        <br>
        <br>
        <br>
        <br>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#petitions').DataTable({
                "language": {
                    "search": "Buscar petición",
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
