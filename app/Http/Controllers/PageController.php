<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function showProfile()
    {
        return view('auth.profile');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
