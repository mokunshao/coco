@if ($feed->count() > 0)
@foreach ($feed as $article)
@include('articles._article', ['user' => $article->user])
@endforeach
{{$feed->render()}}
@else
<p>没有数据！</p>
@endif