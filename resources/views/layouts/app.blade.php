<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div class="container">
            Here is header
        </div>
    </header>

    <div class="container">
        <main>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                <hr>
            @endif

            @yield('content')
        </main>
    </div>

    <footer>
        <div class="container">
            Here is footer
        </div>
    </footer>
</body>
</html>
