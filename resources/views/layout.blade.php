<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Healthy Region</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}"/>

</head>
<body>

<div class="wrapper">
    <div class="header">
        <h1>Healthy Region</h1>
        <p>Welkom op de site van lectoraat Healthy Region</p>
    </div>


    <!--Menu-->

    <lu>
        <li>
            <a href="/"
            {{ Request::path() === '/' ? "is-active" : "" }}">
            Home
            </a>
            <a href="/documents"
            {{ Request::path() === 'documents' ? "is-active" : "" }}">
            Documents
            </a>
            <a href="/filter"
            {{ Request::path() === 'filter' ? "is-active" : "" }}">
            Filter
            </a>
        </li>
    </lu>

    @yield('content')
</div>
</body>
</html>
