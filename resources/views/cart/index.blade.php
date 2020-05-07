@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Carrito de compras
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Contenido del carrito</h3>
                    <div class="pull-right box-tools">
                    <div class="pull-right">
                        <a href="{{ route('homepage') }}" class="btn btn-primary">Regresar</a>
                    </div>    
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data['cart'] as $cart)
                        <tr>
                            <td>{{ $cart->id }}</td>
                            <td>{{ $cart->name }}</td>
                            <td>{{ $cart->price }}</td>
                            <td>
                                <a href="{{ route('order.create', $cart->id) }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Hacer checkout</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection