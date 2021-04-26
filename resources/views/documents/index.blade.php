@extends('layout')

@section('content')
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Project Name</th>
            <th>Document Name</th>
            <th>Author</th>
            <th>Document</th>
            <th>Keywords</th>
            <th>Language</th>
            <th>Created at</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
            <tr>
                <td>{{ $document->project_name }}</td>
                <td>{{ $document->document_name }}</td>
                <td>{{ $document->author }}</td>
                <td>{{ $document->document }}</td>
                <td>{{ $document->keywords }}</td>
                <td>{{ $document->language }}</td>
                <td>{{ $document->updated_at }}</td>
                <td><a href="{{ route('documents.edit', $document->id) }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>

    <a href="/documents/create">
    <button class="button" id="addDocBut"> Add new document </button>
    </a>
@endsection
