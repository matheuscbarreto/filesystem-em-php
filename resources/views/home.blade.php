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
                </div>
            </div>
        </div>
    </div>

</x-main-layout>
