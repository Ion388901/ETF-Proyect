@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Atención
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Firma de contrato</h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('portfolios.index') }}" class="btn btn-primary">Regresar</a>
                </div>
                <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Contenido</th>
                                    <th>Oprima para aceptar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                        Contrato de Metales
                                </td>
                                <td>
                                        Por medio de la presente me responsabilizo de todo esto y lo usare bien, acepto este contrato y lo firmo
                                </td>
                                <td>
                                <form method="POST" action="{{ route('portfolios.contractsign') }}">
                                        <a
                                             class="btn btn-warning btn-block text-center">
                                                Acepto el contrato
                                        </a>
                                </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection