@extends('layouts.admin')
@section('content')
    <h1>Type</h1>
    <p>{{ $category->name }}</p>
    @foreach ($projects as $project)
        <p>{{ $project->name }}</p>
    @endforeach
@endsection
