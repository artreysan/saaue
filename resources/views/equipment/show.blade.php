@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-8 p-4">
                <h5><strong>Detalles del equipo:</strong></h5>
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
            <div class="col-md-8"></div>
            <div class="col-md-1"><a href="/collaborator" class="btn btn-secondary">Regresar</a></button></div>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header card-header-primary bg-secondary">
                    <div class="card-title"> {{ $equipment->tipo }} {{ $equipment->modelo }} </div>
                </div>
                <div class="card-body table-bordered">
                    <div class="row">
                        <div class="col-md-11">
                            <div>
                                @if ($equipment->collaborator_id == '')
                                    <h6>{{ 'No está asignado aún' }}<h6>
                                    <div>
                                        <h6><strong>Numero de serie:</strong> {{ $equipment->serie }} </h6>
                                    </div>
                                    <div>
                                        <h6><strong>Mac Ethernet:</strong> {{ $equipment->mac_ethernet }} </h6>
                                    </div>
                                    <div>
                                        <h6><strong>Mac Wifi:</strong> {{ $equipment->mac_wifi }} </h6>
                                    </div>
                                    <div>
                                        <h6><strong>Equipo de la institución:</strong> {{ $equipment->enterprise->name }} </h6>
                                    </div>
                                @else
                                    <div>
                                        <h6><strong>Pertenece a:</strong> {{ $equipment->collaborator->name }} {{ $equipment->collaborator->last_name }} {{ $equipment->collaborator->last_maternal }}</h6>
                                    </div>
                                    <div>
                                        <h6><strong>Numero de serie:</strong> {{ $equipment->serie }} </h6>
                                    </div>
                                    <div>
                                        <h6><strong>Mac Ethernet:</strong> {{ $equipment->mac_ethernet }} </h6>
                                    </div>
                                    <div>
                                        <h6><strong>Mac Wifi:</strong> {{ $equipment->mac_wifi }} </h6>
                                    </div>
                                    <div>
                                        <h6><strong>Equipo de:</strong> {{ $equipment->enterprise->name }} </h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
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
