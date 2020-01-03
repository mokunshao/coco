@foreach (['danger', 'warning', 'success', 'info'] as $key)

@if(session()->has($key))

<div class="notification is-{{$key}}">
    {{ session()->get($key) }}
</div>

@endif

@endforeach