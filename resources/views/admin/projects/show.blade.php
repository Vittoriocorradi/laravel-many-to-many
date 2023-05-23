@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-4 d-flex justify-content-between align-items-center">
            <h1>{{ $project->title }}</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-success">Back to My Projects</a>
        </div>
        @if($project->image)
        <div>
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        </div>
        @endif
        <p>{{ $project->overview }}</p>
        <small>Started: {{ $project->starting_date }}</small>
        <br>
        @if ($project->is_finished)
            <small>Finished: {{ $project->finish_date }}</small>
        @endif
    </div>
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div>Objective: {{ $project->objectives }}</div>
                @if($project->roadmap)
                <div>Roadmap: {{ $project->roadmap }}</div>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 row justify-content-between">
                <div class="col-4">
                    <div>Status: {{ $project->status }}</div>
                    <div>Type: {{ $project->type?->name ?: 'No type' }}</div>
                    <div>Priority: {{ $project->priority }}</div>
                </div>
                @if ($project->contributors > 0)
                <div class="col-4 d-flex justify-content-between gap-2">
                    <div>Contributors: </div>
                    <div>{{ $project->contributors }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection