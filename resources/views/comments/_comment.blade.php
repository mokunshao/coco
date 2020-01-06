<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <a href="{{route('users.show',$comment->user)}}">
          <img src="{{ $comment->user->gravatar('50') }}" alt="Image">
        </a>
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
          <a href="{{route('users.show',$comment->user)}}">
            <strong>{{ $comment->user->name }}</strong>
          </a>
          <small>{{ $comment->created_at->diffForHumans() }}</small>
          <br>
          {{ $comment->content }}
          <br>
          <div class="is-flex is-marginless">
            @can('destroy', $comment)
            <form action="{{route('comments.destroy',$comment)}}" method="post"
              onsubmit="return confirm('您确定要删除该评论吗？');">
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