@extends('layouts.other')

@section('title', __('messages.user_registration'))

@section('header')
    <a class="navbar-brand" href="{{ route('users') }}">{{ __('messages.back') }}</a>
@endsection

@section('content')
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="card-title text-center">{{ __('messages.user_registration') }}</h1>
                <form id="registerForm" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="avatar">{{ __('messages.avatar') }}</label>
                        <input type="file" class="form-control" name="avatar" id="avatar" accept=".jpeg,.png,.jpg,.gif,.svg">
                    </div>

                    <div class="form-group mb-3">
                        <label for="first_name" class="form-group mb-1">{{ __('messages.first_name') }}</label>
                        <input type="text" class="form-control" id="first_name" name= "{{ __('messages.first_name') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="second_name" class="form-group mb-1">{{ __('messages.second_name') }}</label>
                        <input type="text" class="form-control" id="second_name" name= "{{ __('messages.second_name') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="third_name" class="form-group mb-1">{{ __('messages.third_name') }}</label>
                        <input type="text" class="form-control" id="third_name" name= "{{ __('messages.third_name') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="username" class="form-group mb-1">{{ __('messages.username') }}</label>
                        <input type="text" class="form-control" id="username" name= "{{ __('messages.username') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-group mb-1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-group mb-1">{{ __('messages.password') }}</label>
                        <input type="password" class="form-control" id="password" name= "{{ __('messages.password') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="role" class="mb-1">{{ __('messages.role') }}</label>
                        <select class="form-control text-center" id="role" name="role" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">{{ __('messages.save_data') }}</button>

                </form>
            </div>
        </div>
    </div>
@endsection
