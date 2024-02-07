@extends('layouts.admin')

@section('title')
    Your Projects
@endsection

@section('content')
    <h2>Your project list</h2>

    {{-- avviso creazione project --}}
    @if (session('message_create'))
        <div class="alert alert-success">
            {{ session('message_create') }}
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    @endif

    {{-- avviso cancellazione project --}}
    @if (session('message_delete'))
        <div class="alert alert-danger">
            {{ session('message_delete') }}
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td><a href="{{ route('admin.projects.show', $project) }}">View Details</a></td>
                    <td><a href="{{ route('admin.projects.edit', $project) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                            @csrf

                            {{-- aggiungo il metodo delete --}}
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
