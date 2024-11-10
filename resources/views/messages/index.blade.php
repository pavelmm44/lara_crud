<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('messages.create') }}"><h3>Create message</h3></a>
    <hr>
    @if(session('success'))
        <p>{{ session()->get('success') }}</p>
        <hr>
    @endif
    <h2>List of messages</h2>
    @foreach($messages as $message)
        <div>
            <p><b>Title</b>: {{ $message->title }}</p>
            <a href="{{ route('messages.show', [ $message->id ]) }}">Show more</a>
        </div>
        <hr>
    @endforeach
</body>
</html>
