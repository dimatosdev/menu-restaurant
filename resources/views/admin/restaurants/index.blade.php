<table>
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
                <a href="{{ route('restaurant.edit', ['restaurant' => $restaurant->id]) }}">Editar</a>
                <form action="{{ route('restaurant.destroy', ['restaurant' => $restaurant->id]) }}" method="post" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja deletar este restaurante?');">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
