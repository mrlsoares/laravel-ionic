@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-sm-5">
        <h2>Novo Produto</h2>
        @include('errors._check')

        {!! Form::open(['route' => 'admin.products.store', 'class' => 'form']) !!}

    @include('admin.products._form')
        <div class="form-group">
            {!! Form::submit('Gravar!',['class'=>'btn btn-primary']) !!}
        </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection