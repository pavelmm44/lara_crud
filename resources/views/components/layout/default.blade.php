@props([
    'title' => 'Default'
])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
    <div class="container">
        <h3>Here is header</h3>
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

        {{ $slot }}
    </main>
</div>

<footer>
    <div class="container">
        <h3>Here is footer</h3>
    </div>
</footer>
</body>
</html>
