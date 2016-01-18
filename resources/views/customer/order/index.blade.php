@extends('layouts.app')

@section('content')
    <h2>Meus Pedidos</h2>
<div class="container">

<br>
    <a href="{{route('customer.order.create')}}" class="btn btn-default">Novo Pedido</a>
    <br> <br>
    <table class="table table-bordered table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>ID</th>

            <th>Total</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $o)
            <tr>
                <td>{{$o->id}}</td>
                <td >{{$o->total}}</td>
                <td >{{$o->status}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {!! $orders->render() !!}
</div>
@endsection