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
    <form action="/hello/other" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit">
    </form>
    <p>{!!$msg!!}</p>
    <ul>
        @foreach ($data as $item)
        <li>{!!$item!!}</li>
        @endforeach
    </ul>
</body>
</html>