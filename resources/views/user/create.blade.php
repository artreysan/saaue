@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
    <div class="bg-gray bg-opacity-10 border-gray">
        <div class="row">
            <div class="col-md-8 p-4">
                <h4><strong>REGISTRO DE USUARIOS Y ROLES DE LOS MISMOS:</strong></h4>
                <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
            </div>
            <div class="col-md-3">
                <img src="img/logoSAUEcompleto.png" alt="">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-1"><a href="/"><button type="button" class="btn btn-secondary">Inicio</button></a></div>
            <div class="col-md-2"><a href="/user"><button type="button" class="btn btn-secondary">Ver todos</button></a></div>
        </div>
    </div>
    <br>
    <br>
    <!--Información del colaborador-->
    <div class="container table-bordered p-5">
        <div class="container">
            <h4><strong>Información del usuario:</strong></h4>
        </div>
        <br>

        <div class="container">
            <form method="POST" action="{{route('user.store')}}">
            @csrf
                <div class="row">
                    <div class="col-md-2"><strong>Nombre(s):</strong></div>
                    <div class="col-md-4"><input type="text" id="name" name="name" required></div>
                    <div class="col-md-2"><strong>Apellido Paterno:</strong></div>
                    <div class="col-md-4"><input type="text" id="apellido_paterno" name="apellido_paterno" required></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><strong>Apellido Materno:</strong></div>
                    <div class="col-md-4"><input type="text" id="apellido_materno" name="apellido_materno"></div>
                    <div class="col-md-2"><strong>Email:</strong></div>
                    <div class="col-md-4"><input type="text" id="email" name="email" required></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><strong>Role:</strong></div>
                    <select class="col-md-3" name="role_id" id="role_id">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }}</option>
                        @endforeach
                    </select>
                    <div class="col-md-1"></div>
                    <div class="col-md-2"><strong>Empresa:</strong></div>
                    <select class="col-md-4" name="enterprise_id" id="enterprise_id">
                        @foreach ($enterprises as $enterprise)
                            <option value="{{ $enterprise->id }}" id="enterprise_id">{{ $enterprise->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-2"><strong>Puesto:</strong></div>
                    <select class="col-md-3" name="role_id" id="role_id">
                        @foreach ($rols as $rol)
                            <option value="{{ $rol->id }}"> {{ $rol->rol }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><strong>Ubicación:</strong></div>
                    <select class="col-md-8" name="location_id" id="location_id">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}"> {{ $location->ubicacion }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><strong>Contraseña</strong></div>
                    <div class="col-md-4"><input type="password" id="password" name="password"></div>
                    <div class="col-md-2"><strong>Confirmar Contraseña</strong></div>
                    <div class="col-md-4"><input type="password" id="password_confirmation" name="password_confirmation"></div>
                </div>
        </div>
    </div>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <input class="btn btn-secondary btn-lg active" type="submit" value="Registrar">
                </div>
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <div class="container">
        <footer>
            ©<script>document.write(new Date().getFullYear())</script> Desarrollado en CDMX,<strong> UTIC </strong>
        </footer>
    </div>

@stop
