@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="bg-gray bg-opacity-10 border-gray">
        <div class="row">
            <div class="col-md-8 p-4">
                <h4><strong>SOLICITUD DE ALTA SERVICIOS:</strong></h4>
                <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
            </div>
            <div class="col-md-2">
                <img src="img/logoSAUEcompleto.png" alt="">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a href="/collaborators"><button type="button" class="btn btn-secondary">Ver colaboradores</button></a>
            </div>
        </div>
        <br>
        <table class="table">
            <thead class="table-secondary">
                <th class="col-md-1">Folio</th>
                <th class="col-md-1">Fecha</th>
                <th class="col-md-2">Colaborador</th>
                <th class="col-md-2">Empresa</th>
                <th class="col-md-1">Status</th>
                <th class="col-md-1">Pdf</th>
                <th class="col-md-1">Doc</th>
            </thead>
            @foreach ($petitions as $petition)
                <tbody>
                    <td class="col-md-1">{{ $petition->fileID }}</td>
                    <td class="col-md-1">{{ $petition->created_at }}</td>
                    <td class="col-md-">{{ $petition->collaborator->name }}
                        {{ $petition->collaborator->apellido_paterno }} {{ $petition->collaborator->last_name }}</td>
                    <td class="col-md-3">{{ $petition->collaborator->enterprise->name}}</td>
                    <td>
                        @switch($petition->status)
                            @case(0)
                                <div class="fas fa-circle pendiente"></div>
                                @break
                            @case(1)
                                <div class="fas fa-circle en-prceso "></div>
                                @break
                            @case(2)
                                <div class="fas fa-circle atendida"></div>
                                @break
                            @case(3)
                                <div class="fas fa-circle validada"></div>
                                @break
                            @default
                        @endswitch
                    </td>
                    <td><a href="" alt="Perfil" class="col-md-1 far fa-file-pdf" ></a></td>
                    <td><a href="" alt="Perfil" class="col-md-1 fas fa-folder" ></a></td>
                </tbody>
            @endforeach
        </table>
    </div>
@stop

