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
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-3"></div>
        <div class="col-md-1"><a href="/"><button type="button" class="btn btn-secondary"> Inicio </button></a>
        </div>
        <div class="col-md-1"><a href="/collaborator/{{ $collaborator->id }}"><button type="button"
                    class="btn btn-secondary">Regresar</button></a></div>
    </div>
    <br>
    {{-- Bloque del formulario de la peticion --}}
    <form action="{{ route('petition.store') }}" method="POST">
        @csrf
        <div class="row container">
            <div class="col-md-8">
                <div class="card-header bg-secondary">
                    <div class="card-title">
                        <h6 class="p-1">Datos:</h6>
                    </div>
                </div>
                <div class="card-body table-bordered">
                    <div class="row">
                        <div class="col-md-4">
                            <h6><strong>Servicios requeridos a:</strong></h6>
                        </div>
                        <div class="col-md-4">
                            <input id="collaborator_id" name="collaborator_id" type="hidden"
                                value="{{ $collaborator->id }}">
                            {{ $collaborator->name }} {{ $collaborator->last_name }} {{ $collaborator->last_name }}
                            <strong>{{ $collaborator->rol->rol }}</strong>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <h6><strong>Solicitante:</strong></h6>
                        </div>
                        <div class="col-md-5">
                            <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                            {{ Auth::user()->name }} {{ Auth::user()->last_maternal }} {{ Auth::user()->last_maternal }}
                            <strong>{{ Auth::user()->role->name }}</strong>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="table table-bordered">
                        @if (count($equipments) == 0)
                        @else
                            <div class="row">
                                <div class="col-md-4">
                                    <h6><strong>Equipo solicitante:</strong></h6>
                                </div>
                                <div>
                                    <select name="equipment_id" id="equipment_id" required>
                                        @foreach ( $equipments as $e)
                                            <option value="{{$e->id}}" id="equipment_id">
                                                    {{$e->serie}} | {{$e->marca}} {{$e->modelo}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row container">
            <div class="col-md-4">
            <br>
                @if (count($equipments) == 0)
                 <div class="p-5 table-bordered">
                    <p>NO HAY EQUIPO ASIGNADO</p>
                </div>
                @else
                    <div class="card-header bg-secondary">
                        <h6>Servicios TIC</h6>
                    </div>
                    <div class="p-3 table-bordered">
                        @if ($collaborator->nodo == '1')
                        @else
                            <div class="row">
                                <div class="col-sm-3"><strong>Nodo:</strong></div>
                                <div class="col-sm-2"><input type="radio" name="nodo" value="1" checked> Sí </div>
                                <div class="col-sm-2"><input type="radio" name="nodo" value="0"> No </div>
                            </div>
                        @endif
                        @if ($collaborator->vpn == '1')
                        @else
                            <div class="row">
                                <div class="col-sm-3"><strong>VPN:</strong></div>
                                <div class="col-sm-2"><input type="radio" name="vpn" value="1" checked> Sí </div>
                                <div class="col-sm-2"><input type="radio" name="vpn" value="0"> No </div>
                            </div>
                        @endif
                        @if ($collaborator->ip == '1')
                        @else
                            <div class="row">
                                <div class="col-sm-3"><strong>IP:</strong></div>
                                <div class="col-sm-2"><input type="radio" name="ip" value="1" checked> Sí </div>
                                <div class="col-sm-2"><input type="radio" name="ip" value="0"> No</div>
                            </div>
                        @endif
                        @if ($collaborator->internet == '1')
                        @else
                            <div class="row">
                                <div class="col-sm-3"><strong>Internet:</strong></div>
                                <div class="col-sm-2"><input type="radio" name="internet" value="1" checked> Sí </div>
                                <div class="col-sm-2"><input type="radio" name="internet" value="0"> No </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <br>
                <div class="card-header bg-secondary">
                    <h6>Cuentas</h6>
                </div>
                <div class="p-3 table-bordered">
                    @if ($collaborator->account_glpi == null)
                        <div class="row">
                            <div class="col-sm-3"><strong>GLPI:</strong></div>
                            <div class="col-sm-2"><input type="radio" name="account_glpi" value="1" checked> Sí
                            </div>
                            <div class="col-sm-2"><input type="radio" name="account_glpi" value="0"> No </div>
                        </div>
                    @else
                    @endif
                    @if ($collaborator->account_gitlab == null)
                        <div class="row">
                            <div class="col-sm-3"><strong>GLPI:</strong></div>
                            <div class="col-sm-2"><input type="radio" name="account_gitlab" value="1" checked> Sí
                            </div>
                            <div class="col-sm-2"><input type="radio" name="account_gitlab" value="0"> No
                            </div>
                        </div>
                    @else
                    @endif
                    @if ($collaborator->account_jira == null)
                        <div class="row">
                            <div class="col-sm-3"><strong>JIRA:</strong></div>
                            <div class="col-sm-2"><input type="radio" name="account_jira" value="1" checked> Sí
                            </div>
                            <div class="col-sm-2"><input type="radio" name="account_jira" value="0"> No
                            </div>
                        </div>
                    @else
                    @endif
                    @if ($collaborator->account_da == null)
                        <div class="row">
                            <div class="col-sm-3"><strong>D. A:</strong></div>
                            <div class="col-sm-2"><input type="radio" name="account_da" value="1" checked> Sí
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
         <div class="row container">
                <div class="col-md-6"></div>
                <div class="col-md-2"><input class="btn btn-secondary btn-lg active" type="submit" value="Enviar solicitud"></div>
            </div>
    </form>
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
