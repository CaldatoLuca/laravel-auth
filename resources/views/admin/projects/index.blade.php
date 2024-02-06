@extends('layouts.admin')

@section('title')
    Your Projects
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-5">Lista dei progetti</h1>

        <ul class="list-group">
            @foreach ($projects as $project)
                <li class="list-group-item">{{ $project->title }}</li>
            @endforeach
        </ul>
    </div>
@endsection
