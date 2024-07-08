<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $keywords = Keyword::where('name', 'like', "%{$query}%")->get();
        return response()->json($keywords);
    }
}

