@extends('admin.layouts.main')

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Portafolio
    </div>
    <div class="pull-right">
        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-primary">Regresar</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
            <form method="POST" action="{{ route('admin.portfolios.update', $portfolio->id)}}">
                @method('PUT')
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
                        <button type="submit" class="btn btn-info pull-right">Guardar cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection