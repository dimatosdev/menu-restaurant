<h1>Inserção de restaurante</h1>
<hr>
<form action="{{ route('restaurant.update', ['restaurant' => $restaurant->id]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <p>
        <label for="name">Nome do Restaurante</label><br>
        <input type="text" name="name" value="{{ $restaurant->name }}">
    </p>
    <p>
        <label for="address">Endereço</label><br>
        <input type="text" name="address" value="{{ $restaurant->address }}">
    </p>
    <p>
        <label for="description">Sobre o restaurante</label><br>
        <textarea name="description" id="description" rows="10">{{ $restaurant->description }}</textarea>
    </p>
    <input type="submit" value="Atualizar">
</form>
