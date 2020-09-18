<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic Website</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('inc.navbar')
    <div class="container py-2" id="content">
        @if(Request::is('/'))
            @include('inc.showcase')
        @endif
        <div class="row">
            <div class="col-8 p-2">
                @yield('content')
            </div>
            <div class="col-4 p-2">
                @include('inc.sidebar')
            </div>
        </div>
    </div>
    <footer id="footer" class="text-center mx-auto">
        <p>
            Copyright 2019 &copy; Sandro Skhirtladze
        </p>
    </footer>
</body>
</html>
