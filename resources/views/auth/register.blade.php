@extends('layouts.other')

@section('title', 'Регистрация пользователя')

@section('header')
    <a class="navbar-brand" href="{{ route('users') }}">К списку пользователей</a>
@endsection

@section('content')
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="card-title text-center">Регистрация пользователя</h1>
                <form id="registerForm" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="first_name" class="form-group mb-1">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="second_name" class="form-group mb-1">Second Name</label>
                        <input type="text" class="form-control" id="second_name" name="second_name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="third_name" class="form-group mb-1">Third Name</label>
                        <input type="text" class="form-control" id="third_name" name="third_name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="username" class="form-group mb-1">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-group mb-1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-group mb-1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="role" class="mb-1">Роль</label>
                        <select class="form-control text-center" id="role" name="role" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Зарегистрировать</button>

                </form>
            </div>
        </div>
    </div>
@endsection
