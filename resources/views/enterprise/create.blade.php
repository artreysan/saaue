@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')

<div class="container-nav">
    <div class="row">
        <div class="col-md-1 p-4"></div>
        <div class="col-md-9 p-4">
            <h4><strong>Registrar empresa</strong></h4>
            <h6>Ciudad de México a <?php echo date('j-m-Y'); ?> </h6>
        </div>
        <div class="col-md-2 p-3">
            <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
        </div>
    </div>
</div>
        <br>

        <div class="container">

                <!--Inicio del bloque de registro de la empresa-->
                <div class="container">
                    <h4>Información de la empresa a registrar:</h4>
                </div>

                <br>
                <form action="{{route('enterprise.store')}}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"><strong>Nombre:</strong></div>
                            <div class="col-md-3">
                                <input class="border-success" id="nombre" name="nombre" type="text"
                                    placeholder=" Nombre "
                                    value="{{ old('nombre') }}" required />
                            </div>
                            <div class="col-md-3"><strong>Contrato:</strong></div>
                            <div class="col-md-3">
                                <input class="border-success" id="contrato" name="contrato" type="text"
                                    placeholder=" Contrato " value="{{ old('contrato') }}" required />
                            </div>
                        </div>
                        <br>
                    </div>
                     <!--Fin del bloeque de información de la empresa a registrar-->

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="btn btn-primary btn-lg active" type="submit" value="Registrar">
                            </div>
                        </div>
                    </div>
                </form>
         </div>
        <br>
        <br>
    @stop
