<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Panel de control</title>
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

</head>
<body>
    @if(\Session::has('message'))
       @include('admin.partials.message')
    @endif
	@include('admin.partials.nav')

	@yield('content')
    

    @include('admin.partials.footer')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
  
	<script src="{{ asset('admin/js/main.js') }}"></script>

</body>
</html>