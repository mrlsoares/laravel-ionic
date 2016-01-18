@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-sm-5">
        <h2>Editar Cupom</h2>
            @include('errors._check')
        {!! Form::model($cupom,['route' =>['admin.cupoms.update',$cupom->id],'method'=>'put']) !!}

            @include('admin.cupoms._form')

        <div class="form-group">
            {!! Form::submit('Gravar!',['class'=>'btn btn-primary']) !!}
        </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection