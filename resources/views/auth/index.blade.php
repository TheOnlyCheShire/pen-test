@extends('layouts.other')

@section('title', __('messages.authorization'))

@section('content')
    <h1 class="text-center">{{ __('messages.authorization') }}</h1>
    <div class="card mx-auto mt-4" style="width: 18rem;">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="InputUsername" class="form-group mb-1">{{ __('messages.username') }}</label>
                    <input type="text" class="form-control" id="InputUsername" name="username" placeholder= "{{ __('messages.username') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="InputPassword" class="form-group mb-1">{{ __('messages.password') }}</label>
                    <input type="password" class="form-control" id="InputPassword" name="password" placeholder= "{{ __('messages.password') }}" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">{{ __('messages.log_in') }}</button>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <div class="d-flex align-items-center ms-3">
        @foreach (config('app.locales') as $lang => $language)
            <a href="{{ route('lang.switch', $lang) }}" class="btn btn-link {{ App::getLocale() == $lang ? 'font-weight-bold text-decoration-underline' : '' }}">
                {{ $language }}
            </a>
            @if (!$loop->last)
                <span class="mx-1">/</span>
            @endif
        @endforeach
    </div>
@endsection
