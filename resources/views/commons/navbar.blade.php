<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        
        @if (Auth::check())
        <i class="fas fa-shopping-bag fa-2x fa-fw my-skyblue"></i>
        <a class="navbar-brand" href="/search">My Shopping</a>
        
        @else
        {{-- トップページへのリンク --}}
        <i class="fas fa-shopping-bag fa-2x fa-fw my-skyblue"></i>
        <a class="navbar-brand" href="/">My Shopping</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
         @endif
            

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                
                @if (Auth::check())
                    <li class="m-2">{!! link_to_route('search.index', '商品を探す') !!}</li>
                    <li class="m-2">{!! link_to_route('ranking.index', 'ランキング') !!}</li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}さん</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show', Auth::user()->name . 'さんのページ', ['user' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>


