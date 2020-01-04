<div class="card">
    <div class="card-content">
        <div class="media">
            <div class="media-left">
                <figure class="image is-48x48">
                    <a href="{{route('users.show',$user)}}">
                        <img src="{{$user->gravatar('48')}}" alt="{{$user->name}}">
                    </a>
                </figure>
            </div>
            <div class="media-content">
                <p class="title is-4">
                    <a href="{{route('users.show',$user)}}">
                        {{$user->name}}
                    </a>
                </p>
                <p class="subtitle is-6">
                    <span>关注:{{count($user->followings)}}</span>
                    <span>被关注:{{count($user->followers)}}</span>
                    <span>微博数:{{$user->articles->count()}}</span>
                </p>
            </div>
        </div>

        <div class="content">
            @if ($user->articles->count()>0)
            {{$user->articles->last()->content}}
            <br>
            <time>{{$user->articles->last()->created_at->diffForHumans()}}</time>
            @else
            没有发布过微博
            @endif
        </div>
    </div>
</div>