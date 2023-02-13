@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
<div class="container-nav">
    <div class="row">
        <div class="col-md-1 p-3"></div>
        <div class="col-md-9 p-3">
            <h5><strong>Registrar un nuevo colaborador</strong></h5>
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
            <div class="col-md-9"></div>
            <div class="col-md-1"><a href="/dashboard"><button type="button" class="btn btn-secondary">Inicio</button></a>
            </div>
            <div class="col-md-2"><a href="/collaborator"><button type="button" class="btn btn-secondary">Ver
                        todos</button></a></div>
        </div>
    </div>
    <br>
    <!--Información del colaborador-->
    <div class="container card-header bg-secondary">
            <div class="col-md-4 p-1">
                <h4><strong>Información del nuevo colaborador:</strong></h4>
            </div>
        </div>
    <div class="container shadow table-bordered p-4">
        <form action="{{ route('collaborator.store') }}" method="POST">
            @csrf
            {{-- Inicio del contenedor de los datos del colaborador collaborador_id --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-2"><strong>Nombre(s):</strong></div>
                    <div class="col-md-3"><input type="text" id="name" name="name" required></div>
                    <div class="col-md-2"><strong>Apellido Paterno:</strong></div>
                    <div class="col-md-3"><input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><strong>Apellido Materno:</strong></div>
                    <div class="col-md-3"><input type="text" id="last_maternal" name="last_maternal"></div>
                    <div class="col-md-1"><strong>Rol:</strong></div>
                    <div class="col-md-3">
                        <select name="rol_id" id="rol_id">
                            @foreach ($rols as $rol)
                                <option value="{{ $rol->id }}" id="rol_id">{{ $rol->rol }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><strong>Email:</strong></div>
                    <div class="col-md-3"><input type="text" id="email" name="email" required></div>

                        @if (auth()->user()->role_id == 1)
                        <div class="col-md-1"><strong>Empresa:</strong></div>
                        <div class="col-md-2">
                            <select name="enterprise_id" id="enterprise_id">
                                @foreach ($enterprises as $enterprise)
                                    <option value="{{ $enterprise->id }}" id="enterprise_id">{{ $enterprise->name }}</option>
                                @endforeach
                            </select>
                            </div>

                        @else
                            <div class="col-md-2">
                                <input type="hidden" name="enterprise_id" id="enterprise_id" value="{{auth()->user()->enterprise_id}}">
                            </div>
                        @endif


                </div>
                    <br>
                <div class="row">
                    <div class="col-md-2"><strong>Ubicación en la SICT:</strong></div>
                    <select name="location_id" id="location_id">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->ubicacion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <input type="hidden" name="id_user" id="id_user" value="{{auth()->user()->id}}">
                </div>
                <br>
                {{-- <div class="row">
                    <div class="col-md-2"><strong>Asignar equipo de computo:</strong></div>
                    <select name="equipment_id" id="equipment_id">
                        @foreach ($equipments as $equipment)
                            <option value="{{ $equipment->id }}">{{ $equipment->tipo }} {{ $equipment->marca }} - {{ $equipment->serie }} - {{ $equipment->modelo }} </option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-1">
                <input class="btn btn-secondary" type="submit" value="Registrar">
            </div>
        </div>
    </div>
    </form>
    </div>
    <br>
    <div class="container">
        <footer>
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            Desarrollado en CDMX,<strong> UTIC </strong>
        </footer>
    </div>
@stop
