@extends('layouts.app')

@section('content')
    <h1> Add a new Project </h1>
    <form action="{{ route('admin.projects.store') }}" method="POST">
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
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
