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
    <h1>Загрузите файл</h1>
    <form action="{{ route('download_action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input id="file" type="file" name="file">
        <button type="submit">Отправить файл</button>
    </form>
    @error('file')
        <h3 style="color: red">{{ $message  }}</h3>
    @enderror
    <p>Для загрузки доступны следующие расширения: .xls, .xlsx или .csv</p>
    <a href="/imported-data">Посмотреть загруженные строки</a>
</body>
<footer>
    <a href="/logout">Разлогиниться</a>
</footer>
</html>
