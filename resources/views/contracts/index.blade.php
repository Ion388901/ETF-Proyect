@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contratos
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Índice de contratos</h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('homepage') }}" class="btn btn-primary">Regresar</a>
                </div>
                <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Contenido</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                        1
                                </td>
                                <td>
                                        Contrato de Metales
                                </td>
                                <td>
                                        Por medio de la presente blablabla acepto este contrato
                                </td>
                                <td>
                                    <a
                                        href="{{ route('contracts.show') }}"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-eye"></i>
                                        Ver contrato
                                    </a>
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
<!-- @if (!$data['contracts']->isEmpty()) -->
<!-- @foreach ($data['contracts'] as $contract) -->
<!-- @endforeach -->
                    <!-- @else -->
                        <!-- <p>No existen contratos</p> -->
                    <!--@endif -->