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
        <div class="mt-4">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form>
</div>
@endsection
