<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand main-title" href="{{route('home')}}">BLACKONE</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <p class="navbar-text">Mi tienda</p>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('cart-show')}}"> <i class="fa fa-shopping-cart"></i></a></li>
         <li><a href="#">Conocenos</a></li>
         <li><a href="#">Contactenos</a></li>
         @if (Auth::guest())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/home') }}">Iniciar Sesión</a></li>
            <li><a href="{{ url('/register') }}">Registro</a></li>
          </ul>
        </li>
        @else
         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>

        @endif
      </ul>
    
      
    </div>
  </div>
</nav>