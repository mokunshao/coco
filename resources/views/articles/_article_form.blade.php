<div class="article-form">
  @include('shared._errors')
  <form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <textarea rows="3" placeholder="聊聊新鲜事儿..." name="content" required></textarea>
    <div>
      <button type="submit">发布</button>
    </div>
  </form>
</div>