<div class="user-info">
    <a href="{{ route('users.show', $user->id) }}">
        <img src="{{$user->gravatar()}}" alt="{{$user->name}}">
    </a>
    <div>{{$user->name}}</div>
</div>