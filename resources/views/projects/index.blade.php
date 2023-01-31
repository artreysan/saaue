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
            <div class="col-md-11"></div>
            <div class="col-md-1">
                <a href="/dashboard"><button type="button" class="btn btn-secondary">Inicio</button></a>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped" id="projects">
            <thead class="table-secondary">
                <th>Id</th>
                <th>Nombre largo</th>
                <th>Nombre corto</th>
                <th class="col-md-4">Coordinador</th>
                <th> Ver</th>
            </thead>
            @foreach ($projects as $project)
                <tbody>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->nombre_completo }}</td>
                    <td>{{ $project->nombre_corto }}</td>
                    <td class="col-md-4">{{ $project->coordinador }}</td>
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
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#projects').DataTable({
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
