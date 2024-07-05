@extends('layouts.other')
@section('title', 'Обновление данных пользователя')

@section('header')
    <a class="navbar-brand" href="{{ route('users') }}">К списку пользователей</a>
@endsection
@section('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <div class="form-container container">
            <h1 class="text-center">Обновление данных пользователя</h1>
            <form id="updateForm" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="avatar" class="form-group mb-1">Аватарка</label>
                    <input type="file" class="form-control" name="avatar" id="avatar" accept=".jpeg,.png,.jpg,.gif,.svg">
                </div>
                <div class="form-group">
                    <label for="first_name" class="form-group mb-1">First name</label>
                    <input type="text" class="form-control mb-3" name="first_name" id="first_name" value="{{ $user->first_name }}" required>
                </div>
                <div class="form-group">
                    <label for="second_name" class="form-group mb-1">Second name</label>
                    <input type="text" class="form-control mb-3" name="second_name" id="second_name" value="{{ $user->second_name }}" required>
                </div>
                <div class="form-group">
                    <label for="third_name" class="form-group mb-1">Third name</label>
                    <input type="text" class="form-control mb-3" name="third_name" id="third_name" value="{{ $user->third_name }}" required>
                </div>
                <div class="form-group">
                    <label for="username" class="form-group mb-1">Username</label>
                    <input type="text" class="form-control mb-3" name="username" id="username" value="{{ $user->username }}" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-group mb-1">Email</label>
                    <input type="email" class="form-control mb-3" name="email" id="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-group mb-1">Password</label>
                    <input type="password" class="form-control mb-3" name="password" id="password">
                </div>
                <div class="form-group mb-3">
                    <label for="role" class="mb-1">Роль</label>
                    <select class="form-control text-center" id="role" name="role" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Сохранить данные</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
