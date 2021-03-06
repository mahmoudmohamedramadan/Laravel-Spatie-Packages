@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Spatie Packages') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mt-3">
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{ route('roles.create') }}" target="_blank">Roles</a>
                                    </li>

                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{ route('posts.create') }}" target="_blank">Posts</a>
                                    </li>

                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{ route('logs_activity.index') }}" target="_blank">Logs Activity</a>
                                    </li>

                                    <li class="nav-item mr-2">
                                        <a class="nav-link" href="{{ route('media_library.create') }}" target="_blank">Media Library</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('feeds.create') }}" target="_blank">Feeds</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
