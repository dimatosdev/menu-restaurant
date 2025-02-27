<h1>Inserção de restaurante</h1>
<hr>
<form action="{{route('restaurant.store')}}" method="post">
    {{csrf_field()}}
    <p>
        <label for="name">Nome do Restaurante</label><br>
        <input type="text" name="name">
    </p>
    <p>
        <label for="address">Endereço</label><br>
        <input type="text" name="address">
    </p>
    <p>
        <label for="description">Sobre o restaurante</label><br>
        <textarea name="description" id="description" rows="10"></textarea>
    </p>
    <input type="submit" value="Cadastrar">
</form>
