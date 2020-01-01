@if ($feed->count() > 0)
<ul>
  @foreach ($feed as $article)
  @include('articles._article', ['user' => $article->user])
  @endforeach
</ul>
@else
<p>没有数据！</p>
@endif