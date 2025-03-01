@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cardários</h1>
    <a href="{{route('menu.new')}}" class="float-right btn btn-primary">Novo</a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Restaurante</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->name }}</td>
                <td>
                    <a href="{{route('restaurant.edit', ['restaurant' =>$menu->restaurant->id])}}">{{ $menu->restaurant->name }}</a>
                </td>
                <td>{{ $menu->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('menu.destroy', ['menu' => $menu->id]) }}" method="post" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja deletar este restaurante?');">
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
