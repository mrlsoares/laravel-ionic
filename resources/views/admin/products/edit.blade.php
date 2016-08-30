@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-sm-5">
        <h2>Editar Produto</h2>
        @include('errors._check')
        {!! Form::model($product,['route' =>['admin.products.update',$product->id],'method'=>'put']) !!}

            @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Gravar!',['class'=>'btn btn-primary']) !!}
        </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection