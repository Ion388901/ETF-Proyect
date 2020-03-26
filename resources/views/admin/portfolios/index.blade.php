@extends ('admin.layouts.main')

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
                        <a class="btn btn-info btn-sm" href="{{ route('admin.portfolios.create') }}">
                            Crear nuevo portafolio
                        </a>
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
                                    <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST">
                                    <a href="{{ route('admin.portfolios.show', $portfolio->id) }}" class="btn btn-info">Mostrar portafolio</a>
                                    <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-primary">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No existe ningun portafolio: <a href="{{ route('admin.portfolios.create') }}">Crea uno aquí</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection