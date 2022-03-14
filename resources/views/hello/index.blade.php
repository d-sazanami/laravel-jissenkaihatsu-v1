<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body style="padding:10px;">
    <h1>Hello/Index</h1>
    <p>{{$msg}}</p>
    <ul>
    @foreach ($data as $item)
       <li>{{$item->all_data}} </li>
    @endforeach
    </ul>
</body>
</html>