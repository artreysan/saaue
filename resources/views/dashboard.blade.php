@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-9 p-4">
                <h5><strong>Bienvenido a SAAUE</strong></h5>
                <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-5">
            <div class="pl-3 pr-3">
                <div class="d-flex position-relative table table-bordered p-3">
                    <img width="90px" height="90px" src="{{ URL::asset('img/petition.png') }}" alt="">
                    <div class="p-3">
                        <h5 class="mt-0">Solicitudes pendientes : </h5>
                        <p>El solicitante deberá ser el director o subdirector del área donde estará ubicado el usuario, el
                            solicitante es responsable del uso que el usuario realice de los servicios proporcionados, así
                            como, de
                            la información obtenida a través de los mismos.
                        </p>
                        <a href="/petition" class="stretched-link">Ver</a>
                    </div>
                </div>
            </div>
            <div class="pl-3 pr-3">
                <div class="d-flex position-relative table table-bordered p-3">
                    <img width="90px" height="90px" src="{{ URL::asset('img/equipment.png') }}" alt="">
                    <div class="p-3">
                        <h5 class="mt-0">Equipos : </h5>
                        <p>Todos los equipos seran registrados por el responsable del área.
                        </p>
                        <a href="/equipment" class="stretched-link">Ver</a>
                    </div>
                </div>
            </div>
            <div class="pl-3 pr-3">
                <div class="d-flex position-relative table table-bordered p-3">
                    <img width="90px" height="90px" src="{{ URL::asset('img/collaborator.png') }}" alt="">
                    <div class="p-3">
                        <h5 class="mt-0">Colaboradores : </h5>
                        <p>Todos los colaboradores externos serán registrados por el responsable del área.
                        </p>
                        <a href="/equipment" class="stretched-link">Ver</a>
                    </div>
                </div>
            </div>
            <div class="pl-3 pr-3">
                <div class="d-flex position-relative table table-bordered p-3">
                    <img width="90px" height="90px" src="{{ URL::asset('img/project.png') }}" alt="">
                    <div class="p-3">
                        <h5 class="mt-0">Proyectos : </h5>
                        <p>Todos los equipos estan administrados por el director.
                        </p>
                        <a href="/projects" class="stretched-link">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="p-5">
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
    </div>
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
