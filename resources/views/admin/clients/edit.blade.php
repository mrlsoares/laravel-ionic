@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-sm-5">
        <h2>Editar Cliente{{$client->user->name}}</h2>
            @include('errors._check')
        {!! Form::model($client,['route' =>['admin.clients.update',$client->id],'method'=>'put']) !!}

            @include('admin.clients._form')

        <div class="form-group">
            {!! Form::submit('Gravar!',['class'=>'btn btn-primary']) !!}
        </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection