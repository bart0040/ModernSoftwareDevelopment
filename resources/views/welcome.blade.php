<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div class="flex flex-col">
    @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                    {{ config('app.name', 'Laravel') }}
                </h1>
                <ul class="flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
                    <li>
                        <a href="https://laravel.com/docs" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Documentation">Documentation</a>
                    </li>
                    <li>
                        <a href="https://laracasts.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laracasts">Laracasts</a>
                    </li>
                    <li>
                        <a href="https://laravel-news.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="News">News</a>
                    </li>
                    <li>
                        <a href="https://nova.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Nova">Nova</a>
                    </li>
                    <li>
                        <a href="https://forge.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Forge">Forge</a>
                    </li>
                    <li>
                        <a href="https://vapor.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Vapor">Vapor</a>
                    </li>
                    <li>
                        <a href="https://github.com/laravel/laravel" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="GitHub">GitHub</a>
                    </li>
                    <li>
                        <a href="https://tailwindcss.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Tailwind Css">Tailwind CSS</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
=======
    <div class="text">
        <div class="wrapper">
        <h1>Healthy Region<br></h1>

        <p style="font-family: inherit">Toerisme, vitaliteit, bewegen, welzijn, gezondheid én Zeeland. Wat ontstaat er als je
            raakvlakken tussen deze
            onderwerpen opzoekt?</p>
        <br>
        <p><strong>Cross-overs gezondheid en toerisme</strong><br></p>
        <p>Binnen het lectoraat Healthy Region wordt onderzoek gedaan naar cross-overs tussen gezondheid van burgers en
            toeristen en kenmerkende omgevingsfactoren die aanwezig zijn in Zeeland. Onderzoekers, studenten,
            ondernemers, bestuurders en gebruikers werken samen aan onderzoeksprojecten. Dit levert kennis op waarmee
            diensten en producten – gerelateerd aan een gezond leven – beter afgestemd worden op veranderende behoeften
            van zowel bewoners als toeristen in Zeeland.<br></p>

        <p>Op deze manier draagt het lectoraat Healthy Region bij aan een slimme, duurzame en inclusieve groei van
            toerisme en economie van Zeeland. Daarbij biedt het ook maatschappelijke waarde, omdat bewoners eveneens
            gebruik kunnen maken van de innovatieve diensten en producten met betrekking op het gezonde leven.</p>
        <p><strong>Healthy living, lifestyle, hospitality</strong></p>

        <p>Drie thema’s zijn de rode draad in de onderzoeksprojecten van het lectoraat Healthy Region.</p>
        <em>Healthy living<br></em>
        <p>Hoe kunnen burgers een vitale leefstijl ontwikkelen en behouden in de gezonde regio? En welke activiteiten en
            voorzieningen die gericht zijn op welzijn, gezondheid en vitaliteit dragen daar aan bij? En hoe kunnen zorg-
            en welzijnssystemen innoveren en verduurzamen? Dit thema heeft betrekking op het leven en verblijven in de
            gezonde regio. En dan gaat het vooral over de gezonde regio Zeeland.</p>
        <em>Healthy lifestyle</em><br>
        <p>Beweging en sport kunnen gezien worden als een fundament voor een gezonde leefstijl. Hoe kan in de gezonde
            regio een actieve leefstijl gestimuleerd worden? Voor zowel bewoners als voor toeristen? Welk effect heeft
            de aanwezigheid van sport- en beweegaanbod in de gezonde regio? En welke technologieën kunnen daarvoor
            ingezet worden? Binnen dit thema wordt bewegen en sport gerelateerd aan vitaliteit, welzijn en gezond leven
            en ouder worden.</p>
        <em>Healthy hospitality<br></em>
        <p>Hoe kunnen toerisme en gezondheidszorg aan elkaar gekoppeld worden? Zodat er nieuwe mogelijkheden ontstaan om
            Zeeland als gezonde regio op de kaart te zetten? Slimme combinaties tussen zorg en toerisme, zodat zowel
            burgers als toeristen gebruik kunnen maken van betere dienstverlening en producten? In dit thema worden twee
            zeer diverse sectoren met elkaar verbonden. </p>
        <p><img src="{{asset('healthyregion.jpg')}}"> </p>
        </div>
    </div>
@endsection
>>>>>>> 50908fa28a2ca7febff93486fe13e1118d7c339a
