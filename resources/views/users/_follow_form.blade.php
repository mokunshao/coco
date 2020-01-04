@can('follow', $user)

@if (Auth::user()->isFollowing($user))
<form action="{{ route('followers.destroy', $user) }}" method="post">
  @csrf
  @method('DELETE')
  <button class="button is-danger is-outlined" type="submit">取消关注</button>
</form>
@else
<form action="{{ route('followers.store', $user) }}" method="post">
  @csrf
  <button class="button is-primary" type="submit">关注</button>
</form>
@endif

@endcan