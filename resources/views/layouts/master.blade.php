<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='/css/default.css' rel='stylesheet'>

    @yield('head')
</head>

<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/#"><i class="fas fa-gas-pump"></i>&#160;{{ config('app.name') }}</a>
            </div>
            <ul class="nav navbar-nav">
                <!--loop code from Susan Buck foobooks application-->
                @foreach(config('app.nav') as $link => $label)
                    <li
                            {{-- If the current path is the same as this link, display as plain text, not a hyperlink--}}
                            @if(Request::is($link))
                            class='active'>{{ $label }}
                        {{-- Otherwise, display as a hyerlink --}}
                        @else
                            ><a href='/{{ $link }}'>{{ $label }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
<section id='pageTitle'>
    @yield('pageTitle')
</section>
<hr/>
<section id='main'>
    @yield('content')
</section>
<hr/>
<footer>
    <a href='{{ config('app.githubUrl') }}'><i class='fab fa-github'></i> View p3 on Github</a>
</footer>

</body>
</html>