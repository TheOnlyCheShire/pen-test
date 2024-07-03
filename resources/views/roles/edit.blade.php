@extends('layouts.other')

@section('title', 'Редактировать роль')

@section('header')
    <div class="d-flex justify-content-between align-items-center w-100">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('roles.index') }}">Назад</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Редактировать роль</h2>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Название роли</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Обновить роль</button>
        </form>
    </div>
@endsection
