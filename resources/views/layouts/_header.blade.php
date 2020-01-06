<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{route('home')}}">
            COCO
        </a>
        <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div class="navbar-menu" id="navMenu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{route('users.index')}}">用户列表</a>
            <a class="navbar-item" href="{{route('help')}}">帮助</a>
        </div>

        <div class="navbar-end">
            @auth
            <a class="navbar-item" href="{{route('users.show',Auth::user())}}">{{Auth::user()->name}}</a>
            <a class="navbar-item" href="{{route('users.edit',Auth::user())}}">编辑资料</a>
            <form action="{{route('logout')}}" method="post" class="navbar-item">
                @method('DELETE')
                @csrf
                <button class="button is-danger is-outlined" type="submit">退出</button>
            </form>
            @endauth
            @guest
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="{{route('signup')}}">
                        <strong>注册</strong>
                    </a>
                    <a class="button is-light" href="{{route('login')}}">
                        登录
                    </a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</nav>