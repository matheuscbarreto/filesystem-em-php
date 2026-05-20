<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function storageLocalCreate()
    {
        Storage::disk('public')->put('file1.txt', 'Conteúdo do arquivo 1');
    }

    public function storageLocalAppend()
    {

        Storage::disk('public')->append('file2.txt', Str::random(100));

        return redirect()->route('home');
    }
}
