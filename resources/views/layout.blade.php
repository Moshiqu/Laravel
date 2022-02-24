<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Bookstore App using Laravel 6.x</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/custom/custom.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('js\sort\css\theme.default.min.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('css/custom/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="{{ asset('js/sort/js/jquery.tablesorter.js') }}"></script>
</head>
<body>
  <header> 
    <hgroup>
      <a href="/">
        <img src="/images/logo.jpg" class='logo_img' />
      </a>
    </hgroup>
    <nav class='nav'>
      <ul id='nav_ul'>
        <li><a href="/"><img src="/images/home.png"></a></li>
        <li><a href="/register"><img src="/images/register.png"></a></li>
        <li><a href="/bookrequest"><img src="/images/cart.png"></a></li>
        <li><a href="/login"><img src="/images/login.png"></a></li>
        <li><a href="/"><img src="/images/admin.png"></a></li>
      </ul>
    </nav>
    <aside class='aside'>
      <input type="text" id='search' placeholder="Search by book name">
      <img src="/images/search_icon.png" class='search_icon'>
    </aside>
  </header>
  
  <section class="container" style="padding:0;">
    @yield('content')
  </section>

  <footer class='center footer'>Copyright 2021 Online Book Store</footer>
</body>
</html>