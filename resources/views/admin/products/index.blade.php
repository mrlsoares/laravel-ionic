@extends('layouts.app')

@section('content')
    <h2>Categorias</h2>
<div class="container">

<br>
    <a href="{{route('admin.products.create')}}" class="btn btn-default">Novo Produto</a>
    <br> <br>
    <table class="table table-bordered table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td >{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{route('admin.products.edit',['id'=>$product->id]) }}" class="btn btn-success btn-sm">Editar</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="{{route('admin.products.delete',['id'=>$product->id])}}" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {!! $products->render() !!}
</div>
@endsection