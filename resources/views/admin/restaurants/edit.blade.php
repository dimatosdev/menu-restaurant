<h1>Edição de restaurante</h1>
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
<form action="{{ route('restaurant.update', ['restaurant' => $restaurant->id]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <p>
        <label for="name">Nome do Restaurante</label><br>
        <input type="text" name="name" value="{{ old('name', $restaurant->name) }}">
        @if($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
        @endif
    </p>
    <p>
        <label for="address">Endereço</label><br>
        <input type="text" name="address" value="{{ old('address', $restaurant->address) }}">
        @if($errors->has('address'))
            <span>{{ $errors->first('address') }}</span>
        @endif
    </p>
    <p>
        <label for="description">Sobre o restaurante</label><br>
        <textarea name="description" id="description" rows="10">{{ old('description', $restaurant->description) }}</textarea>
        @if($errors->has('description'))
            <span>{{ $errors->first('description') }}</span>
        @endif
    </p>
    <input type="submit" value="Atualizar">
</form>
