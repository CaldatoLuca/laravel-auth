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
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td><a href="{{ route('admin.projects.show', $project->id) }}">View Details</a></td>
                    <td><a href="{{ route('admin.projects.edit', $project->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
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
