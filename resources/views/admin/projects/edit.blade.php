@extends('layouts.admin')

@section('title')
    Edit - {{ $project->title }}
@endsection

@section('content')
    <div id="edit" class="container h-100">
        <div class="row h-100">
            <div class="col-12 d-flex  align-items-center justify-content-start">
                <h1>Edit: {{ $project->title }}</h1>
            </div>

            <div class="col-12">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">

                    {{-- token di laravel per controllo --}}
                    @csrf

                    {{-- aggiungiamo il metodo put --}}
                    @method('PUT')

                    <div class="row">
                        <div class="col-6">
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
                        </div>

                        <div class="col-6">
                            {{--  immagine input --}}
                            <div class="mb-3">
                                <label for="project-img-edit" class="form-label">Upload image</label>
                                {{-- input --}}
                                <input class="my-input form-control @error('thumb') is-invalid @enderror" type="file"
                                    id="project-img-edit" name="thumb"
                                    value="{{ old('thumb') }} value="{{ old('thumb', $project->thumb) }}">
                            </div>
                            {{-- errore url immagine --}}
                            @error('thumb')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- mostro  l'immagine del progetto se esiste, altrimenti una placeholder --}}
                            <div class="d-flex justify-content-center align-items-center flex-column">

                                <div class="mb-2">Image Preview</div>
                                <div class="image-show d-flex justify-content-center align-items-center ">
                                    <img class="image rounded-2 " src="{{ asset('storage/' . $project->thumb) }}"
                                        alt="{{ $project->slug }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
