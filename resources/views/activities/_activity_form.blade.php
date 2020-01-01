<div>
  @include('shared._errors')
  <form action="{{ route('activities.store') }}" method="POST">
    @csrf
    <textarea rows="3" placeholder="聊聊新鲜事儿..." name="content" required></textarea>
    <div>
      <button type="submit">发布</button>
    </div>
  </form>
</div>