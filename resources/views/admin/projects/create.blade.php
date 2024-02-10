@extends('layouts.admin')

@section('title')
    Create
@endsection

@section('content')
    <div id="create" class="container h-100">
        <div class="row h-100">
            <div class="col-12 d-flex  align-items-center justify-content-start">
                <h1 class="mb-5">New Project</h1>
            </div>


            <div class="col-12">
                <form action="{{ route('admin.projects.store') }}" method="POST" class="h-100" enctype="multipart/form-data">

                    {{-- token di laravel per controllo --}}
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            {{-- titolo --}}
                            <div class="mb-3">
                                <label for="project-title" class="form-label">Project Title</label>
                                <div class="input-group">

                                    {{-- input --}}
                                    <input type="text" class="my-input form-control @error('title') is-invalid @enderror"
                                        id="project-title" aria-describedby="basic-addon3 basic-addon4" name="title"
                                        value="{{ old('title') }}" required>
                                </div>

                                {{-- errore titolo --}}
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- descrizione --}}
                            <div class="mb-3">
                                <label for="project-description" class="form-label">Project Description</label>
                                <div class="input-group">
                                    {{-- input --}}
                                    <textarea class="my-input form-control @error('description') is-invalid @enderror" cols="30" rows="10"
                                        id="project-description" aria-label="With textarea" name="description">{{ old('description') }}</textarea>
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
                            {{--  immagine --}}
                            <div class="mb-3">
                                <label for="project-img" class="form-label">Upload image</label>
                                {{-- input --}}
                                <input id="upload-image" class="my-input form-control @error('thumb') is-invalid @enderror"
                                    type="file" id="project-img" name="thumb" value="{{ old('thumb') }}">

                                {{-- errore url immagine --}}
                                @error('thumb')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- mostro  l'immagine del progetto se esiste, altrimenti una placeholder --}}
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                @if (0 == 0)
                                    <div class="mb-2">Selected Image</div>
                                    <div id="image-preview" class="rounded-2 overflow-hidden image-show">
                                        <img src="" alt="">
                                    </div>
                                @else
                                    <div class="mb-2">No Image Selected</div>
                                    <div
                                        class="image-placeholder d-flex justify-content-center align-items-center rounded-2 bg-danger">
                                        <i class="fa-solid fa-x"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
