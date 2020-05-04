<!DOCTYPE html>
<html lang="ja">
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      
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
      <div class="container">
        <nav class="navber navber-expand navber-light">
          <h1><a href='/ecsite' class ="navber-brand">town</a></h1>
          @if(Auth::check())
          {{Auth::user()->name}}
            <ul class="navber-nav">
              <li class="nav-item">
                <a href="/users" class="nav-link">マイページ</a>
                {{Form::open(['url' => "/logout", 'method' => 'post', 'id' => 'logout'])}}
                {{Form::close()}}
                <a href="/logout" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout').submit();">ログアウト</a>
              </li>
              <li class="nav-item"><a href="/ecsite" class="nav-link">商品一覧</a></li>
              <li class="nav-item"><a href="/users/history" class="nav-link">購入履歴</a></li>
          @else
            <li class="nav-item"><a href="/login" class="nav-link">ログイン</a></li>
            <li class="nav-item"><a href="/register" class="nav-link">新規登録</a></li>
            </ul>
          @endif
        </nav>
      </div>
    </header>

    @yield('script')
    @yield('content')
  </body>
</html>