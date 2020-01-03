<div class="block">
    <a href="{{ route('users.show', $user->id) }}">
        <img src="{{$user->gravatar()}}" alt="{{$user->name}}">
    </a>
    <a href="{{ route('users.show', $user->id) }}">
        <div>{{$user->name}}</div>
    </a>
    <div>
        <div>关注：？</div>
        <div>被关注：？</div>
        <div>微博数：？</div>
    </div>
</div>