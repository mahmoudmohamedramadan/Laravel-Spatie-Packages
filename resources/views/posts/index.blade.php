@extends('layouts.app')

@section('title', 'All Posts')

@section('content')

    @can('create post', User::class)
        <button class="btn btn-primary mb-2 mr-2" style="float: right"
            onclick="window.location='{{ route('posts.create') }}'">Create a Post</button>
    @endcan

    <div class="row">
        <div class="col-md-8">
            <input type="search" name="search" placeholder="Type the id of the user or title of the post here..."
                class="form-control">
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Tags</th>
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
                    <td>
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@push('scripts')

    <script>
        $(document).ready(() => {
            $('input[name=search]').blur(() => {
                var search = $('input[name=search]').val();
                $.ajax({
                    type: 'GET',
                    url: `/users/posts/${search}`,
                    success: function(data) {
                        $('tbody').html(data);
                    },
                    error: function(ERROR) {
                        console.error(ERROR);
                    }
                });
            });
        });
    </script>

@endpush
