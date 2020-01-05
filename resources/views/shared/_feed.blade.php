@if ($feed->count() > 0)
@foreach ($feed as $article)
@include('articles._article', $article)
@endforeach
{{$feed->links()}}
@else
<p>没有数据！</p>
@endif