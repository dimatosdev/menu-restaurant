@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Restaurantes</h1>
    <a href="{{route('restaurant.new')}}" class="float-right btn btn-primary">Novo</a>
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
            @foreach($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->id }}</td>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('restaurant.edit', ['restaurant' => $restaurant->id]) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('restaurant.destroy', ['restaurant' => $restaurant->id]) }}" method="post" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja deletar este restaurante?');">
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
