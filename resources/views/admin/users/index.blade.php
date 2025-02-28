@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('user.new')}}" class="float-right btn btn-primary">Novo</a>
    <h1>Usuários</h1>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja deletar este usuário?');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
