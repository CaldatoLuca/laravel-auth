@extends('layouts.admin')

@section('title')
    Your Projects
@endsection

@section('content')
    <h2>Your project list</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td><a href="{{ route('admin.projects.show', $project->id) }}">View Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
