@extends('layouts.other')

@section('header')
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('roles.index') }}">Назад</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>Редактирование</h1>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Название Роли</label>
                <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="permissions">Разрешения</label>
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center">№</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Наличие у Роли</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="text-center">{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class="text-center">
                                <input type="checkbox" id="permission{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}"
                                       @if ($role->hasPermissionTo($permission->name)) checked @endif
                                       class="form-check-input">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
        </form>
    </div>
@endsection
