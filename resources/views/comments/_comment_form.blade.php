<div class="box">
  @auth
  <form action="{{route('comments.store')}}" method="post">
    @csrf
    <input type="hidden" name="article_id" value="{{$article->id}}">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <textarea class="textarea" placeholder="留下你的评论..." name="content" required></textarea>
    <button class="button is-info" type="submit">评论</button>
  </form>
  @endauth

  @guest
  <div>登录后可评论</div>
  @endguest
</div>