@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inserção de cardápio</h1>
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
    <form action="{{ route('menu.store') }}" method="post">
        {{ csrf_field() }}
        <p>
            <label for="name">Nome do Carápio</label><br>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" >
            @if($errors->has('name'))
                <br>
                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
        </p>
        <p>
            <label for="price">Preço</label><br>
            <input type="text" name="price" value="{{ old('price') }}" class="form-control @if($errors->has('price')) is-invalid @endif">
            @if($errors->has('price'))
                <br>
                <span class="invalid-feedback">{{ $errors->first('price') }}</span>
            @endif
        </p>
        <p>
            <label for="restaurant_id">Restaurante</label><br>
            <select name="restaurant_id" class="form-control @if($errors->has('restaurant_id')) is-invalid @endif">
                <option value="">Selecione um restaurante</option>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                        {{ $restaurant->name }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('restaurant_id'))
                <br>
                <span class="invalid-feedback">{{ $errors->first('restaurant_id') }}</span>
            @endif
        </p>

        <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">
    </form>
</div>
@endsection
