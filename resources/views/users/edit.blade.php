@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        @include('includes.success', ['key' => 'success'])

                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $user->name ?? old('name') }}" autocomplete="off">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ $user->email ?? old('email') }}" autocomplete="off">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
