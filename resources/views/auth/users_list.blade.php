@extends('layouts.other')

@section('title', __('messages.users_list'))

@section('header')
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center fw-bolder">
            <a id="users-list" class="navbar-brand ms-3 fs-6" href="{{route('news.index')}}">{{ __('messages.news') }}</a>
            <a id="role-settings" class="navbar-brand ms-3 fs-6" href="{{route('roles.index')}}">{{ __('messages.roles_set') }}</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <!-- Таблица пользователей -->
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>{{ __('messages.avatar') }}</th>
                <th>{{ __('messages.first_name') }}</th>
                <th>{{ __('messages.second_name') }}</th>
                <th>{{ __('messages.third_name') }}</th>
                <th>{{ __('messages.role') }}</th>
                <th class="actions w-25">{{ __('messages.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr data-id="{{ $user->id }}">
                    <td>
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->first_name }}" class="img-thumbnail rounded-circle" width="50" height="50">
                    </td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->second_name }}</td>
                    <td>{{ $user->third_name }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            <span>{{ $role->name }}</span>
                        @endforeach
                    </td>

                    <td class="actions w-25">
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-danger">{{ __('messages.delete') }}</button>
                                </div>
                            </form>

                            <div class="mx-2"></div>

                            <form action="{{ route('update.form', $user->id) }}" method="GET">
                                @csrf
                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('messages.edit') }}</button>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            <form action="{{ route('register') }}" method="GET">
                <button id="add-button" class="btn btn-success">{{ __('messages.create') }}</button>
            </form>
        </div>
    </div>
@endsection
