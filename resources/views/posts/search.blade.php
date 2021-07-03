@foreach ($posts as $post)
<tr>
    <td>{{ $post->searchable->id }}</td>
    <td>{{ $post->searchable->user->name }}</td>
    <td>
        <a href="{{ $post->url }}">{{ $post->searchable->title }}</a>
    </td>
    <td>{{ $post->searchable->body }}</td>
    <td>
        @foreach ($post->searchable->tags as $tag)
            {{ $tag->name }}
        @endforeach
    </td>
</tr>
@endforeach
