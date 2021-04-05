@extends('layout')

@section('content')
    <p>filters</p>;
    <form method="POST" action="/showFiltered">
        @csrf
        @foreach($filters as $filter)
            <input class="form-control" id="name" name="filters[]" value="{{ $filter->id }}" type="checkbox">
            <label>{{ $filter->filterName }}</label>
        @endforeach
        <input type="submit" value="submit">
    </form>
    <h1>show page</h1>

    @foreach($DwithoutD as $array)
        @foreach($array as $document)
            <p style="padding-left: 6.5%;">{{ $document->project_name}}</p>
        @endforeach
    @endforeach

@endsection
