@extends('layout')

@section('content')
    <table class="table">
        <thead>

        <a href="/documents/create" class="button is-primary">Add new document</a>
        <tr>
            <td>ID</td>
            <td>Project Name</td>
            <td>Document Name</td>
            <td>Author</td>
            <td>Document</td>
            <td>Keywords</td>
            <td>Language</td>
            <td>Created at</td>
            <td>Updated at</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
            <tr>
                <td>{{ $document->id }}</td>
                <td>{{ $document->project_name }}</td>
                <td>{{ $document->document_name }}</td>
                <td>{{ $document->author }}</td>
                <td>{{ $document->document }}</td>
                <td>{{ $document->keywords }}</td>
                <td>{{ $document->language }}</td>
                <td>{{ $document->created_at }}</td>
                <td>{{ $document->updated_at }}</td>
                <td><a href="{{ route('documents.edit', $document->id) }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
