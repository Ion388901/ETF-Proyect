@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Portafolios
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Índice de portafolios</h3>
                    <div class="pull-right box-tools">
                    <div class="pull-right">
                        <a href="{{ route('homepage') }}" class="btn btn-primary">Regresar</a>
                    </div>    
                    </div>
                </div>
                <div class="box-body">
                    @if (!$data['portfolios']->isEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['portfolios'] as $portfolio)
                            <tr>
                                <td>{{ $portfolio->id }}</td>
                                <td>{{ $portfolio->name }}</td>
                                <td>{{ $portfolio->description }}</td>
                                <td>{{ $portfolio->price }}</td>
                                <td>
                                    <a href="{{ route('portfolios.show', $portfolio->id) }}" class="btn btn-info">Mostrar portafolio</a>
                                    <!-- Preguntar al profesor que hacer aquí para que el botón del checkout solo se active cuando contract.status = TRUE -->
                                    <p class="btn-holder">
                                    @if ($portfolio->contract)
                                        <a href="{{ route('portfolios.contractsign', ['id' => $portfolio->contract->id]) }}" class="btn btn-warning btn-block text-center" role="button">Firmar el contrato correspondiente</a>
                                    @endif
                                    </p>
                                    <a href="{{ route('cart.create', $portfolio->id) }}" class="btn btn-info">Añadir al carrito</a>
                                </td>
                            </tr>
                            <!-- Probablemente añadir una ruta que vaya a firmar el contrato -->
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No existe ningun portafolio</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection