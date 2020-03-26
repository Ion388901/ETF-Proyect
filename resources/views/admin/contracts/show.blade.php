@extends ('admin.layouts.main')

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
                    <h3 class="box-title">Nombre del contrato: {{ $data['contract']->name }}</h3>
                    <div class="pull-right box-tools">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.contracts.portfolio.create', ['contract' => $data['contract']]) }}">
                            Agregar nuevo portafolio
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    @if (!$data['contract']->portfolios->isEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Portafolio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['contract']->portfolios as $portfolio)
                            <tr>
                                <td>{{ $portfolio->id }}</td>
                                <td>{{ $portfolio->name }}</td>
                                <td>{{ $portfolio->description }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Este contrato no esta vinculado a un portafolio <a href="{{ route('admin.contracts.portfolio.create', ['contract' => $data['contract']]) }}">Vincula uno aquí</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection