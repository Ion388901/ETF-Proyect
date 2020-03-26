@extends('layouts.main')

@section('content')

<h1 class="title">Checkout del carrito</h1>
<table class="table">
    <tr>
        <th>Orden</th>
        <td>{{ $order->id }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{ $order->total }}</td>
    </tr>
    <!--<tr>
        <td colspan="2">
            Acción de comprar
            <div id="paypal-button-container"></div>
        </td>
    </tr> -->
</table>
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