@extends('layouts.admin')

@section('title')
    Edit - {{ $project->title }}
@endsection

@section('content')
    <div class="container">
        <h2>Modifica: {{ $project->title }}</h2>

        {{-- errori --}}
        @include('partials.errors')


        <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="h-100"
            enctype="multipart/form-data">

            {{-- token di laravel per controllo --}}
            @csrf

            {{-- aggiungiamo il metodo put --}}
            @method('PUT')

            {{-- titolo --}}
            <div class="mb-3">
                <label for="project-title" class="form-label">Project Title</label>
                <div class="input-group">

                    {{-- input --}}
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="project-title"
                        aria-describedby="basic-addon3 basic-addon4" name="title"
                        value="{{ old('title', $project->title) }}" required>
                </div>

                {{-- errore titolo --}}
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{--  immagine --}}
            <div class="mb-3">
                <label for="project-img" class="form-label">Upload image</label>
                {{-- input --}}
                <input class="form-control @error('thumb') is-invalid @enderror" type="file" id="project-img"
                    name="thumb" value="{{ old('thumb') }} value="{{ old('thumb', $project->thumb) }}">
            </div>

            {{-- errore url immagine --}}
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-text" id="basic-addon4">Insert all the url</div>


            {{-- descrizione --}}
            <div class="mb-3">
                <label for="project-description" class="form-label">project Description</label>
                <div class="input-group">
                    {{-- input --}}
                    <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"
                        id="project-description" aria-label="With textarea" name="description">{{ old('description', $project->description) }}</textarea>
                </div>
                {{-- errore descrizione --}}
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- bottone di invio --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <img src="{{ asset('storage/' . $project->thumb) }}" alt="{{ $project->slug }}" class="img-fluid">

    </div>
@endsection
