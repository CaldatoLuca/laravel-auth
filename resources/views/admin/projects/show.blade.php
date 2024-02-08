@extends('layouts.admin')

@section('title')
    - {{ $project->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 p-4">
                <div class="mb-3">
                    <h3>Title: <span>{{ $project->title }}</span></h3>
                </div>

                <h3>Description:</h3>
                <div class="mb-3">{{ $project->description }}</div>

            </div>
            <div class="col-6 d-flex justify-content-center align-items-center">

                <div id="image-show" class="rounded-3 overflow-hidden">
                    <img src="{{ $project->thumb }}" alt="{{ $project->title }}" class="img-fluid">
                </div>

            </div>
        </div>
    </div>
@endsection
