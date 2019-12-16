<div>{{$user->name}} - {{$user->email}}</div>
<a href="{{ route('users.show', $user->id) }}">
    <img src="{{$user->gravatar()}}" alt="{{$user->name}}">
</a>
