<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        @if (Auth::check())
            <i class="fas fa-shopping-bag fa-2x fa-fw my-skyblue"></i>
            <div class="navbar-brand my-shopping">
                {!! link_to_route('users.show', 'My Shopping',['id'=> Auth::id()]) !!} 
              {{--  <a class="navbar-brand" href="/search">My Shopping</a>--}}
             </div>
        @else
            <i class="fas fa-shopping-bag fa-2x fa-fw my-skyblue"></i>
            <div class="my-shopping">
                <a class="navbar-brand" href="/">My Shopping</a>
             </div>
        @endif     
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
            </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="m-2 nav-item"><i class="fas fa-search-plus"></i></i>
                            {!! link_to_route('search.index', '商品を探す') !!}</li>
                        <li class="m-2 nav-item">{!! link_to_route('ranking.index', 'ランキング') !!}</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}さん</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                        <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    @endif
                </ul>
        </div>
    </nav>
</header>


