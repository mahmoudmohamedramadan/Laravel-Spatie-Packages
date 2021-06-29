@extends('layouts.app')

@section('title', 'All Media')

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Extension</th>
                <th scope="col">Size</th>
                <th scope="col">Url</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allMedia as $media)
                <tr>
                    <td>{{ $media->id }}</td>
                    <td>{{ $media->name }}</td>
                    {{-- <td>{{ $media->mime_type }}</td> --}}
                    <td>{{ $media->extension }}</td>
                    {{-- `$media->human_readable_size` equals to `$media->size/1000. 'KB'` --}}
                    <td>{{ $media->human_readable_size }}</td>
                    <td>{{ $media->getUrl() }}</td>
                    <td>
                        <form action="{{ route('media_library.destroy', $media->id) }}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-warning"
                                onclick="window.location='?id={{ $loop->index + 1 }}'">Download</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
