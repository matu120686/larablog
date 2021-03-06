

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    

    <title>Modulo admin</title>
</head> 
<body>
   @include('web.partials.nav-header-main')

  <div class="container" id= "app" >        
        @yield('content')
  </div>
  @include('web.partials.footer')
   
<script src="{{asset("js/app.js")}}"></script>
</body>
</html>