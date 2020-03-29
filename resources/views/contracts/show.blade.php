@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contrato
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Nombre del contrato: Contrato de Metales</h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('contracts.index') }}" class="btn btn-primary">Regresar</a>
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
                                <td>1</td>
                                <td>Contrato de metales</td>
                                <td>Por medio de la presente me responsabilizo de todo esto y lo usare bien, acepto este contrato y lo firmo</td>
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
