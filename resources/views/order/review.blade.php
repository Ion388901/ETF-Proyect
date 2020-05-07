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
<!-- /.content -->
@endsection


<!-- Revisar con el profe que hacer aquí para ya no usar paypal, si hacer esto por scripts como el carrito -->
<!--
@push('layout_end_body')
<script src="https://www.paypal.com/sdk/js?client-id=AV-BtqbTCRMwWUfLzQh4Muv7Y7dlU33Mawt2FwcdcRbeo-zlVPSYzD4Otin5mLUtWwkARLo76VndDfRO&currency=MXN">
</script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            // Set up the transaction
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{ $order->total }}'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // Capture the funds from the transaction
            return actions.order.capture().then(function(details) {
                // Call your server to save the transaction
                return fetch('{{ route('
                        orders.transaction ', ['
                        order ' => $order])}}', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json'
                            },
                            body: JSON.stringify({
                                orderID: data.orderID
                            })
                        })
                    .then(function(response) {
                        if (response.ok) {
                            window.location = '{{ route('
                            orders.transaction.success ', ['
                            order ' => $order]) }}';
                        } else {
                            console.log(response);
                        }
                    });
            });
        }
    }).render('#paypal-button-container');
</script>
@endpush
-->