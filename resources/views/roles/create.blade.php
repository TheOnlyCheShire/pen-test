@extends('layouts.other')

@section('title', 'Добавить новую роль')

@section('header')
    <div class="d-flex justify-content-between align-items-center w-100">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('roles.index') }}">Назад</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Добавить новую роль</h2>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название роли</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-success">Добавить роль</button>
        </form>
    </div>
@endsection
