@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
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
    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Name</label><br>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="password">Password</label><br>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="password_confirmation">Confirm Password</label><br>
            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </p>

        <input type="submit" value="Update" class="btn btn-success btn-lg">
    </form>
</div>
@endsection
