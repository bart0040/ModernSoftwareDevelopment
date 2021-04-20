@extends('layout')

@section('content')
    <p>filters</p>
    <form method="POST" action="/showFiltered">
        @csrf
    @foreach($filters as $filter)
    <input class="form-control" id="name" name="filters[]" value="{{ $filter->id }}" type="checkbox">
    <label>{{ $filter->filterName }}</label>
        @endforeach
        <input type="submit" value="submit">
    </form>

    <h1>Alle Documenten</h1>
    @foreach($documenten as $document)
    <p>{{ $document->project_name }}</p>
    @endforeach

@endsection
