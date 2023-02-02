@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
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
                    <hr>
                    <!--Bloque de nodo en la solicitud, aqui se hace la logica para saber si poner o no el nodo-->
                    <div class="row">
                        @if ($petition->nodo == '1')
                            <div class="col-md-6">
                                <div>
                                    <h6><strong>Nodo:</strong></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($petition->a_nodo == '')
                                    @if ($petition->tk_nodo_1 == '')
                                        <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            @else
                                                <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                    @endif
                                @else
                                    <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                    <br>
                    <!--Se terminal el bloque del nodo-->
                    <!--Bloque de glpi en la solicitud, aqui se hace la logica para saber si poner o no glpi-->
                    <div class="row">
                        @if ($petition->account_glpi == '1')
                            <div class="col-md-6">
                                <div>
                                    <h6><strong>Cuenta Glpi:</strong></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($petition->a_account_glpi == '')
                                    @if ($petition->tk_account_glpi_1 == '')
                                        <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            @else
                                                <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                    @endif
                                @else
                                    <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del GLPI-->
                    <!--Bloque de gitlab en la solicitud, aqui se hace la logica para saber si poner o no gitlab-->
                    <div class="row">
                        @if ($petition->account_gitlab == '1')
                            <div class="col-md-6">
                                <div>
                                    <h6><strong>Cuenta Gitlab:</strong></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($petition->a_account_gitlab == '')
                                    @if ($petition->tk_account_gitlab_1 == '')
                                        <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            @else
                                                <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                    @endif
                                @else
                                    <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del Gitlab-->
                    <!--Bloque de jira en la solicitud, aqui se hace la logica para saber si poner o no jira-->
                    <div class="row">
                        @if ($petition->account_jira == '1')
                            <div class="col-md-6">
                                <div>
                                    <h6><strong>Cuenta Jira:</strong></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($petition->a_account_account_jira == null)
                                    @if ($petition->tk_account_jira_1 == null)
                                        <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            @else
                                                <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                    @endif
                                @else
                                    <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                    <!--Bloque de directorio activo en la solicitud, aqui se hace la logica para saber si poner o no directorio activo-->
                    <div class="row">
                        @if ($petition->account_da == '1')
                            <div class="col-md-6">
                                <div>
                                    <h6><strong>Directorio Activo:</strong></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($petition->a_account_da == null)
                                    @if ($petition->tk_da_account_1 == null)
                                        <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            @else
                                                <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                    @endif
                                @else
                                    <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                    <hr>
                    <!--Se terminal el bloque del directorio activo-->
                    <!--Bloque de directorio activo en la solicitud, aqui se hace la logica para saber si poner o no directorio activo-->
                    <div class="row">
                        @if ($petition->internet == '1')
                            <div class="col-md-6">
                                <div>
                                    <h6><strong>Internet:</strong></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($petition->a_internet == '')
                                    @if ($petition->tk_internet_1 == '')
                                        <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            @else
                                                <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                    @endif
                                @else
                                    <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque del internet-->
                    <!--Bloque de VPN en la solicitud, aqui se hace la logica para saber si poner o no  VPN-->
                    <div class="row">
                        @if ($petition->vpn == '1')
                            <div class="col-md-6">
                                <div>
                                    <h6><strong>VPN:</strong></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($petition->a_vpn == '')
                                    @if ($petition->tk_vpn_1 == '')
                                        <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            @else
                                                <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                    @endif
                                @else
                                    <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque de la vpn-->
                    <!--Bloque de VPN en la solicitud, aqui se hace la logica para saber si poner o no  VPN-->
                    <div class="row">
                        @if ($petition->ip == '1')
                            <div class="col-md-6">
                                <div>
                                    <h6><strong>IP:</strong></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($petition->a_ip == '')
                                    @if ($petition->tk_ip_1 == '')
                                        <h6 style="color:crimson">{{ 'Pendiente' }}<h6>
                                            @else
                                                <h6 style="color:darkorange">{{ 'En proceso' }}<h6>
                                    @endif
                                @else
                                    <h6 style="color:#1795b8">{{ 'Atendida' }}<h6>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                    <!--Se terminal el bloque de la ip-->
                </div>
            </div>
        </div>
        <div class="col-md-1 p-1">
        </div>
        <div class="col-md-5 p-5 table-bordered shadow">
            <br>
            <h4>Status del trámite</h4>
            <p>Aqui va una grafica en semaforo del status del proceso </p>
            <br>
            <div class="container">
                <form action="tu_script_de_procesamiento.php" method="post" enctype="multipart/form-data">
                    <div class="row p-2">
                        <div class="col-sm-5">
                            <img width="70px" height="70px" src="{{ URL::asset('img/pdf.png') }}" alt="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-5">
                            <img width="70px" height="70px" src="{{ URL::asset('img/scanner.png') }}" alt="">
                        </div>
                    </div>
                    <br>
                    <div class="row p-2">
                        <div class="col-sm-5">
                            <input type="file" name="archivo_subido">
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-5">
                            <input type="submit" value="Subir PDF">
                        </div>
                    </div>
                    <br>
                </form>
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
    {{-- Titulo de agregar al colaborador --}}
    <div class="container card-header bg-secondary">
        <div class="col-md-12 p-1">
            <h6>Actualizar información al colaborador {{ $petition->collaborator->name }}
                {{ $petition->collaborator->last_name }} {{ $petition->collaborator->last_maternal }} apartir de la
                solicitud</h6>
        </div>
    </div>
    {{-- Agregar informacion al colaborador con update --}}
    <div class="row card-body container table-bordered shadow">
        <div class="col-md-5 p-5">
            <form action="{{ route('collaborator.update', $petition->collaborator->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table>

                </table>

                {{-- En lo siguiente se compara si la solicitud es 1 equivalente a hacer una peticion para obtener o actualizar permiso de nodo.

                    -la variale nodo puede ser 0 = no hace peticion y 1 0 si hace peticion.
                    -La variable a_nodo se refiere a answer, permitiendo dar respuesta a la peticion y no alterar otra variable evitando eliminar informacion original--}}
                @if ($petition->nodo == 0)
                    <div class="row">
                        <div class="col-md-6"><input id="nodo" name="nodo" type="text" hidden>{{ $petition->collaborator->nodo }}</div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-3"><strong>Nodo:</strong></div>
                        <div class="col-md-3"><input id="nodo" name="nodo" type="text"></div>
                    </div>
                @endif
                <br>
        </div>
    </div>
    <br>
    <br>
    <div class="row card-body shadow container table-bordered">
        <div class="col-md-5"
        <div class="col-md-1 p-3"></div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-sm-5 pt-20 "><strong>Folio de solicitud:</strong></div>
                <input name="petition_id" id="petition_id" type="hidden"
                    value="{{ $petition->fileID }}">{{ $petition->fileID }}
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
