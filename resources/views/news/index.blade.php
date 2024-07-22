@extends('layouts.other')

@section('header')
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('users') }}">{{ __('messages.back') }}</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>{{ __('messages.news_list') }}</h1>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>{{ __('messages.images') }}</th>
                <th>{{ __('messages.title') }}</th>
                <th>{{ __('messages.content') }}</th>
                <th>{{ __('messages.keywords') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($news as $newsItem)
                <tr>
                    <td>
                        @if($newsItem->images && $newsItem->images->count() > 0)
                            <img src="{{ $newsItem->images->first()->image_url }}" alt="{{ $newsItem->title }}" class="img-thumbnail" width="100">
                        @endif
                    </td>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ Str::limit($newsItem->content, 100) }}</td>
                    <td>
                        @foreach ($newsItem->keywords as $keyword)
                            <span class="badge bg-secondary">{{ $keyword->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-primary">{{ __('messages.edit') }}</a>
                        <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('news.create') }}" class="btn btn-success">{{ __('messages.create') }}</a>
    </div>
@endsection
