@extends('layouts.other')

@section('header')
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('news.index') }}">{{ __('messages.back') }}</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>{{ isset($news) && $news->id ? __('messages.edit') : __('messages.create') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($news) && $news->id ? route('news.update', $news->id) : route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($news) && $news->id)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('messages.title') }}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $news->title ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">{{ __('messages.content') }}</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ $news->content ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="keywords" class="form-label">{{ __('messages.keywords') }}</label>
                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="{{ __('messages.write_keywords') }}" value="{{ isset($news->keywords) ? $news->keywords->pluck('name')->implode(', ') : '' }}">
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">{{ __('messages.images') }}</label>
                <input type="file" name="images[]" id="images" class="form-control" accept=".jpeg,.png,.jpg,.gif,.svg" multiple>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('messages.save_data') }}</button>
        </form>
    </div>
@endsection
