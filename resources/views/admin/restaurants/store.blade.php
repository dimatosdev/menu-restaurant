@extends('layouts.app')

@section('content')
<div class="container">
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
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" >
            @if($errors->has('name'))
                <br>
                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
        </p>
        <p>
            <label for="address">Endereço</label><br>
            <input type="text" name="address" value="{{ old('address') }}" class="form-control @if($errors->has('address')) is-invalid @endif">
            @if($errors->has('address'))
                <br>
                <span class="invalid-feedback">{{ $errors->first('address') }}</span>
            @endif
        </p>
        <p>
            <label for="description">Sobre o restaurante</label><br>
            <textarea name="description" id="description" rows="10" class="form-control @if($errors->has('description')) is-invalid @endif">{{ old('description') }}</textarea>
            @if($errors->has('description'))
                <br>
                <span class="invalid-feedback">{{ $errors->first('description') }}</span>
            @endif
        </p>
        <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">
    </form>
</div>
@endsection
