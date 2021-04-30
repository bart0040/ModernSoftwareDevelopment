<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthy Region</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>

</head>
<body>

<nav class="top-bar" data-topbar role="navigation" data-options="is_hover: true">

    <ul class="ul">
        <li class="name">
            <a href="https://hz.nl/" title="HZ University of Applied Sciences (nl)">
                <img class="hz-logo" src="{{asset('/img/hz-logo.svg')}}" alt="HZ University of Applied Sciences (nl)">
            </a>
        </li>
    </ul>
</nav>

<img src="{{asset('/healthyregion-banner.jpg')}}">


<!--Menu-->

<ul>
    <div class="wrapper" id="navBar">
        <li class="home">
            <a href="/" id="kaas" {{ Request::path() === '/' ? "is-active" : "" }}"> Home </a>
        </li>
        <li class="documents">
            <a href="/documents" {{ Request::path() === 'documents' ? "is-active" : "" }}"> Documents </a>
        </li>
        <li class="filter">
            <a href="/filter" {{ Request::path() === 'filter' ? "is-active" : "" }}"> Filter </a>
        </li>
    </div>
</ul>

@yield('content')
</div>
</body>
</html>
