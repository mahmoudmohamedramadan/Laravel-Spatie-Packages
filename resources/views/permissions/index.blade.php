@extends('layouts.app')

@section('title', 'All Permissions')

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rolePermissions as $rolePermission)
                <tr>
                    <td>{{ $rolePermission->id }}</td>
                    <td>{{ $rolePermission->name }}</td>
                    <td>
                        @foreach ($rolePermission->permissions as $permission)
                            <div>
                                <a
                                    href="{{ route('roles.permissions.edit', ['role' => $rolePermission->id, 'permission' => $permission->id]) }}">{{ $permission->name }}</a>
                            </div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
