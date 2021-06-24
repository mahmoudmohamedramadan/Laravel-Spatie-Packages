@if (session()->has($key))
    <button class="btn btn-lg btn-block btn-outline-success mb-2">
        {{ session()->get($key) }}
    </button>
@endif
