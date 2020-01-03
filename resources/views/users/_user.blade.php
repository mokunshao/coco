{{--  <div class="block">
    <a href="{{route('users.show',$user)}}">
<img src="{{$user->gravatar()}}" alt="{{$user->name}}">
</a>
<a href="{{route('users.show',$user)}}">{{$user->name}}</a>

@can('destroy', $user)
<form action="{{route('users.destroy',$user)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">删除用户</button>
</form>
@endcan
</div> --}}

<div class="card">
    <div class="card-content">
        <div class="media">
            <div class="media-left">
                <figure class="image is-48x48">
                    <img src="{{$user->gravatar('48')}}" alt="{{$user->name}}">
                </figure>
            </div>
            <div class="media-content">
                <p class="title is-4">{{$user->name}}</p>
            </div>
        </div>

        <div class="content">
            @if ($user->articles->count()>0)
            {{$user->articles->last()->content}}
            <br>
            <time datetime="2016-1-1">{{$user->articles->last()->created_at->diffForHumans()}}</time>
            @else
            没有发布过微博
            @endif
        </div>
    </div>
</div>