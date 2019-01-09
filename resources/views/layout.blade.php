<!doctype html>
<html lang="html">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel Dev testing')</title>
</head>
<body>

{{--@yeild will allow me to place an @section() tag in another file, which will then insert that into the page while still showing everything in this layout file--}}


<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/contact">Contact</a></li>
    <li><a href="/about">About us</a></li>
    <li><a href="/projects"></a></li>
</ul>
@yield('content')
</body>
</html>