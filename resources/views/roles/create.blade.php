@extends('layouts.other')

@section('header')
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('roles.index') }}">Назад</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>Create Role</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Название Роли</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Разрешения</label>
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center">№</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Наличие у Роли</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td class="text-center">{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class="text-center">
                                <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" class="form-check-input">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
