@extends('layouts.admin')

@section('content')
    <h1>Lista dei progetti</h1>

    <ul>
        @foreach ($projects as $project)
            <li>{{ $project->title }}</li>
        @endforeach
    </ul>
@endsection
