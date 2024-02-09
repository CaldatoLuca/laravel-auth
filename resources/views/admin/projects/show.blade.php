@extends('layouts.admin')

@section('title')
    - {{ $project->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            {{-- info --}}
            <div class="col-6 p-4">
                <div class="mb-3">
                    <h3>Title: <span>{{ $project->title }}</span></h3>
                </div>

                <h3>Description:</h3>
                <div class="mb-3">{{ $project->description }}</div>

            </div>

            {{-- immagine --}}
            <div class="col-6 d-flex justify-content-center align-items-center">

                {{-- mostro  l'immagine del progetto se esiste, altrimenti una placeholder --}}
                @if ($project->thumb)
                    <div id="image-show" class="rounded-3 overflow-hidden">
                        <img src="{{ asset('storage/' . $project->thumb) }}" alt="{{ $project->slug }}" class="img-fluid">
                    </div>
                @else
                    <div>No image</div>
                @endif


            </div>
        </div>
    </div>
@endsection
