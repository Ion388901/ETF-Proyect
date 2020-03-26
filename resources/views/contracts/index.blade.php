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
                <div class="box-body">
                    @if (!$data['contracts']->isEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Contenido</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['contracts'] as $contract)
                            <tr>
                                <td>{{ $contract->id }}</td>
                                <td>{{ $contract->name }}</td>
                                <td>{{ $contract->description }}</td>
                                <td>
                                    <a
                                        href="{{ route('contracts.show', ['contract' => $contract]) }}"
                                        class="btn btn-sm btn-default">
                                        <i class="fa fa-eye"></i>
                                        Ver contrato
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No existen contratos</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection