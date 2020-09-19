<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Todo List</title>
</head>
<body>
    @include('layouts.navbar')
    <div class="container p-2">
        @yield('content')
    </div>
    <footer class="text-center">copyright &copy; 2020</footer>
</body>
</html>
