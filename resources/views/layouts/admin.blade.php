<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>

body{
	background: #f4f4f4;
}

.navbar{
	min-height: 33px !important;
	margin-bottom: 0;
	border-radius: 0;

}
.navbar-nav> li>a, .navbar-brand{
	padding-top: 6px !important;
	padding-bottom: 0;
	height: 33px;

}

.main-color-bg{
	background-color: #095f59;
	color: #ffffff !important;
}


/*Header */

#header{
	background: #333333;
	color: #ffffff;
	padding-bottom: 10px;
	margin-bottom: : 15px;
}

#header .create{
	padding-top: 20px;
}

.dash-box{
	text-align: center;
}

#footer{
	background: #333333;
	color: #ffffff;
	text-align: center;
	padding: 30px;
	margin-top: 30px;

}



.navbar-default {
  background-color: #095f59;
  border-color: #689a9b;
}
.navbar-default .navbar-brand {
  color: #efee24;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #010800;
}
.navbar-default .navbar-text {
  color: #efee24;
}
.navbar-default .navbar-nav > li > a {
  color: #efee24;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #010800;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #010800;
  background-color: #689a9b;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #010800;
  background-color: #689a9b;
}
.navbar-default .navbar-toggle {
  border-color: #689a9b;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #689a9b;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #efee24;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #efee24;
}
.navbar-default .navbar-link {
  color: #efee24;
}
.navbar-default .navbar-link:hover {
  color: #010800;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #efee24;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #010800;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #010800;
    background-color: #689a9b;
  }
}

/*Breadcrumb*/

.breadcrumb{
	background: #cccccc;
	color: #333333;
}
.breadcrumb a{
	color: #333333;
}
</style>
<link rel="stylesheet" href="{{ URL::asset('/fontawesome/css/all.css') }}">
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Super Admin | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" type="text/css" >


  </head>

  <body>
    <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <img src="{{ URL::asset('/images/logo.png') }}" alt="" style="width:45px; height:45px;" class="float-left">
          </div>

          <a class="navbar-brand" href="#">EREFERRAL</a>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.html">Dashboard</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class=" active nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                    Welcome, {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    @yield('content')
</body>
</html>
