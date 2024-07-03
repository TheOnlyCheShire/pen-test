@extends('layouts.other')

@section('title', 'Авторизация')

@section('content')
    <h1 class="text-center">Авторизация</h1>
    <div class="card mx-auto mt-4" style="width: 18rem;">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="InputUsername" class="form-group mb-1">Username</label>
                    <input type="text" class="form-control" id="InputUsername" name="username" placeholder="Username" required>
                </div>
                <div class="form-group mb-3">
                    <label for="InputPassword" class="form-group mb-1">Password</label>
                    <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
            </form>
        </div>
    </div>
@endsection
