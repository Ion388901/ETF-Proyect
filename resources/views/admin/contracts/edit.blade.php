@extends('admin.layouts.main')

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Contrato
    </div>
    <div class="pull-right">
        <a href="{{ route('admin.contracts.index') }}" class="btn btn-primary">Regresar</a>
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
            <form method="POST" action="{{ route('admin.contracts.update', $data['contract']->id)}}">
                @method('PUT')
                @csrf
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input name="contract[name]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Contenido</label>
                            <input name="contract[description]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Portafolio vinculado</label>
                            <select name="portfolio[portfolio_id]" class="form-control">
                            @foreach ($data['portfolios'] as $portfolio)
                                <option value="{{ $portfolio->id }}">{{ $portfolio->name }}</option>
                            @endforeach
                            </select>
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