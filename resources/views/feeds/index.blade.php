@extends('layouts.app')

@section('title', 'All Feeds')

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Summary</th>
                <th scope="col">Link</th>
                <th scope="col">Author Name</th>
                <th scope="col">Author Email</th>
                <th scope="col">Period</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeds as $feed)
                <tr>
                    <td>{{ $feed->id }}</td>
                    <td>
                        <a href="{{ route('feeds.edit', $feed->id) }}">{{ $feed->title }}</a>
                    </td>
                    <td>{{ $feed->summary }}</td>
                    <td>
                        <a href="{{ $feed->link }}" target="_blank">{{ $feed->link }}</a>
                    </td>
                    <td>{{ $feed->author_name }}</td>
                    <td>{{ $feed->author_email }}</td>
                    <td>
                        {{ \Spatie\Period\Period::make($feed->created_at, $feed->updated_at, \Spatie\Period\Precision::HOUR())->length() }}
                        HOUR
                    </td>
                    <td>
                        <form action="{{ route('feeds.destroy', $feed->id) }}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
