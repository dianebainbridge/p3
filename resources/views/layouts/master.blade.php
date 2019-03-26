<!doctype html>
<html lang='en'>

<head >
    <title >@yield('title')</title>
<meta charset='utf-8'>

<link href='/css/default.css' rel='stylesheet'>

@yield('head')
</head>
<body>

<header>
    Header
</header>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>

</body>
</html>