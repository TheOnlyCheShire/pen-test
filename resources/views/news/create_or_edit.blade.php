@extends('layouts.other')

@section('content')
    <div class="container">
        <h1>{{ isset($news) ? 'Изменить новость' : 'Добавить новость' }}</h1>

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
                <label for="title" class="form-label">Заголовок</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $news->title ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Содержание</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ $news->content ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="keywords" class="form-label">Ключевые слова</label>
                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Введите ключевые слова, разделенные запятыми" value="{{ isset($news->keywords) ? $news->keywords->pluck('name')->implode(', ') : '' }}">
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">Изображения</label>
                <input type="file" name="images[]" id="images" class="form-control" accept=".jpeg,.png,.jpg,.gif,.svg" multiple>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($news) ? 'Обновить' : 'Сохранить' }}</button>
        </form>
    </div>
@endsection
