@foreach (['danger', 'warning', 'success', 'info'] as $key)

@if(session()->has($key))

<div class="flash-message flash-message-{{$key}}">
    {{ session()->get($key) }}
</div>

@endif

@endforeach
