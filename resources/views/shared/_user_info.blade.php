<div class="block">
    <a href="{{ route('users.show', $user->id) }}">
        <img src="{{$user->gravatar()}}" alt="{{$user->name}}">
    </a>
    <a href="{{ route('users.show', $user->id) }}">
        <div>{{$user->name}}</div>
    </a>

    @auth
    @include('users._follow_form')
    @endauth

    <div>
        <a href="{{route('users.followings',$user)}}">
            <span>关注:{{count($user->followings)}}</span>
        </a>
        <a href="{{route('users.followers',$user)}}">
            <span>被关注:{{count($user->followers)}}</span>
        </a>
        <a href="{{route('users.show',$user)}}">
            <span>微博数:{{$user->articles->count()}}</span>
        </a>
    </div>
</div>