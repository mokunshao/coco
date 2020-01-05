<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <a href="{{route('users.show',$user)}}">
          <img src="{{ $user->gravatar('50') }}" alt="Image">
        </a>
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
          <a href="{{route('users.show',$user)}}">
            <strong>{{ $user->name }}</strong>
          </a>
          <small>{{ $article->created_at->diffForHumans() }}</small>
          <br>
          {{ $article->content }}
          <br>
          @can('destroy', $article)
          <form action="{{route('articles.destroy',$article)}}" method="post"
            onsubmit="return confirm('您确定要删除本条微博吗？');">
            @csrf
            @method('DELETE')
            <button class="button is-small is-danger is-outlined">删除</button>
          </form>
          @endcan
        </p>
      </div>
    </div>
  </article>
</div>