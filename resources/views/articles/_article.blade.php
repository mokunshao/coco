<article class="article">
  <div class="article-avatar-container">
    <a href="{{ route('users.show', $user->id )}}">
      <img class="article-avatar" src="{{ $user->gravatar('50') }}" alt="{{ $user->name }}" />
    </a>
  </div>
  <div>
    <div>{{ $user->name }} <small> / {{ $article->created_at->diffForHumans() }}</small></div>
    {{ $article->content }}
  </div>
</article>