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

    <ul>
        <div class="wrapper">
            <li>
                <a href="/" {{ Request::path() === '/' ? "is-active" : "" }}"> Home </a>
            </li>
            <li>
                <a href="/documents" {{ Request::path() === 'documents' ? "is-active" : "" }}"> Documents </a>
            </li>
            <li>
                <a href="/filter" {{ Request::path() === 'filter' ? "is-active" : "" }}"> Filter </a>
            </li>
        </div>
    </ul>

    @yield('content')
</div>
</body>
</html>
