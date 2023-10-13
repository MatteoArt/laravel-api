@extends('layouts.app')

@section('content')
    <div class="card m-auto my-4" style="width: 22rem;">
        <img src="{{ $project->img }}" class="card-img-top" alt="project img">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <h5 class="card-title"> {{ $project->title }} </h5>
                <span>ID: {{ $project->id }} </span>
            </div>

            @if ($project->type_id)
                <div>
                    <span class="text-info">{{ $project->type->name }}</span>
                </div>
            @endif

            <p class="card-text">
                {{ $project->description }}
            </p>
            <div class="mt-2 mb-3">
                <div>Linguaggi: </div>
                @foreach ($project->technologies as $technology)
                     <span class="d-inline-block text-success-emphasis 
                     fw-semibold me-2">{{ $technology->name }}</span>
                @endforeach
            </div>
            <a href="{{ $project->repository }}" class="btn btn-primary me-2" target="_blank">Vai alla repository</a>
            @if ($project->page_project)
                <a href="{{ $project->page_project }}" target="_blank">Pagina del progetto</a>
            @endif
        </div>
    </div>
@endsection
