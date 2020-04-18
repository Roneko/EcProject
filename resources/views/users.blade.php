<!DOCTYPE html>
<html lang="ja">
<html>
  <head>
    <meta charset="utf-8">
    <title>town</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/now-ui-dashboard.css?v=1.3.0')}}" rel="stylesheet" />
    <link href="{{ asset('scss/now-ui-dashboard.scss')}}" rel="stylesheet" /> 
    <link href="{{ asset('/css/item.css')}}" rel="stylesheet" />
  </head>

  <body>
    <header class="header">
      <div class ="header__bar row">
        <h1 class ="grid-6"><a href='/'>town</a></h1>
        @if(Auth::check())
        <div class="user_nav grid-6">
            <span>
                {{Auth::user()->name}}
                <ul>
                <li>
                    <a href="/users/{{Auth::user()->id}}">マイページ</a>
                    {{Form::open(['url' => "/logout", 'method' => 'post', 'id' => 'logout'])}}
                    {{Form::close()}}
                    <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout').submit();">ログアウト</a>
                </li>
                </ul>
            </span>

            <a href="/" class="post">商品一覧</a>
            </div>
            @else
            <div class="grid-6">
                <a href="/login" class="post">ログイン</a>
                <a href="/register" class="post">新規登録</a>
          </div>
        @endif
      </div>
    </header>

    @yield('content')
  </body>
  @yield('script')
</html>