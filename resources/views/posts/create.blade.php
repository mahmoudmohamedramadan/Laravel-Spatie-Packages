@extends('layouts.app')

@if (request()->routeIs('posts.create'))
    @section('title', 'Create Post')
    @else
    @section('title', 'Edit Post')
    @endif

    @section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            @if (request()->routeIs('posts.create'))
                                Create Post
                            @else
                                Edit Post
                            @endif
                        </div>
                        <div class="card-body">
                            @include('includes.success', ['key' => 'success'])

                            @if (request()->routeIs('posts.create'))
                                <form action="{{ route('posts.store') }}" method="POST">
                                @else
                                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                                        @method('patch')
                                        <input type="hidden" name="id" value="{{ $post->id }}">
                            @endif
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ $post->title ?? old('title') }}" autocomplete="off">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Body</label>
                                <textarea name="body" class="form-control"
                                    style="height: 150px;min-height: 100px;max-height: 150px">{{ $post->body ?? old('body') }}</textarea>
                                @error('body')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tag</label>
                                <input type="text" class="form-control" name="tags" data-role="tagsinput"
                                    value="{{ $post->tags ?? old('tags') }}" autocomplete="off">
                                <small class="form-text text-muted">You can add multiple tags separated comma (,)</small>
                                @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- here, we'll check if the authenticated user can create a new post or NOT --}}
                            @can('create post', User::class)
                                <button type="submit" class="btn btn-primary">Submit</button>
                            @endcan
                            @if (request()->routeIs('posts.edit'))
                                @if (auth()->user()->hasRole('posts'))
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#post_modal">Delete</button>
                                @endif
                            @endif

                            <a href="{{ route('posts.index') }}">Show All Posts</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (request()->routeIs('posts.edit'))
            <div class="modal fade" id="post_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Are you sure from deleting this post?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    @stop
