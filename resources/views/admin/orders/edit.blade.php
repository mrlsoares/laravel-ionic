@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-5">
        <h2>Editar Pedido:  #{{$order->id}} - R$ {{$order->total}}</h2>
        <h3>CLiente: {{$order->client->user->name}} </h3>
        <h4>Criado: {{$order->created_at}} </h4>
            <p>
               <b>Entregar em:</b>
               <br>
                &nbsp;&nbsp;&nbsp;{{$order->client->endereco}} - {{$order->client->cidade}} - {{$order->client->uf}}
            </p>
            <br/>

        @include('errors._check')
        {!! Form::model($order,['route' =>['admin.orders.update',$order->id],'method'=>'put']) !!}

            @include('admin.orders._form')

        <div class="form-group">
            {!! Form::submit('Gravar!',['class'=>'btn btn-primary']) !!}
        </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection