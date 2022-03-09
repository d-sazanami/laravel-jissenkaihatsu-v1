<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>
    <h1>Hello/Index</h1>
    <form action="/hello" method="POST">
        @csrf
        ID: <input type="text" id="id" name="id">
        <input type="submit">
    </form>
</body>
</html>