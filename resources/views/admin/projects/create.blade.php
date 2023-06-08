@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1> Add a new Project </h1>
    </div>
    <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Project Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="image">Project Cover Image</label>
            <input type="url" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="link">Project Link</label>
            <input type="url" name="link" id="link"class="form-control">
        </div>
        <div class="mb-3">
            <label for="type_id">Type</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value="">Choose a type </option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"> {{ $type->name }} </option>
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
