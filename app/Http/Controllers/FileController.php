<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}
