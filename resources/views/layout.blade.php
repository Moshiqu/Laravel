<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Bookstore App using Laravel 6.x</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/custom/custom.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</head>
<body>
  <header> 
    <nav class='header_nav'> 
        <table class='header_nav_table'> 
          <tbody class='header_nav_table_body'>
            <tr class='table_left'>
              <td class="value" ><a href="/books"><img src="/images/logo.jpg" class='logo_box'/></a></td> 
            </tr>
            <tr class='table_content container' valign="bottom">
              <td class="value"><a href="/books"><img src="/images/home.png">Home</a></td> 
              <td class="value"><a href="/register"><img src="/images/register.png">Register</a></td> 
              <td class="value"><a href="/books"><img src="/images/cart.png">Cart</a></td> 
              <td class="value"><a href="/books"><img src="/images/login.png">Login</a></td> 
              <td class="value"><a href="/"><img src="/images/admin.png">Admin</a></td> 
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