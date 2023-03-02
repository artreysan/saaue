@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semaforo.css') }}">
@endsection

@section('content_header')
    <div class="container-nav">
        <div class="row">
            <div class="col-md-1 p-4"></div>
            <div class="col-md-9 p-4">
                <h5><strong>Todas las solicitudes pendientes:</strong></h5>
                <h5>Ciudad de México a <?php echo date('j-m-Y'); ?> </h5>
            </div>
            <div class="col-md-2 p-3">
                <img class="imagen-header" src="{{ URL::asset('img/download.png') }}" alt="">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <p> Aqui van a ir cuadros estadisticos de las solicitudes </p>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped">
            <thead class="table-secondary">
                <th>Folio</th>
                <th>Empresa</th>
                <th>Fecha</th>
                <th>Colaborador</th>
                <th>Status</th>
                <th>PDF</th>
                <th>Ver</th>
            </thead>
            @foreach ($petitions as $petition)
                <tbody>
                    <td>{{ $petition->fileID }}</td>
                    <td>{{ $petition->collaborator->enterprise->name }}</td>
                    <td>{{ $petition->created_at }}</td>
                    <td>{{ $petition->collaborator->name }} {{ $petition->collaborator->last_name }}</td>
                    <td class="circulo">
                       @switch($petition->status)
                            @case(0)
                                <div class="fas fa-circle pendiente"></div>
                                @break
                            @case(1)
                                <div class="fas fa-circle en-proceso"></div>
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
                    <td><a href="/petition/{{ $petition->id }}/{{ $petition->fileID }}" target="_blank">
                                <img width="30px" height="30px" src="{{ URL::asset('img/pdf.png') }}"
                                    alt="">
                            </a></td>
                    <td><a href="/petition/{{ $petition->id }}" alt="ver" class="col-md-1 fas fa-eye"></a></td>
                </tbody>
            @endforeach
        </table>
        <br>
        <br>
        <br>
        <br>
@stop

