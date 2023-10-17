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
    <table border="1">
        <tr>
            <th>Дата</th>
            <th>Id</th>
            <th>Имя</th>
        </tr>
        @foreach($list as $key => $rows)
            <tr>
                <td>{{$key}}</td>
                <td></td>
                <td></td>
            </tr>
            @foreach($rows as $row)
                <tr>
                    <td></td>
                    <td>{{$row['id']}}</td>
                    <td>{{$row['name']}}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
</body>
</html>
