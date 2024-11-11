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
    <a href="{{ route('messages.index') }}"><h3>Messages list</h3></a>
    <hr>
    <h2>Message info</h2>
    <div>
        <p><b>ID</b>: {{ $message->id }}</p>
        <p><b>Title</b>: {{ $message->title }}</p>
        <p><b>Content</b>: {{ $message->content }}</p>
        <p><b>Creation date</b>: {{ $message->created_at }}</p>
        <p><b>Update date</b>: {{ $message->updated_at }}</p>
    </div>
    <hr>
</body>
</html>
