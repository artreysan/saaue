@extends('adminlte::page')
@include('sweetalert::alert')

@section('title', 'UTIC')

@section('content_header')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Barra --}}
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
                <div class="card-body table-bordered shadow">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><strong>Solicitud: </strong></h4>
                        </div>
                        <div class="col-md-6">
                            <?php
                            switch ($petition->status) {
                                case 0:
                                    echo '<div class="fas fa-circle pendiente"><strong>  Pendiente  </strong></div>';
                                    break;
                                case 1:
                                    echo '<div class=" fas fa-circle en-proceso "><strong>  En proceso  </strong></div>';
                                    break;
                                case 2:
                                    echo '<div class="fas fa-circle atendida"><strong> Atendida </strong></div>';
                                    break;
                                case 3:
                                    echo '<div class="fas fa-circle validada"><strong> Validada </strong></div>';
                                    break;
                            }

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6><strong>Fecha de solicitud: </strong></h6>
                        </div>
                        <div class="col-md-6">
                            <h6>
                                <p>{{ $petition->created_at }} </p>
                            </h6>
                        </div>
                    </div>
                    <br>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col align-self-center">
                                <h6><strong>Revisar solicitud </strong></h6>
                                <a href="/petition/{{ $petition->id }}/{{ $petition->fileID }}" target="_blank">
                                    <img width="45px" height="45px" src="{{ URL::asset('img/pdf.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <!--Bloque de nodo en la solicitud, aqui se hace la logica para saber si poner o no el nodo-->
                    <div class="row">
                        @if ($petition->nodo == '1')
                            @if (isset($petition->a_nodo))
                                <div class="col-md-6">
                                    <div>
                                        <h6><strong>Nodo:</strong></h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                    </div>
                                    <br>
                                </div>
                            @else
                                @if (isset($petition->tk_nodo_1))
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Nodo:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                        </div>
                                        <br>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Nodo:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                        </div>
                                        <br>
                                    </div>
                                @endif
                            @endif
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del nodo-->
                    <!--Bloque de glpi en la solicitud, aqui se hace la logica para saber si poner o no IP-->
                    <div class="row">
                        @if ($petition->ip == '1')
                            @if (isset($petition->a_ip))
                                <div class="col-md-6">
                                    <div>
                                        <h6><strong>IP:</strong></h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                    </div>
                                </div>
                            @else
                                @if (isset($petition->tk_ip_1))
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>IP:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>IP:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del IP-->
                    <!--Bloque de gitlab en la solicitud, aqui se hace la logica para saber si poner o no VPN-->
                    <div class="row">
                        @if ($petition->vpn == '1')
                            @if (isset($petition->a_vpn))
                                <div class="col-md-6">
                                    <div>
                                        <h6><strong>VPN:</strong></h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                    </div>
                                </div>
                            @else
                                @if (isset($petition->tk_vpn_1))
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>VPN:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>VPN:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del VPN-->
                    <!--Bloque de internet en la solicitud, aqui se hace la logica para saber si poner o no Internet-->
                    <div class="row">
                        @if ($petition->internet == '1')
                            @if (isset($petition->a_internet))
                                <div class="col-md-6">
                                    <div>
                                        <h6><strong>Internet:</strong></h6>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                    </div>
                                    <br>
                                </div>
                            @else
                                @if (isset($petition->tk_internet_1))
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Internet:</strong></h6>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                        </div>
                                        <br>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Internet:</strong></h6>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                        </div>
                                        <br>
                                    </div>
                                @endif
                            @endif
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del internet-->
                    <!--Bloque de directorio activo en la solicitud, aqui se hace la logica para saber si poner o no directorio activo-->
                    <div class="row">
                        @if ($petition->account_da == '1')
                            @if (isset($petition->a_account_da))
                                <div class="col-md-6">
                                    <div>
                                        <h6><strong>Directorio Activo:</strong></h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                                <br>
                                    </div>
                                </div>
                            @else
                                @if (isset($petition->tk_da_account_1))
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Directorio Activo:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                        </div>
                                    </div>
                                    <br>
                                @else
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Directorio Activo:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                        </div>
                                    </div>
                                    <br>
                                @endif
                            @endif
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del directorio activo-->
                    <!--Bloque de glpi en la solicitud, aqui se hace la logica para saber si poner o no glpi-->
                    <div class="row">
                        @if ($petition->account_glpi == '1')
                            @if (isset($petition->a_account_glpi))
                                <div class="col-md-6">
                                    <div>
                                        <h6><strong>Cuenta GLPI:</strong></h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                    </div>
                                </div>
                            @else
                                @if (isset($petition->tk_glpi_account_1))
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Cuenta GLPI:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Cuenta GLPI:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del GLPI-->
                    <!--Bloque de gitlab en la solicitud, aqui se hace la logica para saber si poner o no gitlab-->
                    <div class="row">
                        @if ($petition->account_gitlab == '1')
                            @if (isset($petition->a_account_gitlab))
                                <div class="col-md-6">
                                    <div>
                                        <h6><strong>Cuenta Gitlab:</strong></h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                    </div>
                                </div>
                            @else
                                @if (isset($petition->tk_gitlab_account_1))
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Cuenta Gitlab:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Cuenta Gitlab:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del gitlab-->
                    <!--Bloque de JIRA en la solicitud, aqui se hace la logica para saber si poner o no JIRA-->
                    <div class="row">
                        @if ($petition->account_jira == '1')
                            @if (isset($petition->a_account_jira))
                                <div class="col-md-6">
                                    <div>
                                        <h6><strong>Cuenta Jira:</strong></h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                    </div>
                                </div>
                            @else
                                @if (isset($petition->tk_jira_account_1))
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Cuenta Jira:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div>
                                            <h6><strong>Cuenta Jira:</strong></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del Jira-->
                </div>
            </div>
        </div>
        <div class="col-md-1 p-1">
        </div>
        <div class="col-md-5 p-5 table-bordered shadow">
            <br>
            <div class="container text-center">
                <div class="col align-self-center">
                    <h4>Estatus del trámite</h4>
                    <p>Aqui va una grafica en semaforo del status del proceso </p>
                    <br>
                    <div class="container">
                        <form action="{{ route('petition.updateFile', $petition->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($petition->base64_signedPetition == '')
                                <br>
                                <p><strong>No hay documento almacenado</strong></p>
                                <img width="70px" height="70px"
                                    src="{{ URL::asset('img/scanner - no.png') }}"alt="">
                                <br>
                                <br>
                                <input class="btn btn-secondary" type="submit" value="Guardar archivo" required>
                                <br>

                            @else
                            <br>
                                <p><strong>Solicitud Original</strong></p>
                                <a href="/petition/{{ $petition->id }}/{{ $petition->fileID }}/sign" target="_blank">
                                    <img width="70px" height="70px"
                                        src="{{ URL::asset('img/scanner.png') }}"alt="">
                                </a>
                                <br>
                                <br>
                                <input type="file" name="archivo">
                                <br>
                                <br>
                                <input class="btn btn-secondary" type="submit" value="Actualizar archivo" required>
                                <br>
                            @endif
                        </form>
                    </div>
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
    </div>
    <div class="container p-5">
        <p>Recuerda que los trámites de servicios TIC'S pueden tardr hasta 9 días hábiles</p>
    </div>
    <br>

    {{-- @if (auth()->user()->role_id == 3 && $petition->status == 2)--}}

    @if (auth()->user()->role_id == 3 )
        <div id='viewExterno'>
            <div class="container card-header bg-secondary">
                <div class="col-md-12 p-1">
                    <h6>Respuesta a solicitud para el colaborador {{ $petition->collaborator->name }}
                        {{ $petition->collaborator->last_name }} {{ $petition->collaborator->last_maternal }}
                    </h6>
                </div>
            </div>
            <div class="row card-body container table-bordered shadow">
                <div class="col-md-12">
                    <form action="{{ route('petition.update', $petition->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                         <div class="row">
                            <div class="col-sm-2">
                                <h6><strong>Folio de solicitud:</strong></h6>
                            </div>
                            <input name="fileID" id="fileID" type="hidden"
                                value="{{ $petition->fileID }}">{{ $petition->fileID }}
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6><strong>Colaborador:</strong></h6>
                            </div>
                            <input name="collaboraator_id" type="hidden" value="{{ $petition->collaborator->id }}">
                            {{ $petition->collaborator->name }}
                            {{ $petition->collaborator->last_name }}
                            {{ $petition->collaborator->last_maternal }}
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6><strong>Fecha de solicitud: </strong></h6>
                            </div>

                            <p>{{ $petition->created_at }} </p>

                        </div>
                        <div class="row">
                            <div class="col-sm-3">
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
                                        ?></strong> </h4>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="container p-2">
                            <h5><strong>Responder solicitud: </strong></h5>
                        </div>
                        <div class="container p-5">
                            <div class="container">
                                @if ($petition->nodo == 1)
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <strong>Ticket de Nodo: </strong>
                                        </div>
                                        <div class="col-sm-3">
                                            <input name="tk_nodo_1" type="hidden"
                                                value="{{ $petition->tk_nodo_1 }}">{{ $petition->tk_nodo_1 }}
                                        </div>
                                        <div class="col-sm-3">
                                            <strong>Nodo: </strong>
                                        </div>
                                        <div class="col-sm-3">
                                            <input name="a_nodo" type="hidden"
                                                value="{{ $petition->a_nodo }}">{{ $petition->a_nodo }}
                                        </div>
                                        <input name="nodo" id="nodo" value="1" type="hidden">
                                        <br>
                                        <br>
                                    </div>
                                @else
                                    <input name="nodo" id="nodo" value="0" type="hidden">
                                @endif
                            </div>
                            <div class="container">
                                @if ($petition->ip == 1)
                                    @if ($petition->tk_ip_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de IP: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_ip_1" id="tk_ip_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>IP: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="ip" id="ip" value="1" type="hidden">
                                        </div>
                                        <br>
                                    @else
                                        @if ($petition->a_ip == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de IP: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_ip_1" type="hidden"
                                                        value="{{ $petition->tk_ip_1 }}">{{ $petition->tk_ip_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar IP: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_ip" id="a_ip" type="text">
                                                </div>
                                                <input name="ip" id="ip" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de IP: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_ip_1" type="hidden"
                                                        value="{{ $petition->tk_ip_1 }}">{{ $petition->tk_ip_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>IP: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_ip" type="hidden"
                                                        value="{{ $petition->a_ip }}">{{ $petition->a_ip }}
                                                </div>
                                                <input name="ip" id="ip" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @endif
                                    @endif
                                @else
                                    <input name="ip" id="ip" value="0" type="hidden">
                                @endif
                            </div>
                            <div class="container">
                                @if ($petition->vpn == 1)
                                    @if ($petition->tk_vpn_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de VPN: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_vpn_1" id="tk_vpn_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>VPN: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="vpn" id="vpn" value="1" type="hidden">
                                        </div>
                                        <br>
                                    @else
                                        @if ($petition->a_vpn == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de VPN: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_vpn_1" type="hidden"
                                                        value="{{ $petition->tk_vpn_1 }}">{{ $petition->tk_vpn_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar VPN: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_vpn" id="a_vpn" type="text">
                                                </div>
                                                <input name="vpn" id="vpn" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de VPN: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_vpn_1" type="hidden"
                                                        value="{{ $petition->tk_vpn_1 }}">{{ $petition->tk_vpn_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>VPN: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_vpn" type="hidden"
                                                        value="{{ $petition->a_vpn }}">{{ $petition->a_vpn }}
                                                </div>
                                                <input name="vpn" id="vpn" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @endif
                                    @endif
                                @else
                                    <input name="vpn" id="vpn" value="0" type="hidden">
                                @endif
                            </div>
                            <div class="container">
                                @if ($petition->internet == 1)
                                    @if ($petition->tk_internet_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Internet: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_internet_1" id="tk_internet_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Internet: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="internet" id="internet" value="1" type="hidden">
                                        </div>
                                        <br>
                                    @else
                                        @if ($petition->a_internet == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Internet: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_internet_1" type="hidden"
                                                        value="{{ $petition->tk_internet_1 }}">{{ $petition->tk_internet_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Internet: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_internet" id="a_internet" value="autorizado" type="checkbox">
                                                    Autorizar
                                                </div>
                                                <input name="internet" id="internet" value="1" type="hidden">
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Internet: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_internet_1" type="hidden"
                                                        value="{{ $petition->tk_internet_1 }}">{{ $petition->tk_internet_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Internet: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_internet" type="hidden"
                                                        value="{{ $petition->a_internet }}">{{ $petition->a_internet }}
                                                </div>
                                                <input name="internet" id="internet" value="1" type="hidden">
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                        @endif
                                    @endif
                                @else
                                    <input name="internet" id="internet" value="0" type="hidden">
                                @endif
                            </div>
                            <div class="container">
                                @if ($petition->account_da == 1)
                                    @if ($petition->tk_da_account_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Directoio Activo: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_da_account_1" id="tk_da_account_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Cuenta de Activo: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="account_da" id="account_da" value="1" type="hidden">
                                        </div>
                                        <br>
                                    @else
                                        @if ($petition->a_account_da == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Directorio Activo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_da_account_1" type="hidden"
                                                        value="{{ $petition->tk_da_account_1 }}">{{ $petition->tk_da_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Directorio Activo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_da" id="a_account_da" type="text">
                                                </div>
                                                <input name="account_da" id="account_da" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Directorio Activo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_da_account_1" type="hidden"
                                                        value="{{ $petition->tk_da_account_1 }}">{{ $petition->tk_da_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Cuenta de Directorio Activo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_da" type="hidden"
                                                        value="{{ $petition->a_account_da }}">{{ $petition->a_account_da }}
                                                </div>
                                                <input name="account_da" id="account_da" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @endif
                                    @endif
                                @else
                                    <input name="account_da" id="account_da" value="0" type="hidden">
                                @endif
                            </div>
                            <br>
                            <div class="container">
                                @if ($petition->account_glpi == 1)
                                    @if ($petition->tk_glpi_account_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Cuenta GLPI: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_glpi_account_1" id="tk_glpi_account_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Cuenta GLPI: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="account_glpi" id="account_glpi" value="1" type="hidden">
                                        </div>
                                    @else
                                        @if ($petition->a_account_glpi == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta GLPI: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_glpi_account_1" type="hidden"
                                                        value="{{ $petition->tk_glpi_account_1 }}">{{ $petition->tk_glpi_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Cuenta GLPI: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_glpi" id="a_account_glpi" type="text">
                                                </div>
                                            </div>
                                            <input name="account_glpi" id="account_glpi" value="1" type="hidden">
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta GLPI: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_glpi_account_1" type="hidden"
                                                        value="{{ $petition->tk_glpi_account_1 }}">{{ $petition->tk_glpi_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Cuenta GLPI: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_glpi" type="hidden"
                                                        value="{{ $petition->a_account_glpi }}">{{ $petition->a_account_glpi }}
                                                </div>
                                                <input name="account_glpi" id="account_glpi" value="1" type="hidden">
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <input name="account_glpi" id="account_glpi" value="0" type="hidden">
                                @endif
                            </div>
                            <br>
                            <div class="container">
                                @if ($petition->account_gitlab == 1)
                                    @if ($petition->tk_gitlab_account_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Cuenta Gitlab: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_gitlab_account_1" id="tk_gitlab_account_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Cuenta Gitlab: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="account_gitlab" id="account_gitlab" value="1" type="hidden">
                                        </div>
                                    @else
                                        @if ($petition->a_account_gitlab == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta Gitlab: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_gitlab_account_1" type="hidden"
                                                        value="{{ $petition->tk_gitlab_account_1 }}">{{ $petition->tk_gitlab_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Cuenta de Gitlab: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_gitlab" id="a_account_gitlab" type="text">
                                                </div>
                                            </div>
                                            <input name="account_gitlab" id="account_gitlab" value="1" type="hidden">
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta Gitlab: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_gitlab_account_1" type="hidden"
                                                        value="{{ $petition->tk_gitlab_account_1 }}">{{ $petition->tk_gitlab_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Cuenta Gitlab: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_gitlab" type="hidden"
                                                        value="{{ $petition->a_account_gitlab }}">{{ $petition->a_account_gitlab }}
                                                </div>
                                                <input name="account_gitlab" id="account_gitlab" value="1" type="hidden">
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <input name="account_gitlab" id="account_gitlab" value="0" type="hidden">
                                @endif
                            </div>
                            <br>
                            <div class="container">
                                @if ($petition->account_jira == 1)
                                    @if ($petition->tk_jira_account_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Cuenta Jira: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_jira_account_1" id="tk_jira_account_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Cuenta Jira: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="account_jira" id="account_jira" value="1" type="hidden">
                                        </div>
                                    @else
                                        @if ($petition->a_account_jira == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta Jira: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_jira_account_1" type="hidden"
                                                        value="{{ $petition->tk_jira_account_1 }}">{{ $petition->tk_jira_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Cuenta Jira: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_jira" id="a_account_jira" type="text">
                                                </div>
                                            </div>
                                            <input name="account_jira" id="account_jira" value="1" type="hidden">
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta Jira: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_jira_account_1" type="hidden"
                                                        value="{{ $petition->tk_jira_account_1 }}">{{ $petition->tk_jira_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Cuenta Jira: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_jira" type="hidden"
                                                        value="{{ $petition->a_account_jira }}">{{ $petition->a_account_jira }}
                                                </div>
                                                <input name="account_jira" id="account_jira" value="1" type="hidden">
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <input name="account_jira" id="account_jira" value="0" type="hidden">
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-2"><a href="/petition" class="btn btn-secondary">Regresar</a></button></div>
                            @if ($petition->status == 2)
                                <div class="col-sm-2">
                                    <a href="/petition/{{ $petition->id }}/{{ $collaborator->id }}/sendEmail" class="btn btn-secondary">
                                        Enviar Correo
                                    </a>
                                </div>
                            @endif
                            <div class="col-sm-2"><input class="btn btn-secondary" type="submit" value="Guardar"></div>
                            {{-- <div class="col-sm-3">
                                <?php
                                switch ($petition->status) {
                                    case 0:
                                        echo '<div class="fas fa-circle validada"><strong> Validada </strong></div>';
                                        break;
                                    case 1:
                                        if ($petition->nodo == 1 && isset($petition->a_nodo) && $petition->ip == 1 && isset($petition->a_ip) && $petition->vpn == 1 && isset($petition->vpn)) {
                                            # code...
                                        }
                                        break;
                                }
                                ?>
                            </div> --}}
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
        <div id='viewLectorAndAdmin'>
            <div class="container card-header bg-secondary">
                <div class="col-md-12 p-1">
                    <h6>Responder solicitud para el colaborador {{ $petition->collaborator->name }}
                        {{ $petition->collaborator->last_name }} {{ $petition->collaborator->last_maternal }} apartir de la
                        solicitud</h6>
                </div>
            </div>
            <div class="row card-body container table-bordered shadow">
                <div class="col-md-12">
                    <form action="{{ route('petition.update', $petition->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- En lo siguiente se compara si la solicitud es 1 equivalente a hacer una peticion para obtener o actualizar permiso de nodo.

                            -la variale nodo puede ser 0 = no hace peticion y 1 0 si hace peticion.
                            -La variable a_nodo se refiere a answer, permitiendo dar respuesta a la peticion y no alterar otra variable evitando eliminar informacion original --}}

                        <div class="row">
                            <div class="col-sm-2">
                                <h6><strong>Folio de solicitud:</strong></h6>
                            </div>
                            <input name="fileID" id="fileID" type="hidden"
                                value="{{ $petition->fileID }}">{{ $petition->fileID }}
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6><strong>Colaborador:</strong></h6>
                            </div>
                            <input name="collaboraator_id" type="hidden" value="{{ $petition->collaborator->id }}">
                            {{ $petition->collaborator->name }}
                            {{ $petition->collaborator->last_name }}
                            {{ $petition->collaborator->last_maternal }}
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6><strong>Fecha de solicitud: </strong></h6>
                            </div>

                            <p>{{ $petition->created_at }} </p>

                        </div>
                        <div class="row">
                            <div class="col-sm-3">
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
                                        ?></strong> </h4>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="container p-2">
                            <h5><strong>Responder solicitud: </strong></h5>
                        </div>
                        <div class="container p-5">
                            <div class="container">
                                @if ($petition->nodo == 1)
                                    @if ($petition->tk_nodo_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Nodo: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_nodo_1" id="tk_nodo_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Nodo: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="nodo" id="nodo" value="1" type="hidden">
                                            <br>
                                            <br>
                                        </div>
                                    @else
                                        @if ($petition->a_nodo == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Nodo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_nodo_1" type="hidden"
                                                        value="{{ $petition->tk_nodo_1 }}">{{ $petition->tk_nodo_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Nodo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_nodo" id="a_nodo" type="text">
                                                </div>
                                            </div>
                                            <input name="nodo" id="nodo" value="1" type="hidden">
                                            <br>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Nodo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_nodo_1" type="hidden"
                                                        value="{{ $petition->tk_nodo_1 }}">{{ $petition->tk_nodo_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Nodo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_nodo" type="hidden"
                                                        value="{{ $petition->a_nodo }}">{{ $petition->a_nodo }}
                                                </div>
                                                <input name="nodo" id="nodo" value="1" type="hidden">
                                                <br>
                                                <br>
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <input name="nodo" id="nodo" value="0" type="hidden">
                                @endif
                            </div>
                            <div class="container">
                                @if ($petition->ip == 1)
                                    @if ($petition->tk_ip_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de IP: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_ip_1" id="tk_ip_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>IP: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="ip" id="ip" value="1" type="hidden">
                                        </div>
                                        <br>
                                    @else
                                        @if ($petition->a_ip == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de IP: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_ip_1" type="hidden"
                                                        value="{{ $petition->tk_ip_1 }}">{{ $petition->tk_ip_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar IP: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_ip" id="a_ip" type="text">
                                                </div>
                                                <input name="ip" id="ip" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de IP: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_ip_1" type="hidden"
                                                        value="{{ $petition->tk_ip_1 }}">{{ $petition->tk_ip_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>IP: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_ip" type="hidden"
                                                        value="{{ $petition->a_ip }}">{{ $petition->a_ip }}
                                                </div>
                                                <input name="ip" id="ip" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @endif
                                    @endif
                                @else
                                    <input name="ip" id="ip" value="0" type="hidden">
                                @endif
                            </div>
                            <div class="container">
                                @if ($petition->vpn == 1)
                                    @if ($petition->tk_vpn_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de VPN: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_vpn_1" id="tk_vpn_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>VPN: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="vpn" id="vpn" value="1" type="hidden">
                                        </div>
                                        <br>
                                    @else
                                        @if ($petition->a_vpn == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de VPN: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_vpn_1" type="hidden"
                                                        value="{{ $petition->tk_vpn_1 }}">{{ $petition->tk_vpn_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar VPN: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_vpn" id="a_vpn" type="text">
                                                </div>
                                                <input name="vpn" id="vpn" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de VPN: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_vpn_1" type="hidden"
                                                        value="{{ $petition->tk_vpn_1 }}">{{ $petition->tk_vpn_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>VPN: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_vpn" type="hidden"
                                                        value="{{ $petition->a_vpn }}">{{ $petition->a_vpn }}
                                                </div>
                                                <input name="vpn" id="vpn" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @endif
                                    @endif
                                @else
                                    <input name="vpn" id="vpn" value="0" type="hidden">
                                @endif
                            </div>
                            <div class="container">
                                @if ($petition->internet == 1)
                                    @if ($petition->tk_internet_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Internet: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_internet_1" id="tk_internet_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Internet: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="internet" id="internet" value="1" type="hidden">
                                        </div>
                                        <br>
                                    @else
                                        @if ($petition->a_internet == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Internet: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_internet_1" type="hidden"
                                                        value="{{ $petition->tk_internet_1 }}">{{ $petition->tk_internet_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Internet: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_internet" id="a_internet" value="autorizado" type="checkbox">
                                                    Autorizar
                                                </div>
                                                <input name="internet" id="internet" value="1" type="hidden">
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Internet: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_internet_1" type="hidden"
                                                        value="{{ $petition->tk_internet_1 }}">{{ $petition->tk_internet_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Internet: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_internet" type="hidden"
                                                        value="{{ $petition->a_internet }}">{{ $petition->a_internet }}
                                                </div>
                                                <input name="internet" id="internet" value="1" type="hidden">
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                        @endif
                                    @endif
                                @else
                                    <input name="internet" id="internet" value="0" type="hidden">
                                @endif
                            </div>
                            <div class="container">
                                @if ($petition->account_da == 1)
                                    @if ($petition->tk_da_account_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Directoio Activo: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_da_account_1" id="tk_da_account_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Cuenta de Activo: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="account_da" id="account_da" value="1" type="hidden">
                                        </div>
                                        <br>
                                    @else
                                        @if ($petition->a_account_da == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Directorio Activo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_da_account_1" type="hidden"
                                                        value="{{ $petition->tk_da_account_1 }}">{{ $petition->tk_da_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Directorio Activo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_da" id="a_account_da" type="text">
                                                </div>
                                                <input name="account_da" id="account_da" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Directorio Activo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_da_account_1" type="hidden"
                                                        value="{{ $petition->tk_da_account_1 }}">{{ $petition->tk_da_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Cuenta de Directorio Activo: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_da" type="hidden"
                                                        value="{{ $petition->a_account_da }}">{{ $petition->a_account_da }}
                                                </div>
                                                <input name="account_da" id="account_da" value="1" type="hidden">
                                            </div>
                                            <br>
                                        @endif
                                    @endif
                                @else
                                    <input name="account_da" id="account_da" value="0" type="hidden">
                                @endif
                            </div>
                            <br>
                            <div class="container">
                                @if ($petition->account_glpi == 1)
                                    @if ($petition->tk_glpi_account_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Cuenta GLPI: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_glpi_account_1" id="tk_glpi_account_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Cuenta GLPI: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="account_glpi" id="account_glpi" value="1" type="hidden">
                                        </div>
                                    @else
                                        @if ($petition->a_account_glpi == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta GLPI: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_glpi_account_1" type="hidden"
                                                        value="{{ $petition->tk_glpi_account_1 }}">{{ $petition->tk_glpi_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Cuenta GLPI: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_glpi" id="a_account_glpi" type="text">
                                                </div>
                                            </div>
                                            <input name="account_glpi" id="account_glpi" value="1" type="hidden">
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta GLPI: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_glpi_account_1" type="hidden"
                                                        value="{{ $petition->tk_glpi_account_1 }}">{{ $petition->tk_glpi_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Cuenta GLPI: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_glpi" type="hidden"
                                                        value="{{ $petition->a_account_glpi }}">{{ $petition->a_account_glpi }}
                                                </div>
                                                <input name="account_glpi" id="account_glpi" value="1" type="hidden">
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <input name="account_glpi" id="account_glpi" value="0" type="hidden">
                                @endif
                            </div>
                            <br>
                            <div class="container">
                                @if ($petition->account_gitlab == 1)
                                    @if ($petition->tk_gitlab_account_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Cuenta Gitlab: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_gitlab_account_1" id="tk_gitlab_account_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Cuenta Gitlab: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="account_gitlab" id="account_gitlab" value="1" type="hidden">
                                        </div>
                                    @else
                                        @if ($petition->a_account_gitlab == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta Gitlab: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_gitlab_account_1" type="hidden"
                                                        value="{{ $petition->tk_gitlab_account_1 }}">{{ $petition->tk_gitlab_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Cuenta de Gitlab: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_gitlab" id="a_account_gitlab" type="text">
                                                </div>
                                            </div>
                                            <input name="account_gitlab" id="account_gitlab" value="1" type="hidden">
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta Gitlab: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_gitlab_account_1" type="hidden"
                                                        value="{{ $petition->tk_gitlab_account_1 }}">{{ $petition->tk_gitlab_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Cuenta Gitlab: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_gitlab" type="hidden"
                                                        value="{{ $petition->a_account_gitlab }}">{{ $petition->a_account_gitlab }}
                                                </div>
                                                <input name="account_gitlab" id="account_gitlab" value="1" type="hidden">
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <input name="account_gitlab" id="account_gitlab" value="0" type="hidden">
                                @endif
                            </div>
                            <br>
                            <div class="container">
                                @if ($petition->account_jira == 1)
                                    @if ($petition->tk_jira_account_1 == '')
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <strong>Agregar Ticket de Cuenta Jira: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="tk_jira_account_1" id="tk_jira_account_1" type="text">
                                            </div>
                                            <div class="col-sm-3">
                                                <strong>Cuenta Jira: </strong>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            </div>
                                            <input name="account_jira" id="account_jira" value="1" type="hidden">
                                        </div>
                                    @else
                                        @if ($petition->a_account_jira == '')
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta Jira: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_jira_account_1" type="hidden"
                                                        value="{{ $petition->tk_jira_account_1 }}">{{ $petition->tk_jira_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Agregar Cuenta Jira: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_jira" id="a_account_jira" type="text">
                                                </div>
                                            </div>
                                            <input name="account_jira" id="account_jira" value="1" type="hidden">
                                        @else
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <strong>Ticket de Cuenta Jira: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="tk_jira_account_1" type="hidden"
                                                        value="{{ $petition->tk_jira_account_1 }}">{{ $petition->tk_jira_account_1 }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <strong>Cuenta Jira: </strong>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="a_account_jira" type="hidden"
                                                        value="{{ $petition->a_account_jira }}">{{ $petition->a_account_jira }}
                                                </div>
                                                <input name="account_jira" id="account_jira" value="1" type="hidden">
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <input name="account_jira" id="account_jira" value="0" type="hidden">
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-2"><a href="/petition" class="btn btn-secondary">Regresar</a></button></div>
                            @if ($petition->status == 2)
                                <div class="col-sm-2">
                                    <a href="/petition/{{ $petition->id }}/{{ $collaborator->id }}/sendEmail" class="btn btn-secondary">
                                        Enviar Correo
                                    </a>
                                </div>
                            @endif
                            <div class="col-sm-2"><input class="btn btn-secondary" type="submit" value="Guardar"></div>
                            {{-- <div class="col-sm-3">
                                <?php
                                switch ($petition->status) {
                                    case 0:
                                        echo '<div class="fas fa-circle validada"><strong> Validada </strong></div>';
                                        break;
                                    case 1:
                                        if ($petition->nodo == 1 && isset($petition->a_nodo) && $petition->ip == 1 && isset($petition->a_ip) && $petition->vpn == 1 && isset($petition->vpn)) {
                                            # code...
                                        }
                                        break;
                                }
                                ?>
                            </div> --}}
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    @endif


    <br>
    <footer class="footer py-3 bg-green-900">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Desarrollado en CDMX,<strong> UTIC </strong>
                </div>
            </div>
        </div>
    </footer>
@stop
