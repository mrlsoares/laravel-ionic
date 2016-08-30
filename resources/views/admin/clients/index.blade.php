@extends('layouts.app')

@section('content')
    <h2>Cliente</h2>
<div class="container">

<br>
    <a href="{{route('admin.clients.create')}}" class="btn btn-default">Novo Cliente</a>
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
        @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td width="74%">{{$client->user->name}}</td>
                <td>
                    <a href="{{route('admin.clients.edit',['id'=>$client->id]) }}" class="btn btn-success btn-sm">Editar</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="{{route('admin.clients.delete',['id'=>$client->id])}}" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {!! $clients->render() !!}
</div>
@endsection