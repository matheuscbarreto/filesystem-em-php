<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">

    <title>Laravel File System</title>
</head>

<body>
    <main>
        {{ $slot }}
    </main>
</body>

<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>

</html>
