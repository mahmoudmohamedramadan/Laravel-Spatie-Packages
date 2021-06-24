@extends('layouts.app')

@section('title', 'All Roles')

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userRoles as $userRole)
                <tr>
                    <td>{{ $userRole->id }}</td>
                    <td>{{ $userRole->name }}</td>
                    <td>
                        @foreach ($userRole->roles as $role)
                            <div>
                                <a href="{{ route('roles.edit', $role->id) }}">{{ $role->name }}</a>
                            </div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
