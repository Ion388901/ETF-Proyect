@extends ('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Agrega el portafolio a un contrato
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Nombre del contrato</label>
                        <input type="text" class="form-control" value="{{ $data['contract']->name }}" disabled>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Contenido del contrato</label>
                        <input type="text" class="form-control" value="{{ $data['contract']->description }}" disabled>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.contracts.portfolio.store', ['contract' => $data['contract']]) }}">
                @csrf
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Portafolio a agregar</label>
                            <select name="contract_portfolio[portfolio_id]" class="form-control">
                                <option value="">Selecciona el portafolio</option>
                                @foreach ($data['portfolios'] as $portfolio)
                                    <option value="{{ $portfolio->id }}">{{ $portfolio->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Agregar portafolio</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection