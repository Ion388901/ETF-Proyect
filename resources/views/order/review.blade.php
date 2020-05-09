@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Confirmación de la orden
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Orden</h3>
                    <div class="pull-right box-tools">
                    <div class="pull-right">
                        <a href="{{ route('homepage') }}" class="btn btn-primary">Regresar al inicio</a>
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
                        @foreach ($data['order'] as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->total }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content container-fluid">
    <div class="content">
        <h1>Compra de Prueba</h1>
        <h3>90000</h3>    <form action="/transaction" method="POST">
            {{ csrf_field() }}
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_bWsXA0PJGIqiiQlBmQlwfqAa00W7h6OQRI"
                data-amount="90000"
                data-name="Compra"
                data-description="Prueba compra"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
            </script>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection