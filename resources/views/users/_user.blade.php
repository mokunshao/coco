<div>
    {{-- <img src="{{$user->gravatar()}}" alt="{{$user->name}}"> --}}
    <a href="{{route('users.show',$user)}}">{{$user->name}}</a>
    @can('destroy', $user)
    <form action="{{route('users.destroy',$user)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">删除用户</button>
    </form>
    @endcan
</div>
