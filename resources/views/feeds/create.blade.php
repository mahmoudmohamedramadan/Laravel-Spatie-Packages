@extends('layouts.app')

@section('title', request()->routeIs('feeds.create') ? 'Create Feed' : 'Edit Feed')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Feed</div>
                    <div class="card-body">
                        @include('includes.success', ['key' => 'success'])

                        <form
                            action="{{ request()->routeIs('feeds.create') ? route('feeds.store') : route('feeds.update', $feed->id) }}"
                            method="POST">
                            @if (request()->routeIs('feeds.edit'))
                                @method('patch')
                                <input type="hidden" name="id" value="{{ $feed->id }}">
                            @endif
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ $feed->title ?? old('title') }}" autocomplete="off">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Summary</label>
                                <textarea name="summary" class="form-control"
                                    style="height: 150px;min-height: 100px;max-height: 150px">{{ $feed->summary ?? old('summary') }}</textarea>
                                @error('summary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Link</label>
                                <input type="link" class="form-control" name="link"
                                    value="{{ $feed->link ?? old('link') }}" autocomplete="off">
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- > NOTE that when you add `disabled` property to the element it's value does NOT emitted, whereas in case of `readonly` attribute the value will be emitted --}}
                            <div class="form-group">
                                <label>Author Name</label>
                                <input type="text" class="form-control" name="author_name"
                                    value="{{ auth()->user()->name }}" readonly>
                                @error('author_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Author Email</label>
                                <input type="email" class="form-control" name="author_email"
                                    value="{{ auth()->user()->email }}" readonly>
                                @error('author_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('feeds.index') }}">Show All Feeds</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
