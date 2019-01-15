<!doctype html>
<html lang="html">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel Dev testing')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
</head>
<body>

{{--@yeild will allow me to place an @section() tag in another file, which will then insert that into the page while still showing everything in this layout file--}}
@yield('content')

<ul class="box">
    <li><a href="/">Home</a></li>
    <li><a href="/contact">Contact</a></li>
    <li><a href="/about">About us</a></li>
    <li><a href="/projects">Projects</a></li>
</ul>

</body>
</html>