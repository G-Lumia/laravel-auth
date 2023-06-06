@extends('layouts.app')

@section('content')
        <div class="d-flex justify-content-between align-items-center mt-5">
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
        <div class="row justify-content-between gap-5">
            @foreach ($projects as $project)
                <div class="text-center card col-xs-12 col-lg-3 py-3">
                    <div class="card-title">
                        <h4>
                            {{ $project->name }}
                        </h4>
                    </div>
                    <div class="card-body mt-4">
                        <img class="card-img-top" style="width:150px" src="{{ $project->image }}" alt="{{ $project->name }}">
                        <div class="mt-3">
                            <a href="{{ $project->link }}"> Github Page </a>
                        </div>
                    </div>
                    <div class="card-footer py-3">
                        <div class="d-flex gap-3 justify-content-center align-items-center">
                            <a href="{{ route('admin.projects.show', $project->slug) }}"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project->slug) }}"><i class="fa-solid fa-pencil"></i></a>
                            @include('partials.popUpDelete')
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#deleteProject" data-item-title="{{ $project->slug }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
        {{ $projects->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
