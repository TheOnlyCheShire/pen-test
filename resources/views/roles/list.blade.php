@extends('layouts.other')

@section('title', 'Настройка ролей')

@section('header')
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('users') }}">Назад</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <!-- Таблица ролей -->
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th class="col-6">Роль</th>
                <th class="col-6">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td class="col-6">{{ $role->name }}</td>
                    <td class="col-6">
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="me-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                            </form>

                            <form action="{{ route('roles.edit', $role->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Изменить</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            <form action="{{ route('roles.create') }}" method="GET">
                <button id="add-button" class="btn btn-success">Добавить роль</button>
            </form>
        </div>
    </div>
@endsection
