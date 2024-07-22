@extends('layouts.other')

@section('header')
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('roles.index') }}">{{ __('messages.back') }}</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>{{ __('messages.create') }}</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">{{ __('messages.role_name') }}</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>{{ __('messages.permissions') }}</label>
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center">№</th>
                        <th class="text-center">{{ __('messages.name') }}</th>
                        <th class="text-center">{{ __('messages.role_has') }}</th>
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

            <button type="submit" class="btn btn-primary">{{ __('messages.save_data') }}</button>
        </form>
    </div>
@endsection
