<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthy Region</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">--}}
    <link rel="stylesheet" href="{{asset('/css/style.css')}}"/>


</head>
<body>

<div class="wrapper">
    <div class="header">
        <h1 class="title is-1, has-text-centered">Healthy Region</h1>
        <p>Welkom op de site van lectoraat Healthy Region</p>
    </div>
<!-- <nav class="top-bar" data-topbar role="navigation" data-options="is_hover: true">

    <ul class="ul">
        <li class="name">
            <a href="/https://hz.nl/" title="HZ University of Applied Sciences (nl)">
                <img class="hz-logo" src="{{asset('/img/hz-logo.svg')}}" alt="HZ University of Applied Sciences (nl)">
            </a>
        </li>
        <li class="ENHZ">
            <a class="dark-blue-background" href="https://hz.nl/en/">
                <i id="globe" class="fas fa-globe"></i>

                EN
            </a>
        </li>

        <li class="MYHZ">
            <a class="blue-background" href="https://portal.hz.nl">
                <i id="user" class="fas fa-user"> -->

    <!--Menu-->
    <nav class="navbar" role="navigation" aria-label="main navigation">

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/">
                    Home
                </a>
                <a class="navbar-item" href="/documents">
                    Documents
                </a>
            </div>
        </div>
    </nav>

{{--    <ul>--}}
{{--        <div class="wrapper">--}}
{{--            <li>--}}
{{--                <a href="/" {{ Request::path() === '/' ? "is-active" : "" }}"> Home </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="/documents" {{ Request::path() === 'documents' ? "is-active" : "" }}"> Documents </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="/filter" {{ Request::path() === 'filter' ? "is-active" : "" }}"> Filter </a>--}}
{{--            </li>--}}
{{--        </div>--}}
{{--    </ul>--}}
</div>
@yield('content')
</body>
</html>
