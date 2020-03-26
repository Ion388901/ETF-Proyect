@extends ('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Crear un nuevo portafolio
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-right">
                <a href="{{ route('admin.contracts.index') }}" class="btn btn-primary">Regresar</a>
            </div>
            <form method="POST" action="{{ route('admin.portfolios.store') }}">
                @csrf
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input name="portfolio[name]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <input name="portfolio[description]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input name="portfolio[price]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Crear portafolio</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection