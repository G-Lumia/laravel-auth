@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 rounded-3">
    <div class="container py-5">
        <div class="text-center">
            <h1 class="display-5 fw-bold text-center">
                Hi! My name is
            </h1>
            <img src="/images/glumia-logos_black.png" alt="" width="400">
        </div>
        <div class="text-center mt-4">
            <p>
                and this is my portfolio
            </p>
        </div>
        @guest
            <div class="homepage d-flex justify-content-center gap-3">
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                <div class="homepage d-flex justify-content-center gap-3">
                    <a  href="{{ url('admin/projects') }}">{{__('My Projects')}}</a>
                    <a  href="{{ url('admin/projects/create') }}">{{__('New Project')}}</a>
                </div>
            </div>
        @endguest
    </div>
</div>
@endsection
