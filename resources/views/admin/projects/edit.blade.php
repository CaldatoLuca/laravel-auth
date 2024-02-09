@extends('layouts.admin')

@section('title')
    Edit - {{ $project->title }}
@endsection

@section('content')
    <div class="container h-100">

        <div class="row justify-content-between h-100">
            {{-- edit titolo --}}
            <div class="col-12 d-flex  align-items-center justify-content-start">
                <h1>Edit: {{ $project->title }}</h1>
            </div>

            {{-- form --}}
            <div class="col-4 pe-3 d-flex justify-content-center flex-column ">


                {{-- errori --}}
                {{-- @include('partials.errors') --}}


                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">

                    {{-- token di laravel per controllo --}}
                    @csrf

                    {{-- aggiungiamo il metodo put --}}
                    @method('PUT')

                    {{-- titolo --}}
                    <div class="mb-3">
                        <label for="project-title" class="form-label">Title</label>
                        <div class="input-group">

                            {{-- input --}}
                            <input type="text" class="my-input form-control @error('title') is-invalid @enderror"
                                id="project-title" aria-describedby="basic-addon3 basic-addon4" name="title"
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
                        <input class="my-input form-control @error('thumb') is-invalid @enderror" type="file"
                            id="project-img" name="thumb"
                            value="{{ old('thumb') }} value="{{ old('thumb', $project->thumb) }}">
                    </div>

                    {{-- errore url immagine --}}
                    @error('thumb')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- descrizione --}}
                    <div class="mb-3">
                        <label for="project-description" class="form-label">Description</label>
                        <div class="input-group">
                            {{-- input --}}
                            <textarea class="my-input form-control @error('description') is-invalid @enderror" cols="30" rows="10"
                                id="project-description" aria-label="With textarea" name="description">{{ old('description', $project->description) }}</textarea>
                        </div>
                        {{-- errore descrizione --}}
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- bottone di invio --}}
                    <button type="submit" class="btn btn-form">Submit</button>
                </form>
            </div>

            {{-- immagine --}}
            <div class="col-8 d-flex justify-content-center align-items-center">

                {{-- mostro  l'immagine del progetto se esiste, altrimenti una placeholder --}}
                @if ($project->thumb)
                    <div class="rounded-2 overflow-hidden image-show">
                        <img src="{{ asset('storage/' . $project->thumb) }}" alt="{{ $project->slug }}">
                    </div>
                @else
                    <div class="image-placeholder d-flex justify-content-center align-items-center rounded-2 bg-danger">
                        <i class="fa-solid fa-x"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
