@extends('layouts.app')

@section('content')
<div class="d-flex flex-column">
    <div class="d-flex justify-content-between align-items-center">
        <h1> My Portfolio </h1>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}"> Create a new Project </a>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Link</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->name }}</td>
                    <td><img class="img-thumbnail" style="width:100px" src="{{ $project->image }}" alt="{{ $project->name }}">
                    </td>
                    <td>{{ $project->link }}</td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('admin.projects.show', $project->slug) }}"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project->slug) }}"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="btn btn-danger delete-button" data-item-title="{{ $project->slug }}"> <i
                                        class="fa-solid fa-trash"></i></button>
                                    </form>
                                    @include('partials.popUpDelete')
                                </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $projects->links('vendor.pagination.bootstrap-5') }}
</div>
@endsection
