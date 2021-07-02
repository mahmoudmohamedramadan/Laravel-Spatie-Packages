@extends('layouts.app')

@section('title', request()->routeIs('roles.permissions.create') ? 'Create Permission' : 'Edit Permission')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if (request()->routeIs('roles.create'))
                            Create Permission
                        @else
                            Edit Permission
                        @endif
                    </div>

                    <div class="card-body">
                        @include('includes.success', ['key' => 'success'])

                        <form
                            action="{{ request()->routeIs('roles.permissions.create') ? route('roles.permissions.store', $role->id) : route('roles.permissions.update', ['role' => $role->id, 'permission' => $permission->id]) }}"
                            method="POST">
                            @if (request()->routeIs('roles.permissions.edit'))
                                @method('patch')
                                <input type="hidden" name="id" value="{{ $permission->id }}">
                            @endif
                            @csrf

                            <div class="form-group">
                                <label>Permission</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $permission->name ?? old('name') }}" autocomplete="off">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            @if (request()->routeIs('roles.permissions.edit'))
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#permissions_modal">Delete</button>
                            @endif

                            <a href="{{ route('roles.permissions.index', $role->id) }}">Show All
                                Permissions</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (request()->routeIs('roles.permissions.edit'))
        <div class="modal fade" id="permissions_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                        <h5>Are you sure from deleting this permission?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form
                            action="{{ route('roles.permissions.destroy', ['role' => $role->id, 'permission' => $permission->id]) }}"
                            method="POST">
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
