@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-4 d-flex justify-content-between align-items-center">
            <h1>Create new project</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-success">Back to projects list</a>
        </div>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="overview" class="form-label">Overview</label>
                <input type="text" class="form-control @error('overview') is-invalid @enderror" id="overview"
                    name="overview" value="{{ old('overview') }}">
                @error('overview')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="objectives" class="form-label">Objectives</label>
                <input type="text" class="form-control @error('objectives') is-invalid @enderror" id="objectives"
                    name="objectives" value="{{ old('objectives') }}">
                @error('objectives')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="roadmap" class="form-label">Roadmap</label>
                <input type="text" class="form-control @error('roadmap') is-invalid @enderror" id="roadmap"
                    name="roadmap" value="{{ old('roadmap') }}">
                @error('roadmap')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                    name="status" value="{{ old('status') }}">
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option value="">Project type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <input type="text" class="form-control @error('priority') is-invalid @enderror" id="priority"
                    name="priority" value="{{ old('priority') }}">
                @error('priority')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contributors" class="form-label">Contributors</label>
                <input type="text" class="form-control @error('contributors') is-invalid @enderror" id="contributors"
                    name="contributors" value="{{ old('contributors') }}">
                @error('contributors')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="starting_date" class="form-label">Start Date</label>
                <input type="date" class="form-control @error('starting_date') is-invalid @enderror" id="starting_date"
                    name="starting_date" value="{{ old('starting_date') }}">
                @error('starting_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">

                <!-- anteprima immagine upload -->
                <div class="preview">
                    <img id="file-image-preview">
                </div>
                <!-- /anteprima immagine upload -->

                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" value="{{ old('image') }}">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
