@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
    {{-- Barra--}}
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-8 p-4">
                <h4><strong>Solicitud: {{ $petition->fileID }}</strong></h4>
                <h6>Ciudad de México a <?php echo date('j-m-Y'); ?> </h6>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
    {{-- Peticion --}}
    <div class="row p-5 container">
        <div class="col-md-4 p-2">
            <div>
                <div class="card-header bg-secondary">
                    <div class="card-title">
                        <h6 class="p-1">{{ $petition->fileID }}</h6>
                    </div>
                </div>
                <div class="card-body table-bordered">
                    <div>
                        <h4><strong>Solicitud:
                                <?php
                                switch ($petition->status) {
                                    case 0:
                                        echo '<div class="fas fa-circle pendiente"><strong> Pendiente </strong></div>';
                                        break;
                                    case 1:
                                        echo '<div class="fas fa-circle en-proceso"><strong> En proceso </strong></div>';
                                        break;
                                    case 2:
                                        echo '<div class="fas fa-circle atendida"><strong> Atendida </strong></div>';
                                        break;
                                    case 3:
                                        echo '<div class="fas fa-circle validada"><strong> Validada </strong></div>';
                                        break;
                                }
                                ?></strong></h4>
                    </div>
                    <div>
                        <h6><strong>Fecha de solicitud: </strong><p>{{ $petition->created_at }} </p></h6>
                    </div>
                    <hr>
                    <!--Bloque de nodo en la solicitud, aqui se hace la logica para saber si poner o no el nodo-->
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h6><strong>Nodo:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if ($petition->collaborator->nodo == '')
                                @if ($petition->tk_nodo_1 == '')
                                    <h6 style="color:crimson" >{{'Pendiente'}}<h6>
                                @else
                                    <h6 style="color:darkorange" >{{ 'En proceso'}}<h6>
                                @endif
                            @else
                                <h6 style="color:#1795b8" >{{ 'Atendida'}}<h6>
                            @endif
                        </div>
                    </div>
                    <!--Se terminal el bloque del nodo-->
                    <br>
                    <!--Bloque de Cuenta Glpi en la solicitud, aqui se hace la logica para saber si poner o no  Cuenta Glpi-->
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h6><strong>Cuenta Glpi:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                             @if ($petition->collaborator->account_glpi == '')
                                @if ($petition->tk_glpi_account_1 == '')
                                    <h6 style="color:crimson" >{{'Pendiente'}}<h6>
                                @else
                                    <h6 style="color:darkorange" >{{ 'En proceso'}}<h6>
                                @endif
                            @else
                                <h6 style="color:#1795b8" >{{ 'Atendida'}}<h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h6><strong>Cuenta Gitlab:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                             @if ($petition->collaborator->account_gitlab == '')
                                @if ($petition->tk_gitlab_account_1 == '')
                                    <h6 style="color:crimson" >{{'Pendiente'}}<h6>
                                @else
                                    <h6 style="color:darkorange" >{{ 'En proceso'}}<h6>
                                @endif
                            @else
                                <h6 style="color:#1795b8" >{{ 'Atendida'}}<h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h6><strong>Cuenta Jira:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                             @if ($petition->collaborator->account_jira == '')
                                @if ($petition->tk_jira_account_1 == '')
                                    <h6 style="color:crimson" >{{'Pendiente'}}<h6>
                                @else
                                    <h6 style="color:darkorange" >{{ 'En proceso'}}<h6>
                                @endif
                            @else
                                <h6 style="color:#1795b8" >{{ 'Atendida'}}<h6>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h6><strong>Directorio Activo:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                             @if ($petition->collaborator->account_da == '')
                                @if ($petition->tk_da_account_1 == '')
                                    <h6 style="color:crimson" >{{'Pendiente'}}<h6>
                                @else
                                    <h6 style="color:darkorange" >{{ 'En proceso'}}<h6>
                                @endif
                            @else
                                <h6 style="color: #1795b8" >{{ 'Atendida'}}<h6>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                <h6><strong>Internet</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                             @if ($petition->collaborator->internet == '')
                                @if ($petition->tk_internet_1 == '')
                                    <h6 style="color:crimson" >{{'Pendiente'}}<h6>
                                @else
                                    <h6 style="color:darkorange" >{{ 'En proceso'}}<h6>
                                @endif
                            @else
                                <h6 style="color:#1795b8" >{{ 'Atendido'}}<h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                <h6><strong>VPN:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                             @if ($petition->collaborator->vpn == '')
                                @if ($petition->tk_vpn_1 == '')
                                    <h6 style="color:crimson" >{{'Pendiente'}}<h6>
                                @else
                                    <h6 style="color:darkorange" >{{ 'En proceso'}}<h6>
                                @endif
                            @else
                                <h6 style="color: #1795b8" >{{ 'Atendido'}}<h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                <h6><strong>IP:</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                             @if ($petition->collaborator->ip == '')
                                @if ($petition->tk_ip_1 == '')
                                    <h6 style="color:crimson" >{{'Pendiente'}}<h6>
                                @else
                                    <h6 style="color:darkorange" >{{ 'En proceso'}}<h6>
                                @endif
                            @else
                                <h6 style="color: #1795b8" >{{ 'Atendido'}}<h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 p-2"></div>
        <div class="col-md-4 p-2">
            <br>
            <br>
            <h4>Status del trámite</h4>
            <p>Aqui va una grafica en semaforo del status del proceso</p>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-5 table-bordered">Aqui va el espacio para generar el pdf</div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5 table-bordered">Aqui va el espacio para escanear y subir el pdf</div>
            </div>
            <br>
            <br>
            <h4><strong>Solicitud:
                    <?php
                    switch ($petition->status) {
                        case 0:
                            echo '<div class="fas fa-circle pendiente"><strong> Pendiente </strong></div>';
                            break;
                        case 1:
                            echo '<div class="fas fa-circle en-proceso"><strong> En proceso </strong></div>';
                            break;
                        case 2:
                            echo '<div class="fas fa-circle atendida"><strong> Atendida </strong></div>';
                            break;
                        case 3:
                            echo '<div class="fas fa-circle validada"><strong> Validada </strong></div>';
                            break;
                    }
                    ?></strong></h4>
        </div>
    </div>
    <div class="container p-5">
        <p>Recuerda que los trámites de servicios TIC'S pueden tardr hasta 9 días hábiles</p>
    </div>
    <br>
    {{-- Titulo de agregar al colaborador--}}
    <div class="container card-header bg-secondary">
        <div class="col-md-12 p-1">
            <h6>Agregar información al colaborador: {{$petition->collaborator->name}} {{$petition->collaborator->last_name}} {{$petition->collaborator->last_maternal}} apartir de la solicitud</h6>
        </div>
    </div>
    {{-- Agregar informacion al colaborador con update --}}
    <div class="row container table-bordered">
        <div class="col-md-5 p-5">
            <form action="{{route('collaborator.update', $petition->collaborator->id)}}" method="POST">
                @csrf
                @method('PUT')
                @if ($petition->collaborator->nodo == '')
                    <div class="row">
                        <div class="col-sm-4"><strong>Nodo:</strong></div>
                        <div class="col-sm-7">
                            <input id="nodo" name="nodo" type="text">
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4"><strong>Nodo:</strong></div>
                        <div class="col-sm-7">
                            <input id="nodo" name="nodo" type="hidden" value="{{ $petition->collaborator->nodo }}">{{ $petition->collaborator->nodo }}
                        </div>
                    </div>
                @endif
                <br>
                @if ($petition->collaborator->ip == '')
                    <div class="row">
                        <div class="col-sm-4"><strong>IP:</strong></div>
                        <div class="col-sm-7"><input id="ip" name="ip" type="text"></div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4"><strong>IP:</strong></div>
                        <div class="col-sm-7">
                            <input id="ip" name="ip" type="hidden" value="{{ $petition->collaborator->ip }}">{{ $petition->collaborator->ip }}
                        </div>
                    </div>
                @endif
                <br>
                @if ($petition->collaborator->internet == '')
                    <div class="row">
                        <div class="col-sm-4"><strong>Internet:</strong></div>
                        <div class="col-sm-7">Si <input id="internet" name="internet" type="checkbox" value="1"></div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4"><strong>Internet:</strong></div>
                        <div class="col-sm-7">
                            <input id="internet" name="internet" type="hidden" value="1"><p>Activo</p>
                        </div>
                    </div>
                @endif
                <br>
                @if ($petition->collaborator->vpn == '')
                    <div class="row">
                        <div class="col-sm-4"><strong>VPN:</strong></div>
                        <div class="col-sm-7">Si <input id="vpn" name="vpn" type="checkbox" value="1"></div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4"><strong>VPN:</strong></div>
                        <div class="col-sm-7">
                            <input id="vpn" name="vpn" type="hidden" value="1"><p>Activo</p>
                        </div>
                    </div>
                @endif
                <br>
            </div>
            <div class="col-md-5 p-5">
                @if ($petition->collaborator->account_glpi == '')
                    <div class="row">
                        <div class="col-sm-5"><strong>Cuenta Glpi:</strong></div>
                        <div><input id="account_glpi" name="account_glpi" type="text" class="col-sm-7"></div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4"><strong>Cuenta Glpi:</strong></div>
                        <div class="col-sm-7">
                            <input id="account_glpi" name="account_glpi" type="hidden" value="{{ $petition->collaborator->account_glpi }}">{{ $petition->collaborator->account_glpi }}
                        </div>
                    </div>
                @endif
                <br>
                @if ($petition->collaborator->account_gitlab == '')
                    <div class="row">
                        <div class="col-sm-5"><strong>Cuenta Gitlab:</strong></div>
                        <div><input id="account_gitlab" name="account_gitlab" type="text" class="col-sm-7"></div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4"><strong>Cuenta Gitlab:</strong></div>
                        <div class="col-sm-7">
                            <input id="account_gitlab" name="account_gitlab" type="hidden" value="{{ $petition->collaborator->account_gitlab }}">{{ $petition->collaborator->account_gitlab }}
                        </div>
                    </div>
                @endif
                <br>
                @if ($petition->collaborator->account_jira == '')
                    <div class="row">
                        <div class="col-sm-5"><strong>Cuenta Jira:</strong></div>
                        <div><input id="account_jira" name="account_jira" type="text" class="col-sm-7"></div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4"><strong>Cuenta Jira:</strong></div>
                        <div class="col-sm-7">
                            <input id="account_jira" name="account_jira" type="hidden" value="{{ $petition->collaborator->account_jira }}">{{ $petition->collaborator->account_jira }}
                        </div>
                    </div>
                @endif
                <br>
                @if ($petition->collaborator->account_da == '')
                    <div class="row">
                        <div class="col-sm-5"><strong>Directorio Activo:</strong></div>
                        <div><input id="account_da" name="account_da" type="text" class="col-sm-7"></div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4"><strong>Directorio Activo:</strong></div>
                        <div class="col-sm-7">
                            <input id="account_da" name="account_da" type="hidden" value="{{ $petition->collaborator->account_da }}">{{ $petition->collaborator->account_da }}
                        </div>
                    </div>
                @endif
                  {{-- @if ($petition->collaborator->nodo &&
                     $petition->collaborator->ip &&
                     $petition->collaborator->internet &&
                     $petition->collaborator->vpn &&
                     $petition->collaborator->equipment_id &&
                     $petition->collaborator->account_glpi &&
                     $petition->collaborator->account_gitlab &&
                     $petition->collaborator->account_jira &&
                     $petition->collaborator->account_da == --}}

                <input class="btn btn-secondary btn-sm" type="submit" value="Guardar">
            </form>
        </div>
    </div>
    <br>
    <br>
    <div class="container card-header bg-secondary">
        <div class="col-md-4 p-1">
            <h4><strong>Tickets:</strong></h4>
        </div>
    </div>
    {{-- Tickets --}}
    <div class="row container table-bordered">
            <div class="col-md-5 p-3">
                <form action="{{ route('petition.update', $petition->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <br>
                    @if ($petition->tk_da_account_1 == '0')
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket de alta de Cuenta Directorio Activo:</strong></div>
                            <div class="col-sm-2"><input type="text" id="tk_da_account_1" name="tk_da_account_1"></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket de alta de Cuenta Directorio Activo:</strong></div>
                            <input id="tk_da_account_1" name="tk_da_account_1" type="hidden" value="{{ $petition->tk_da_account_1 }}">{{ $petition->tk_da_account_1}}
                        </div>
                    @endif
                    <br>
                    @if ($petition->tk_gitlab_account_1 == '')
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket de alta de Cuenta Gitlab:</strong></div>
                            <div class="col-sm-2"><input type="text" id="tk_gitlab_account_1" name="tk_gitlab_account_1"></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket de alta de Cuenta Gitlab:</strong></div>
                            <input id="tk_gitlab_account_1" name="tk_gitlab_account_1" type="hidden" value="{{ $petition->tk_gitlab_account_1 }}">{{ $petition->tk_gitlab_account_1}}
                        </div>
                    @endif
                    <br>
                    @if ($petition->tk_glpi_account_1 == '')
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket de alta de Cuenta Glpi:</strong></div>
                            <div class="col-sm-2"><input type="text" id="tk_glpi_account_1" name="tk_glpi_account_1"></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket de alta de Cuenta Glpi:</strong></div>
                            <input id="tk_glpi_account_1" name="tk_glpi_account_1" type="hidden" value="{{ $petition->tk_glpi_account_1 }}">{{ $petition->tk_glpi_account_1}}
                        </div>
                    @endif
                    <br>
                    @if ($petition->tk_jira_account_1 == '')
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket de alta de Cuenta Jira:</strong></div>
                            <div class="col-sm-2"><input type="text" id="tk_jira_account_1" name="tk_jira_account_1"></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket de alta de Cuenta Jira:</strong></div>
                            <input id="tk_jira_account_1" name="tk_jira_account_1" type="hidden" value="{{ $petition->tk_jira_account_1 }}">{{ $petition->tk_jira_account_1}}
                        </div>
                    @endif
                    <br>
                    @if ($petition->tk_nodo_1 == '')
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket Nodo:</strong></div>
                            <div class="col-sm-2"><input type="text" id="tk_nodo_1" name="tk_nodo_1"></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket Nodo:</strong></div>
                            <input id="tk_nodo_1" name="tk_nodo_1" type="hidden" value="{{ $petition->tk_nodo_1 }}">{{ $petition->tk_nodo_1}}
                        </div>
                    @endif
                    <br>
                    @if ($petition->tk_ip_1 == '')
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket IP:</strong></div>
                            <div class="col-sm-2"><input type="text" id="tk_ip_1" name="tk_ip_1"></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket IP:</strong></div>
                            <input id="tk_ip_1" name="tk_ip_1" type="hidden" value="{{ $petition->tk_ip_1 }}">{{ $petition->tk_ip_1}}
                        </div>
                    @endif
                    <br>
                    @if ($petition->tk_internet_1 == '')
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket Internet:</strong></div>
                            <div class="col-sm-2"><input type="text" id="tk_internet_1" name="tk_internet_1"></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket Internet:</strong></div>
                            <input id="tk_internet_1" name="tk_internet_1" type="hidden" value="{{ $petition->tk_internet_1 }}">{{ $petition->tk_internet_1}}
                        </div>
                    @endif
                    <br>
                    @if ($petition->tk_vpn_1 == '')
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket VPN:</strong></div>
                            <div class="col-sm-2"><input type="text" id="tk_vpn_1" name="tk_vpn_1"></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-9"><strong>Ticket VPN:</strong></div>
                            <input id="tk_vpn_1" name="tk_vpn_1" type="hidden" value="{{ $petition->tk_vpn_1 }}">{{ $petition->tk_vpn_1}}
                        </div>
                    @endif
                    <br>
            </div>
            <div class="col-md-1 p-3"></div>
            <div class="col-md-5 p-3">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-5 pt-20 "><strong>Folio de solicitud:</strong></div>
                        <input name="petition_id" id="petition_id" type="hidden" value="{{ $petition->fileID  }}">{{ $petition->fileID  }}
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-5"><strong>Colaborador:</strong></div>
                        <input type="hidden" value="{{ $petition->collaborator->id }}">
                            {{ $petition->collaborator->name }}
                            {{ $petition->collaborator->last_name }}
                            {{ $petition->collaborator->last_maternal }}
                </div>
                <br>
                 <div class="row">
                        <div class="col-md-2"><input class="btn btn-secondary" type="submit" value="Guardar tickets"></div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-1"><a href="/collaborator" class="btn btn-secondary">Regresar</a></button></div>
    </div>
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
@stop
