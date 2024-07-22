@extends('layouts.other')

@section('header')
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('roles.index') }}">{{ __('messages.back') }}</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>{{ __('messages.edit') }}</h1>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">{{ __('messages.role_name') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="permissions">{{ __('messages.permissions') }}</label>
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center">№</th>
                        <th class="text-center">{{ __('messages.name') }}</th>
                        <th class="text-center">{{ __('messages.role_has') }}</th>
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

            <button type="submit" class="btn btn-primary mt-3">{{ __('messages.save_data') }}</button>
        </form>
    </div>
@endsection
