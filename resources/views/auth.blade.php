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
    <h1>Для загрузки файлов водите в систему</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div style="display: flex; flex-direction: column; width: 200px; height: 130px; justify-content: space-between;">
            <label for="username">Имя пользователя
                <input id="username" type="text" name="username">
            </label>
            <label for="password">Пароль
                <input id="password" type="text" name="password">
            </label>
            <button type="submit">Войти</button>
        </div>
        <a href="/create-default-user">Создать дефолтного пользователя</a>
        @if($errors->any())
            <ul style="color:red;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</body>
</html>
