<h1>Inserção de restaurante</h1>
<hr>
@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('restaurant.store') }}" method="post">
    {{ csrf_field() }}
    <p>
        <label for="name">Nome do Restaurante</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @if($errors->has('name'))
            <br>
            <span>{{ $errors->first('name') }}</span>
        @endif
    </p>
    <p>
        <label for="address">Endereço</label><br>
        <input type="text" name="address" value="{{ old('address') }}">
        @if($errors->has('address'))
            <br>
            <span>{{ $errors->first('address') }}</span>
        @endif
    </p>
    <p>
        <label for="description">Sobre o restaurante</label><br>
        <textarea name="description" id="description" rows="10">{{ old('description') }}</textarea>
        @if($errors->has('description'))
            <br>
            <span>{{ $errors->first('description') }}</span>
        @endif
    </p>
    <input type="submit" value="Cadastrar">
</form>
