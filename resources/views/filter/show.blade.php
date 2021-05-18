@extends('layout')

@section('content')

    <p>Filters</p>

    <br>

    <form method="POST" action="/showFiltered">
        @csrf
        @foreach($filters as $filter)
            <input class="form-control" id="name" name="filters[]" value="{{ $filter->id }}" type="checkbox">
            <label>{{ $filter->filterName }}</label>
        @endforeach
        <input type="submit" value="submit">
    </form>

    <br>

    <h1>Show Page</h1>

    <br>

    @foreach($z as $document)
        <p>{{ $document->project_name }}</p>
    @endforeach
@endsection
