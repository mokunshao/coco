<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <a href="{{route('users.show',$article->user)}}">
          <img src="{{ $article->user->gravatar('50') }}" alt="Image">
        </a>
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
          <a href="{{route('users.show',$article->user)}}">
            <strong>{{ $article->user->name }}</strong>
          </a>
          <small>{{ $article->created_at->diffForHumans() }}</small>
          <br>
          {{ $article->content }}
          <br>
          <div class="is-flex is-marginless">
            <a href="{{route('articles.show',$article)}}">
              <button class="button is-small">详情</button>
            </a>
            <form action="{{route('likes.store')}}" method="post">
              @csrf
              <input type="hidden" name="article_id" value="{{$article->id}}">
              @if(Auth::check())
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              @endif
              <button class="button is-small {{$article->isLike()?'is-primary':''}}">👍{{$article->likes->count()}}
              </button>
            </form>
            @can('destroy', $article)
            <form action="{{route('articles.destroy',$article)}}" method="post"
              onsubmit="return confirm('您确定要删除本条微博吗？');">
              @csrf
              @method('DELETE')
              <button class="button is-small is-danger is-outlined">删除</button>
            </form>
            @endcan
          </div>
        </p>
      </div>
    </div>
  </article>
</div>