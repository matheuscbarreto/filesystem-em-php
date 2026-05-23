<x-main-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <p class="text-center display-3">
                    Laboratório de FileSystem
                </p>

                <hr>

                <div class="d-flex gap-5">
                    <a href="{{ route('storage.local.create') }}" class="btn btn-primary">Criar arquivo no storage
                        local</a>

                    <a href="{{ route('storage.local.append') }}" class="btn btn-primary">Acrescentar conteúdo no storage
                        local</a>

                    <a href="{{ route('storage.local.read') }}" class="btn btn-primary">Ler o conteúdo do storage
                        local</a>

                    <a href="{{ route('storage.local.read.multi') }}" class="btn btn-primary">Ler arquivos com múltiplas
                        linhas</a>
                </div>

                <div class="d-flex gap-5 mt-5">
                    <a href="{{ route('storage.local.check.file') }}" class="btn btn-primary">Verificar a existência de
                        arquivo</a>

                    <a href="{{ route('storage.local.store.json') }}" class="btn btn-primary">Armazenar dados em
                        JSON</a>

                    <a href="{{ route('storage.local.read_json') }}" class="btn btn-primary">Ler dados em JSON</a>

                    <a href="{{ route('storage.local.list_files') }}" class="btn btn-primary">Listar arquivos</a>

                    <a href="{{ route('storage.local.delete_file') }}" class="btn btn-primary">Excluir arquivo</a>

                </div>

                <div class="d-flex gap-5 mt-5">
                    <a href="{{ route('storage.local.create.folder') }}" class="btn btn-primary">Criar pasta</a>

                    <a href="{{ route('storage.local.delete.folder') }}" class="btn btn-primary">Excluir pasta</a>

                    <a href="{{ route('storage.local.list.files.metadata') }}" class="btn btn-primary">Listar metadata
                        de arquivos</a>

                    <a href="{{ route('storage.local.list.files.for.download') }}" class="btn btn-primary">Download</a>
                </div>

                <div class="d-flex gap-5 mt-5">
                    <p class="display-6">Upload de Arquivos</p>
                    <form action="{{ route('storage.local.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="arquivo" class="form-label">Arquivo</label>
                            <input type="file" class="form-control" id="arquivo" name="arquivo">
                            @error('arquivo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-5">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-main-layout>
