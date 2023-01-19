@extends('adminlte::page')

@section('title', 'UTIC')

@section('content_header')
<div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-8 p-4">
                <h5><strong>Perfil del usuario administrador</strong></h5>
                <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-2"><a href="/user" class="btn btn-secondary">Ver todos</a></button>
        </div>
    </div>
</div>
    <br>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header card-header-primary bg-secondary">
                            <div class="card-title">{{ $user->role->name}}</div>
                        </div>
                        <div class="card-body table-bordered">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5><strong>Nombre completo del Usuario:</strong></h5>
                                            </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5>{{$user->name}} {{$user->apellido_paterno}} {{$user->apellido_materno}}</h5>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5><strong>Empresa:</strong></h5>
                                            </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5>{{$user->enterprise->name}}</h5>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5><strong>Puesto:</strong></h5>
                                            </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5>{{$user->rol->rol}}</h5>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5><strong>Ubicacion:</strong></h5>
                                            </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5>{{$user->location->ubicacion}}</h5>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5><strong>Email:</strong></h5>
                                            </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h5>{{$user->email}}</h5>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
