@extends('layouts.other')

@section('title', 'Настройка ролей')

@section('header')
    <div class="d-flex justify-content-between align-items-center w-100">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('users') }}">Назад</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <!-- Таблица ролей -->
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Роль</th>
                <th>Разрешения</th>
                <th class="actions w-25">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td></td> <!-- Разрешения пока пустые -->
                    <td class="actions w-25">
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                </div>
                            </form>

                            <div class="mx-2"></div>

                            <form action="{{ route('roles.edit', $role->id) }}" method="GET">
                                @csrf
                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-primary">Изменить</button>
                                </div>
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
