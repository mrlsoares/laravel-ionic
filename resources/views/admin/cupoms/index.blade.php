@extends('layouts.app')

@section('content')
    <h2>Cupons</h2>
<div class="container">

<br>
    <a href="{{route('admin.cupoms.create')}}" class="btn btn-default">Novo Cupom</a>
    <br> <br>
    <table class="table table-bordered table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Valor</th>

            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cupoms as $cupom)
            <tr>
                <td>{{$cupom->id}}</td>
                <td >{{$cupom->code}}</td>
                <td >{{$cupom->value}}</td>
                <td>
                    <a href="{{route('admin.cupoms.edit',['id'=>$cupom->id]) }}" class="btn btn-success btn-sm">Editar</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="{{route('admin.cupoms.delete',['id'=>$cupom->id])}}" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {!! $cupoms->render() !!}
</div>
@endsection