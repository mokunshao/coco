@foreach (['danger', 'warning', 'success', 'info'] as $msg)

@if(session()->has($msg))

<div class="flash-message flash-message-{{$msg}}">
    {{ session()->get($msg) }}
</div>

@endif

@endforeach
