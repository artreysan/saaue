@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')

    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-9 p-4">
                <h4><strong>Registro de equipo</strong></h4>
                <h6>Ciudad de México a <?php echo date('j-m-Y'); ?> </h6>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <form action="{{ route('equipment.store') }}" method="POST">
            @csrf

            <!--Inicio del bloque del equipo-->
            <div class="container">
                <h4>Información del equipo a asignar y/o registrar:</h4>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><strong>Tipo del equipo:</strong></div>
                    <div class="col-md-2">
                        <select name="tipo" id="tipo" required>
                            <option value="Laptop" id="Laptop">Laptop</option>
                            <option value="AllOne" id="AllOne">AllOne</option>
                            <option value="PC" id="PC">PC</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"><strong>Marca:</strong></div>
                        <div class="col-md-3">
                            <input class="border-success" id="marca" name="marca" type="text" placeholder=" Marca "
                                value="{{ old('marca') }}" required />
                        </div>
                        <div class="col-md-3"><strong>Modelo:</strong></div>
                        <div class="col-md-3">
                            <input class="border-success" id="modelo" name="modelo" type="text"
                                placeholder=" Modelo " value="{{ old('modelo') }}" required />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3"><strong>Serie:</strong></div>
                        <div class="col-md-3">
                            <input class="border-success" id="serie" name="serie" type="text" placeholder=" Serie "
                                value="{{ old('modelo') }}" required />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3"><strong>MAC_ETHERNET:</strong></div>
                        <div class="col-md-3">
                            <input class="border-success" id="mac_ethernet" name="mac_ethernet" type="text"
                                placeholder=" mac_ethernet " value="{{ old('mac_ethernet') }}" required />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3"><strong>MAC_WIFI:</strong></div>
                        <div class="col-md-3">
                            <input class="border-success" id="mac_wifi" name="mac_wifi" type="text"
                                placeholder=" mac_wifi " value="{{ old('mac_wifi') }}" required />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2"><strong>Propiedad UTIC: </strong></div>
                        <div class="col-sm-1"><input type="radio" name="equipo_sict" value="equipo_sict"> Sí</div>
                        <div class="col-sm-1"><input type="radio" name="equipo_sict" value="equipo_sict" checked> No</div>
                        <br>
                        <br>
                        <div class="col-md-3"><strong>Nombre del propietario: </strong></div>
                        <div class="col-md-3"><input id="propietario" type="text" name="propietario" required></div>
                    </div>
                    <br>
                    <br>
                </div>
                <!--Fin del bloeque de información del usuario a registrar-->

                <div class="container">
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <input class="btn btn-secondary btn-lg active" type="submit" value="Registrar">
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <br>
    <br>
@stop
