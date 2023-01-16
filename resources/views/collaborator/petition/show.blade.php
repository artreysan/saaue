@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
    {{-- Barra de titulo --}}
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-8 p-4">
                <h4><strong>Solicitud de servicios</strong></h4>
                <h6>Ciudad de México a <?php echo date('j-m-Y'); ?> </h6>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
    <br>
    {{-- Botones --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-1"><a href="/"><button type="button" class="btn btn-secondary"> Inicio </button></a>
            </div>
            <div class="col-md-1"><a href="/collaborator/{{ $collaborator->id }}"><button type="button"
                        class="btn btn-secondary">Regresar</button></a></div>
        </div>
    </div>
    <br>
    {{-- Bloque del formulario de la peticion --}}
    <div class="container">
        <form action="{{ route('petition.store') }}" method="POST">
            @csrf

            <!--Información principal de la peticion-->
            <div class="container">
                <div class="container">
                    <div class="card-header bg-secondary">
                        <div class="card-title">
                            <h6 class="p-1">Datos:</h6>
                        </div>
                    </div>
                    <div class="card-body table-bordered">
                        <div class="row">
                            <div class="col-md-4">
                                <h6><strong>Servicios requeridos a:</strong></h6>
                                {{ $collaborator->rol->rol }}
                            </div>
                            <div class="col-md-3">
                                <input id="collaborator_id" name="collaborator_id" type="hidden"
                                    value="{{ $collaborator->id }}">{{ $collaborator->nombre }}
                                {{ $collaborator->apellido_paterno }} {{ $collaborator->apellido_materno }}
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <h6><strong>Solicitante:</strong></h6>
                                {{ $collaborator->rol->rol }}
                            </div>
                            <div class="col-md-3">
                                <input id="user_id" name="user_id" type="hidden"
                                    value="{{ Auth::user()->id }}">{{ Auth::user()->name }}
                                {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}
                            </div>
                        </div>
                        <br>
                        <br>
                        <div>
                            @if ($collaborator->equipment_id == null)
                                <h6>No tiene equipo de computo asignado<h6>
                                    @else
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6><strong>Equipo actual:</strong></h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table table-bordered">
                                                        <thead class="table-dark">
                                                            <th>Tipo</th>
                                                            <th>Marca</th>
                                                            <th>Modelo</th>
                                                            <th>Serie</th>
                                                        </thead>
                                                        <tbody>
                                                            <td>{{ $collaborator->equipment->tipo }}</td>
                                                            <td>{{ $collaborator->equipment->marca }}</td>
                                                            <td>{{ $collaborator->equipment->modelo }}</td>
                                                            <td>{{ $collaborator->equipment->serie }}</td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                            @endif
                        </div>
                    </div>
                    <br>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="container p-2 bg-secondary">
                            <h6>Servicios TIC</h6>
                        </div>
                        <div class="container p-4 table-bordered">
                            @if ($collaborator->nodo == '1')
                            @else
                                <div class="row">
                                    <div class="col-sm-3"><strong>Nodo:</strong></div>
                                    <div class="col-sm-2"><input type="radio" name="nodo" value="1" checked> Sí
                                    </div>
                                    <div class="col-sm-2"><input type="radio" name="nodo" value="0"> No</div>
                                </div>
                            @endif
                            <br>
                            @if ($collaborator->vpn == '1')
                            @else
                                <div class="row">
                                    <div class="col-sm-3"><strong>VPN:</strong></div>
                                    <div class="col-sm-2"><input type="radio" name="vpn" value="1" checked> Sí
                                    </div>
                                    <div class="col-sm-2"><input type="radio" name="vpn" value="0"> No</div>
                                </div>
                            @endif
                            <br>
                            @if ($collaborator->ip == '1')
                            @else
                                <div class="row">
                                    <div class="col-sm-3"><strong>IP:</strong></div>
                                    <div class="col-sm-2"><input type="radio" name="ip" value="1" checked> Sí
                                    </div>
                                    <div class="col-sm-2"><input type="radio" name="ip" value="0"> No</div>
                                </div>
                            @endif
                            <br>
                            @if ($collaborator->internet == '1')
                            @else
                                <div class="row">
                                    <div class="col-sm-3"><strong>Internet:</strong></div>
                                    <div class="col-sm-2"><input type="radio" name="internet" value="1" checked> Sí
                                    </div>
                                    <div class="col-sm-2"><input type="radio" name="internet" value="0"> No</div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-1"> </div>
                    <div class="col-md-4">
                        <div class="container p-2 bg-secondary">
                            <h6>Cuentas</h6>
                        </div>
                        <div class="container p-4 table-bordered">
                            @if ($collaborator->account_glpi == '')
                                <div class="row">
                                    <div class="col-sm-3"><strong>GLPI:</strong></div>
                                    <div class="col-sm-2"><input type="radio" name="account_glpi" value="1"
                                            checked>
                                        Sí
                                    </div>
                                    <div class="col-sm-2"><input type="radio" name="account_glpi" value="0"> No
                                    </div>
                                </div>
                            @else
                            @endif
                            <br>
                            @if ($collaborator->account_gitlab == '')
                                <div class="row">
                                    <div class="col-sm-3"><strong>GLPI:</strong></div>
                                    <div class="col-sm-2"><input type="radio" name="account_gitlab" value="1"
                                            checked> Sí
                                    </div>
                                    <div class="col-sm-2"><input type="radio" name="account_gitlab" value="0"> No
                                    </div>
                                </div>
                            @else
                            @endif
                            <br>
                            @if ($collaborator->account_jira == '')
                                <div class="row">
                                    <div class="col-sm-3"><strong>JIRA:</strong></div>
                                    <div class="col-sm-2"><input type="radio" name="account_jira" value="1"
                                            checked> Sí
                                    </div>
                                    <div class="col-sm-2"><input type="radio" name="account_jira" value="0"> No
                                    </div>
                                </div>
                            @else
                            @endif
                            <br>
                            @if ($collaborator->account_da == '')
                                <div class="row">
                                    <div class="col-sm-3"><strong>D. A:</strong></div>
                                    <div class="col-sm-2"><input type="radio" name="account_da" value="1"
                                            checked> Sí
                                    </div>
                                    <div class="col-sm-2"><input type="radio" name="account_da" value="0"> No
                                    </div>
                                </div>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <br>
                {{-- @if ($collaborator->equipment_id == '')
                    <div class="row">
                        <div class="col-md-7 container p-3 alert">
                            <h6>Para realizar una solicitud es necesario tener un equipo de computo asignado, ve a equipos y asigna el colaborador al equipo deseado<h6>
                        </div>
                    </div>
                @else --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-2"><input class="btn btn-secondary btn-lg active" type="submit"
                                    value="Enviar solicitud"></div>
                        </div>
                    </div>
                {{-- @endif --}}
        </form>
    </div>
    <br>
    <footer class="footer p-3 bg-green-900">
        <div class="copyright text-center text-sm text-muted text-lg-start">©
            <script>
                document.write(new Date().getFullYear())
            </script>Desarrollado en CDMX,<strong> UTIC </strong>
            <a href="https://www.creative-tim.com" class="font-weight-bold " target="_blank">
        </div>
    </footer>
@stop
