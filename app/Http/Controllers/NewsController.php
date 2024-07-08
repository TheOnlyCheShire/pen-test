<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Keyword;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('keywords', 'images')->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        $keywords = Keyword::all();
        $news = new News();
        return view('news.create_or_edit', compact('keywords', 'news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'keywords' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $newsData = $request->only(['title', 'content']);
        $news = News::create($newsData);

        // Save images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/news', $imageName);
                NewsImage::create([
                    'news_id' => $news->id,
                    'filename' => $imageName,
                ]);
            }
        }

        // Save keywords
        if ($request->filled('keywords')) {
            $keywords = array_map('trim', explode(',', $request->input('keywords')));
            $keywordModels = Keyword::whereIn('name', $keywords)->get();
            $newKeywordNames = array_diff($keywords, $keywordModels->pluck('name')->toArray());

            foreach ($newKeywordNames as $keyword) {
                $keywordModel = Keyword::firstOrCreate(['name' => $keyword]);
                $keywordModels->push($keywordModel);
            }

            $news->keywords()->attach($keywordModels->pluck('id')->toArray());
        }

        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $news = News::with('keywords', 'images')->findOrFail($id);
        $keywords = Keyword::all();
        return view('news.create_or_edit', compact('news', 'keywords'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'keywords' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $newsData = $request->only(['title', 'content']);
        $news->update($newsData);

        // Save images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/news', $imageName);
                NewsImage::create([
                    'news_id' => $news->id,
                    'filename' => $imageName,
                ]);
            }
        }

        // Save keywords
        $keywords = array_map('trim', explode(',', $request->input('keywords')));
        $keywordModels = Keyword::whereIn('name', $keywords)->get();
        $newKeywordNames = array_diff($keywords, $keywordModels->pluck('name')->toArray());

        foreach ($newKeywordNames as $keyword) {
            $keywordModel = Keyword::firstOrCreate(['name' => $keyword]);
            $keywordModels->push($keywordModel);
        }

        $news->keywords()->sync($keywordModels->pluck('id')->toArray());

        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Удаление изображений из папки
        foreach ($news->images as $image) {
            Storage::delete('public/news/' . $image->filename);
        }

        // Удаление записей из таблицы news_images
        $news->images()->delete();

        // Удаление записей из таблицы news_keywords
        $news->keywords()->detach();

        // Удаление самой новости
        $news->delete();

        return redirect()->route('news.index');
    }
}
