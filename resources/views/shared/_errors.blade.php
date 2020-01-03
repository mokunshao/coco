@if (count($errors) > 0)

<div class="notification is-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>

@endif