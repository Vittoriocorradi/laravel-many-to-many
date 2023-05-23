@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4 d-flex justify-content-between align-items-center">
        <h1>Edit project</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-success">Back to projects list</a>
    </div>

    <form action="{{ route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="overview" class="form-label">Overview</label>
            <input type="text" class="form-control @error('overview') is-invalid @enderror" id="overview" name="overview" value="{{ old('overview', $project->overview) }}">
            @error('overview')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="objectives" class="form-label">Objectives</label>
            <input type="text" class="form-control @error('objectives') is-invalid @enderror" id="objectives" name="objectives" value="{{ old('objectives', $project->objectives) }}">
            @error('objectives')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="roadmap" class="form-label">Roadmap</label>
            <input type="text" class="form-control @error('roadmap') is-invalid @enderror" id="roadmap" name="roadmap" value="{{ old('roadmap', $project->roadmap) }}">
            @error('roadmap')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status', $project->status) }}">
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <input type="text" class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority" value="{{ old('priority', $project->priority) }}">
            @error('priority')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contributors" class="form-label">Contributors</label>
            <input type="text" class="form-control @error('contributors') is-invalid @enderror" id="contributors" name="contributors" value="{{ old('contributors', $project->contributors) }}">
            @error('contributors')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="starting_date" class="form-label">Start Date</label>
            <input type="date" class="form-control @error('starting_date') is-invalid @enderror" id="starting_date" name="starting_date" value="{{ old('starting_date', $project->starting_date) }}">
            @error('starting_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="finish_date" class="form-label">Finish Date</label>
            <input type="date" class="form-control @error('finish_date') is-invalid @enderror" id="finish_date" name="finish_date" value="{{ old('finish_date', $project->finish_date) }}">
            @error('finish_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <div>Completed:</div>
            <label for="is_finished" class="form-label">No</label>
            <input type="radio" id="is_finished" name="is_finished" value="0" {{ ($project->is_finished === 0) ? "checked" : "" }}>
            <label for="is_finished" class="form-label">Yes</label>
            <input type="radio" id="is_finished" name="is_finished" value="1" {{ ($project->is_finished === 1) ? "checked" : "" }}>
            @error('is_finished')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">

            <!-- anteprima immagine upload -->
            <div class="preview">
                <img id="file-image-preview" @if($project->image) src="{{ asset('storage/' . $project->image) }}" @endif>
            </div>
            <!-- /anteprima immagine upload -->

            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
