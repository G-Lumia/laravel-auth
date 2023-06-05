@extends('layouts.app')

@section('content')
    <h1>{{ $project->name }}</h1>
    <img src="{{ $project->image }}" alt="{{ $project->name }}">
    <a href="{!! $project->link !!}"> {!! $project->link !!} </a>
@endsection
