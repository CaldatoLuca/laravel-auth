@extends('layouts.admin')

@section('title')
    Your Projects
@endsection

@section('content')
    <h2>Your project list</h2>

    {{-- avviso creazione project --}}
    @if (session('message_create'))
        <div class="toast align-items-center text-bg-success border-0 fade show" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('message_create') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    {{-- avviso cancellazione project --}}
    @if (session('message_delete'))
        <div class="toast align-items-center text-bg-warning border-0 fade show" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('message_delete') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
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
