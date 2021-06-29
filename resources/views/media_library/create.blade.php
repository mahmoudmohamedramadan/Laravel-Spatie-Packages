@extends('layouts.app')

@section('title', 'Create Media')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Media</div>
                    <div class="card-body">
                        @include('includes.success', ['key' => 'success'])

                        <form action="{{ route('media_library.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>{{ __('Collection Name') }}</label>
                                <input type="text" class="form-control" name="collection_name"
                                    value="{{ old('collection_name') }}" autocomplete="off">
                                @error('collection_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('Image') }}</label>
                                <div class="col-md-12">
                                    <input id="image" type="file" class="custom-file" name="image">
                                    <label class="custom-file-label" for="image">{{ __('Choose file') }}</label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
