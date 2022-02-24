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
    <nav class='header_nav'> 
        <table class='header_nav_table'> 
          <tbody class='header_nav_table_body'>
            <tr class='table_left'>
              <td class="value" ><a href="/"><img src="/images/logo.jpg" class='logo_box'/></a></td> 
            </tr>
            <tr class='table_content container bgw' valign="bottom">
              <td class="value"><a href="/"><img src="/images/home.png">Home</a></td> 
              <td class="value"><a href="/register"><img src="/images/register.png">Register</a></td> 
              <td class="value"><a href="/bookrequest"><img src="/images/cart.png">Book Request</a></td> 
              <td class="value"><a href="/login"><img src="/images/login.png">Login</a></td>
              <td class="value"><a href="/"><img src="/images/admin.png">Admin</a></td> 
              <td id='search_input_tr'>
                <aside>
                  <input type="text" id='search' placeholder="Search">
                  <img src="/images/search_icon.png" class='search_icon'>
                </aside>
              </td>
            </tr>
          </tbody>
        </table>
    </nav> 
  </header>
  
  <section class="container">
    @yield('content')
  </section>

  <footer class='center footer'>Copyright 2021 Online Book Store</footer>
</body>
</html>