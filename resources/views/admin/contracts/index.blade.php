@extends ('admin.layouts.main')

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
                    <div class="pull-right box-tools">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.contracts.create') }}">
                            Crear un nuevo contrato
                        </a>
                    </div>
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
                                    <form action="{{ route('admin.contracts.destroy', $contract->id) }}" method="POST">
                                    <a
                                        href="{{ route('admin.contracts.show', ['id' => $contract->id]) }}"
                                        class="btn btn-sm btn-default">
                                        <i class="fa fa-eye"></i>
                                        Ver contrato
                                    </a>
                                    <a href="{{ route('admin.contracts.edit', $contract->id) }}" class="btn btn-primary">Editar contrato</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar contrato</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No existen contratos: <a href="{{ route('admin.contracts.create') }}">Crea uno aquí</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection