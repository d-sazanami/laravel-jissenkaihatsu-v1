<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <style>
        th {background-color: red; padding: 10px;}
        td {background-color: #eee; padding: 10px;}
    </style>
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
    <ul>
        @foreach ($data as $item)
        <li>{!!$item!!}</li>
        @endforeach
    </ul>
</body>
</html>