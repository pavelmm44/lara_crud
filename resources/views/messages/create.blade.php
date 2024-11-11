<!doctype html>
<html lang="en">
<head>
    @vite(['resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('messages.index') }}"><h3>Messages list</h3></a>
    <hr>
    <h2>Create message</h2>
    <div>
        <form action="{{ route('messages.store') }}" method="post">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Title" id="title" value="{{ old('title') }}">
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div><br>

            <div>
                <label for="content">Content</label>
                <textarea name="content" placeholder="Content" id="content">{{ old('content') }}</textarea>
                @error('content')
                    <p>{{ $message }}</p>
                @enderror
            </div><br>

            <button>Save</button>
            <button type="button" id="send-valid-btn">sendValid</button>
        </form>
    </div>
    <hr>
</body>
</html>
