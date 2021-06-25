@extends('layouts.app')

@section('title', 'All Posts')

@section('content')

    @can('create post', User::class)
        <button class="btn btn-primary mb-2 mr-2" style="float: right" onclick="window.location='{{ route('posts.create') }}'">Create a Post</button>
    @endcan

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a>
                    </td>
                    <td>{{ $post->body }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
