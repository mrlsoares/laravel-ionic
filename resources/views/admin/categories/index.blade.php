@extends('layouts.app')

@section('content')
    <h2>Categorias</h2>
<div class="container">

<br>
    <a href="{{route('admin.categories.create')}}" class="btn btn-default">Nova Categoria</a>
    <br> <br>
    <table class="table table-bordered table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Descricao</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td width="74%">{{$category->name}}</td>
                <td>
                    <a href="{{route('admin.categories.edit',['id'=>$category->id]) }}" class="btn btn-success btn-sm">Editar</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="{{route('admin.categories.delete',['id'=>$category->id])}}" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {!! $categories->render() !!}
</div>
@endsection