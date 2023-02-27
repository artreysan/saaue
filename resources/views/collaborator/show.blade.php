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
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-1"><a href="/collaborator" class="btn btn-secondary">Ver todos</a></button></div>
        <div class="col-md-1"><a href="/collaborator/petition/{{ $collaborator->id }}"><button type="button"
                    class="btn btn-danger">Hacer solicitud</button></a></button></div>
    </div>

    <div class="row">
        <div class="col-md-5 p-5">
            <div class="card-header card-header-primary bg-secondary">
                <div class="card-title">{{ $collaborator->rol->rol }}</div>
            </div>
            <div class="card-body table-bordered background-color shadow ">
                <div class="row">
                    <div class="col-md-4">
                        <img width="130px" height="150px" src="{{ URL::asset('img/perfil.png') }}" alt="">
                    </div>
                    <div class="col-md-7">
                        <div>
                            <h6> {{ $collaborator->name }} {{ $collaborator->last_name }} {{ $collaborator->last_maternal }}
                            </h6>
                        </div>
                        <div>
                            <h6>{{ $collaborator->enterprise->name }}</h6>
                        </div>
                        <div>
                            <h6>{{ $collaborator->rol->rol }}</h6>
                        </div>
                        <div>
                            <h6>{{ $collaborator->location->ubicacion }}</h6>
                        </div>
                        <div>
                            <h6>{{ $collaborator->email }}</h6>
                        </div>
                        <br>
                        <div>
                            <h6> <strong>Equipos</strong></h6>
                            @foreach ($equipments as $equipment)
                                <tbody>
                                    <h6>{{ $equipment->tipo }} {{ $equipment->marca }} {{ $equipment->modelo }}
                                        -
                                        {{ $equipment->serie }} <a style="padding-left:9px "
                                            href="equipment/{{ $equipment->id }}" alt="equipment"><button
                                                class="	fas fa-laptop"></button></a></h6>
                                </tbody>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
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
        <div class="col-md-7">
            <div class="p-5">
                <div class="p-2 container"
                    style="background-color: #f4f6f9; color: rgb(41, 41, 41); with:300px; higth: 50px">
                    <h6>Solicitudes de {{ $collaborator->name }} {{ $collaborator->last_name }}
                        {{ $collaborator->last_maternal }}</h6>
                </div>
                <table class="table" id="petitions">
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
                                        echo '<div class="fass fa-circle atendida"></div>';
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
        <div class="p-5">
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
    </div>
@stop
