@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-nav">
    <div class="row">
        <div class="col-md-1 p-3"></div>
        <div class="col-md-9 p-3">
            <h4><strong>Colaboradores</strong></h4>
            <h6>Ciudad de México a <?php echo date('j-m-Y'); ?> </h6>
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
        <table class="table table-striped" id="collaborators">
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
                    <td>{{ $collaborator->nombre }}</td>
                    <td>{{ $collaborator->apellido_paterno }} {{ $collaborator->apellido_materno }} </td>
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


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

   <script>
        $(document).ready(function(){
            $('#collaborators').DataTable({
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

