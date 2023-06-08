@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="text-center">
        <h1> Edit the project </h1>
    </div>
    <form class="mt-5" action="{{ route('admin.projects.update' , $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Project Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name' , $project->name) }}" >
        </div>
        <div class="mb-3">
            <label for="image">Project Cover Image</label>
            <input type="url" class="form-control" name="image" id="image" value="{{ old('image', $project->image) }}">

        </div>
        <div class="mb-3">
            <label for="link">Project Link</label>
            <input type="url" name="link" id="link"class="form-control" value="{{ old('link' , $project->link) }}">
        </div>
        <div class="mb-3">
            <label for="type_id">Type</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value="">Choose a type </option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <p>Technologies:</p>
            @foreach ($technologies as $technology)
                <div>
                    <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input"
                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label for="" class="form-check-label">{{ $technology->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form>
</div>
@endsection
