@extends('layouts.app')

@if (request()->routeIs('roles.create'))
    @section('title', 'Create Role')
    @else
    @section('title', 'Edit Role')
    @endif

    @section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            @if (request()->routeIs('roles.create'))
                                Create Role
                            @else
                                Edit Role
                            @endif
                        </div>

                        <div class="card-body">
                            @include('includes.success', ['key' => 'success'])

                            @if (request()->routeIs('roles.create'))
                                <form action="{{ route('roles.store') }}" method="POST">
                                @else
                                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                        @method('patch')
                                        <input type="hidden" name="id" value="{{ $role->id }}">
                            @endif
                            @csrf

                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name ?? old('name') }}"
                                    autocomplete="off">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            @if (request()->routeIs('roles.edit'))
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#role_modal">Delete</button>
                                <a href="{{ route('roles.permissions.create', $role->id) }}" class="mr-2">Create
                                    Permissions</a>
                            @endif

                            <a href="{{ route('roles.index') }}">Show All Roles</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (request()->routeIs('roles.edit'))
            <div class="modal fade" id="role_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                            <h5>Are you sure from deleting this role?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    @endsection
