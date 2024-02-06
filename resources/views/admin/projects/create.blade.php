@extends('layouts.admin')

@section('title')
    Create
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-5">Inserisci un nuovo progetto</h1>

        {{-- errori --}}
        @if ($errors->any())
            <h3 class="text-danger">Something went wrong</h3>
            <div class="alert alert-danger">
                <ul class="list-group mb-0 ">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item bg-danger-subtle border-0">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.projects.store') }}" method="POST" class="h-100">

            {{-- token di laravel per controllo --}}
            @csrf

            {{-- titolo --}}
            <div class="mb-3">
                <label for="project-title" class="form-label">Project Title</label>
                <div class="input-group">

                    {{-- input --}}
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="project-title"
                        aria-describedby="basic-addon3 basic-addon4" name="title" value="{{ old('title') }}" required>
                </div>

                {{-- errore titolo --}}
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- url immagine --}}
            <div class="mb-3">
                <label for="project-img" class="form-label">Project Image Url</label>
                <div class="input-group">

                    {{-- input --}}
                    <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="project-img"
                        aria-describedby="basic-addon3 basic-addon4" name="thumb" value="{{ old('thumb') }}">
                </div>

                {{-- errore url immagine --}}
                @error('thumb')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-text" id="basic-addon4">Insert all the url</div>
            </div>

            {{-- descrizione --}}
            <div class="mb-3">
                <label for="project-description" class="form-label">project Description</label>
                <div class="input-group">
                    {{-- input --}}
                    <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"
                        id="project-description" aria-label="With textarea" name="description">{{ old('description') }}</textarea>
                </div>
                {{-- errore descrizione --}}
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- bottone di invio --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
