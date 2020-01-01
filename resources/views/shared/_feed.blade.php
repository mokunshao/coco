@if ($feed->count() > 0)
<ul>
  @foreach ($feed as $activity)
  @include('activities._activity', ['user' => $activity->user])
  @endforeach
</ul>
@else
<p>没有数据！</p>
@endif