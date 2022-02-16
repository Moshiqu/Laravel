<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Bookstore App using Laravel 6.x</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <header> 
    <nav> 
      <center>
        <table width="700"> 
          <tr valign="bottom"> 
            <td class="value"><a href="/"><img src="/images/logo.jpg" border="0"  width="180"/> </a></td> 
            <td class="value"><a href="/"><img src="/images/home.png" border="0"  width="55"></a></td> 
            <td class="value"><a href="/register"><img src="/images/register.png" border="0"  width="55"></a></td> 
            <td class="value"><a href="/books"><img src="/images/cart.png" border="0"  width="55"></a></td> 
            <td class="value"><a href="/books"><img src="/images/login.png" border="0"  width="55"></a></td> 
            <td class="value"><a href="/"><img src="/images/admin.png" border="0"  width="55"></a></td> 
          </tr> 
        </table>  
      </center>
    </nav> 
  </header>
  
  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>

<footer><center>Copyright 2021 Online Book Store</center></footer>
</body>
</html>