<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Healthy Region</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

</head>
<body>

<div class="wrapper">
    <div class="header">
        <h1 class="title is-1, has-text-centered">Healthy Region</h1>
        <p>Welkom op de site van lectoraat Healthy Region</p>
    </div>


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
