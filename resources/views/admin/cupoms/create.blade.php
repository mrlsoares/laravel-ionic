@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-sm-5">
        <h2>Novo Cupom</h2>
        @include('errors._check')

        {!! Form::open(['route' => 'admin.cupoms.store', 'class' => 'form']) !!}

    @include('admin.cupoms._form')
        <div class="form-group">
            {!! Form::submit('Gravar!',['class'=>'btn btn-primary']) !!}
        </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection