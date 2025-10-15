<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PetLar</title>
    <link rel="icon" href="asset('storage/images/mymanga.jpg')">
    @vite(['resources/js/app.js'])
</head>
<body>
    @component('navbar')
    @endcomponent
    <main role="main" class="">
            @hasSection('content')
                @yield('content')
            @endif
    </main>
    @component('footer')
    @endcomponent

    @hasSection('javascript')
        @yield('javascript')
    @endif
</body>
</html>