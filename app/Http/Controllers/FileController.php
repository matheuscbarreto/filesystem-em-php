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

    public function storageLocalRead()
    {

        $content = Storage::disk('public')->get('file1.txt');

        echo $content;
    }

    public function storageLocalReadMulti()
    {

        $lines = Storage::disk('public')->get('file2.txt');
        $lines = explode(PHP_EOL, $lines);

        foreach ($lines as $line) {
            echo '<p>' . $line . '</p>';
        }
    }

    public function stoarageLocalCheckFile()
    {
        $exists = Storage::disk('public')->exists('file1.txt');

        if ($exists) echo "O arquivo existe";
        else echo "O arquivo não existe";

        // posso verificar também se um arquivo não existe através do método "missing"
        // $missing = Storage::disk('public')->missing('file2.txt');

        // if ($missing) echo "O arquivo não existe";
        // else echo "O arquivo existe";
    }
}
