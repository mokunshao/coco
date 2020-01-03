<div class="block">
  @include('shared._errors')
  <form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <textarea class="textarea" placeholder="聊聊新鲜事儿..." name="content" required></textarea>
    <button class="button is-info" type="submit">发布</button>
  </form>
</div>