<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function storeJson()
    {
        $data = [
            [
                'name' => 'João',
                'email' => 'joao@gmail.com'
            ],
            [
                'name' => 'Ana',
                'email' => 'ana@gmail.com'
            ],
            [
                'name' => 'Carlos',
                'email' => 'carlos@gmail.com'
            ]
        ];

        Storage::disk('public')->put('data.json', json_encode($data));

        echo 'Dados armazenados em JSON com sucesso!';
    }

    public function readJson()
    {
        $data = Storage::disk('public')->json('data.json');
        echo '<pre>';
        print_r($data);
    }

    public function listFiles()
    {
        $files = Storage::disk('public')->files();

        echo '<pre>';
        print_r($files);
    }

    public function deleteFile()
    {
        Storage::disk('public')->delete('file2.txt');

        echo 'Arquivo excluído com sucesso!';

        // delete all files
        // Storage::disk('public')->delete(Storage::disk('public')->files());
    }

    public function createFolder()
    {
        Storage::disk('public')->makeDirectory('Documents');
    }

    public function deleteFolder()
    {
        Storage::disk('public')->deleteDirectory('Documents');
    }

    public function listFilesWithMetadata()
    {
        $list_files = Storage::disk('public')->allFiles();

        $files = [];

        foreach ($list_files as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::disk('public')->size($file) / 1024, 2) . ' KB',
                'last_modified' => Carbon::createFromTimestamp(Storage::disk('public')->lastModified($file))->format('d/m/Y H:i:s'),
                'mime_type' => Storage::disk('public')->mimeType($file)
            ];
        }

        return view('list-files-with-metadata', ['files' => $files]);
    }

    public function listFilesForDownload()
    {
        $list_files = Storage::disk('public')->allFiles();

        $files = [];

        foreach ($list_files as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::disk('public')->size($file) / 1024, 2) . ' KB',
                'file' => basename($file)
            ];
        }

        return view('list-files-for-download', ['files' => $files]);
    }

    public function downloadFile($file)
    {

        return response()->download('storage/' . $file);
    }

    public function uploadFile(Request $request)
    {
        // solução para guardar o ficheiro na pasta "storage/app/uploads"

        $request->file('arquivo')->store('uploads');

        // para salvar o arquivo com nome original
        // $request->file('arquivo')->storeAs('uploads', $request->file('arquivo')->getClientOriginalName());
    }
}
