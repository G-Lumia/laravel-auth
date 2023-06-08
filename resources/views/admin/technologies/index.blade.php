@extends('layouts.admin')

@section('content')
    <h1> Technologies list </h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <th scope="row">
                        {{ $technology->id }}
                    </th>
                    <td>
                        <img src="{{ $technology->image }}" alt="{{ $technology->name }}">
                    </td>
                    <td>
                        {{ $technology->name }}
                    </td>
                    <td>
                        {{ $technology->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('admin.types.show', $technology->slug) }}">Show</a>
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
