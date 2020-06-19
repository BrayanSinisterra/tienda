<div class="container text-center">
  
<nav class="navbar navbar-default" style="background:#fff;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand main-title" href="#">Categorias</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       @foreach($category as $category)
        <li><a href="{{route('category', $category->id)}}" class="btn btn-primary" 
        style="
        color:#fff;  
        margin:10px; 
        padding-bottom:5px; 
        padding-top:5px; 
        background:{{$category->color}};
        border-color:{{$category->color}};
        

        ">{{$category->name}}</a></li>
      @endforeach
      </ul>


      {{Form::open(array(
           'action' => 'StoreController@index',
           'method' => 'GET',
           'role' => 'form',
           'class' => 'navbar-form navbar-right'
            ))
         
      }}

      {{Form::input('text', 'buscar', Input::get('buscar'), array('class' => 'form-control', 'placeholder'=>'Escribe tu busqueda..'))}}

      {{Form::input('submit', null, 'Buscar', array('class' => 'btn btn-primary'))}}

      {{Form::close()}}
    
    
 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><br>
