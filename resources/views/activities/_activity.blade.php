<li>
  <a href="{{ route('users.show', $user->id )}}">
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" />
  </a>
  <div>
    <h5>{{ $user->name }} <small> / {{ $activity->created_at->diffForHumans() }}</small></h5>
    {{ $activity->content }}
  </div>
</li>