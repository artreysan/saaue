@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-8 p-4">
                <h5><strong>Perfil del colaborador</strong></h5>
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
            <div class="col-md-7"></div>
            <div class="col-md-2"><a href="/collaborator" class="btn btn-secondary">Ver todos</a></button></div>
            <div class="col-md-2"><a href="/collaborator/petition/{{ $collaborator->id }}"><button type="button"
                        class="btn btn-danger">Hacer solicitud</button></a></button></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 p-3">
            <div class="card">
                <div class="card-header card-header-primary bg-secondary">
                    <div class="card-title">{{ $collaborator->rol->rol }}</div>
                </div>
                <div class="card-body table-bordered background-color shadow ">
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Nombre:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div>
                                <h6>{{ $collaborator->name }} {{ $collaborator->last_name }}
                                    {{ $collaborator->last_maternal }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Empresa:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div>
                                <h6>{{ $collaborator->enterprise->name }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Rol:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div>
                                <h6>{{ $collaborator->rol->rol }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Ubicación:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div>
                                <h6>{{ $collaborator->location->ubicacion }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Email:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div>
                                <h6>{{ $collaborator->email }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Nodo:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($collaborator->nodo == '')
                                <h6>{{ 'No tiene Nodo' }}<h6>
                                    @else
                                        <h6>{{ $collaborator->nodo }}</h6>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Directorio Activo:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($collaborator->account_da == '')
                                <h6>{{ 'No tiene cuenta D. Activo' }}<h6>
                                    @else
                                        <h6>{{ $collaborator->account_da }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Cuenta Glpi:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($collaborator->account_glpi == '')
                                <h6>{{ 'No tiene cuenta Glpi' }}<h6>
                                    @else
                                        <h6>{{ $collaborator->account_glpi }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Cuenta Gitlab:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($collaborator->account_gitlab == '')
                                <h6>{{ 'No tiene cuenta Gitlab' }}<h6>
                                    @else
                                        <h6>{{ $collaborator->account_gitlab }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Cuenta Jira:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($collaborator->account_jira == '')
                                <h6>{{ 'No tiene cuenta Jira' }}<h6>
                                    @else
                                        <h6>{{ $collaborator->account_jira }}</h6>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>Internet</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($collaborator->internet == '')
                                <h6>{{ 'No tiene internet' }}<h6>
                                    @else
                                        <h6>{{ 'Cuenta con internet' }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>VPN:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($collaborator->vpn == '')
                                <h6>{{ 'No tiene vpn' }}<h6>
                                    @else
                                        <h6>{{ 'Cuenta con una VPN' }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <h6><strong>IP:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if ($collaborator->ip == '')
                                <h6>{{ 'No tiene IP' }}<h6>
                                    @else
                                        <h6>{{ $collaborator->ip }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-3">
            <br>
            <div class="p-5">
                <p>Aqui va a ir una foto del colaboraador</p>
            </div>
            <br>
            <br>
            @if (isset($equipments))
            @else
            @endif
            <br>
            <br>
            <div class="p-5">
                <table class="table table-striped shadow" id="petitions">
                    <thead class="table-secondary">
                        <th>Id</th>
                        <th>Folio</th>
                        <th>Fecha</th>
                        <th>Status</th>
                        <th>Ver</th>
                    </thead>
                    @foreach ($petitions as $petition)
                        <tbody>
                            <td>{{ $petition->id }}</td>
                            <td>{{ $petition->fileID }}</td>
                            <td>{{ $petition->created_at }}</td>
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
                            <td><a href="/petition/{{ $petition->id }}" alt="ver" class="col-md-1 fas fa-eye"></a>
                            </td>
                    @endforeach
                </table>
            </div>
        </div>
        <footer class="footer py-3 bg-green-900">
            <div class="row align-items-center justify-content-lg-between">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Desarrollado en CDMX,<strong> UTIC </strong>
                    <a href="https://www.creative-tim.com" class="font-weight-bold " target="_blank">
                </div>
            </div>
        </footer>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#petitions').DataTable({
                "language": {
                    "search": "Buscar petición",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Monstrando página _PAGE_ de _PAGES_ ",
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
