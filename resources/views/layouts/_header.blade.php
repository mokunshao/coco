<nav class="navbar">
    <div class="navbar-left">
        <a href="{{route('home')}}">
            COCO
        </a>
    </div>
    <div class="navbar-right">
        @if (Auth::check())
        <a href="{{route('users.show',Auth::user())}}">个人中心</a>
        <a href="{{route('users.edit',Auth::user())}}">编辑资料</a>
        <form action="{{route('logout')}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit">退出</button>
        </form>
        @else
        <a href="{{route('help')}}" class="navbar-right-button">帮助</a>
        <a href="{{route('signup')}}" class="navbar-right-button">登录</a>
        @endif
    </div>
</nav>
