<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    
<nav class="navbar navbar-inverse sidebarNavigation" data-sidebarClass="navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle left-navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="{{url('homePage')}}">Accueil</a></li>
        <li><a href="{{url('contactPage')}}">Contact</a></li>
        <li><a href="{{url('servicePage')}}">Service</a></li>
      </ul>
    </div>
  </div>
</nav>
@yield('content')
    <script src="{{assets('assets/css/jquery.min.js')}}"></script>
    <script src="{{assets('assets/css/bootstrap.min.js')}}"></script>
</body>
</html>