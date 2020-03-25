<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      管理画面
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/now-ui-dashboard.css?v=1.3.0')}}" rel="stylesheet" />
    <link href="{{ asset('scss/now-ui-dashboard.scss')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
</head>
<body class="">
  <div class="wrapper ">
    <!-- sidebar -->
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ route('counselor.create') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>商品追加</p>
            </a>
          </li>
          <li>
            <a href="{{ route('counselor.index') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>商品一覧</p>
            </a>
          </li>
          <li class="">
            <a href="{{ route('record.create') }}">
              <i class="now-ui-icons files_paper"></i>
              <p>新着追加</p>
            </a>
          </li>
          <li class="">
              <a href="{{ route('record.index') }}">
                <i class="now-ui-icons files_paper"></i>
                <p>新着一覧</p>
              </a>
          </li>
          <li class="">
              <a href="{{ route('benefit.create') }}">
                <i class="now-ui-icons business_badge"></i>
                <p>おすすめ追加</p>
              </a>
          </li>
          <li class="">
              <a href="{{ route('benefit.index') }}">
                <i class="now-ui-icons business_badge"></i>
                <p>おすすめ一覧</p>
              </a>
          </li>
          <li class="">
            <a href="{{ route('benefit.index') }}">
              <i class="now-ui-icons business_badge"></i>
              <p>スタイリング追加</p>
            </a>
        </li>
        <li class="">
            <a href="{{ route('benefit.index') }}">
              <i class="now-ui-icons business_badge"></i>
              <p>スタイリング一覧</p>
            </a>
        </li>
        <li class="">
            <a href="{{ route('benefit.index') }}">
              <i class="now-ui-icons business_badge"></i>
              <p>ニュース追加</p>
            </a>
        </li>
        <li class="">
            <a href="{{ route('benefit.index') }}">
              <i class="now-ui-icons business_badge"></i>
              <p>ニュース一覧</p>
            </a>
        </li>
        </ul>
      </div>
    </div>
    <div class="main-panel pt-5 h-100" id="main-panel">
      <div class="content">
       @yield('content')
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->

  <!--  Google Maps Plugin    -->
  <!-- Chart JS -->
  <!--  Notifications Plugin    -->
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  {{-- <script>
    // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
   
    });
  </script> --}}
</body>
</html>
