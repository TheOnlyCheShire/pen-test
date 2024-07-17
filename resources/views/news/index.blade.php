@extends('layouts.other')

@section('header')
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('users') }}">Назад</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>Список новостей</h1>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Изображение</th>
                <th>Заголовок</th>
                <th>Содержание</th>
                <th>Ключевые слова</th>
                <th>Действия</th>
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
                        <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('news.create') }}" class="btn btn-success">Добавить новость</a>
    </div>
@endsection
