<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convertium Blog</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" charset="utf-8"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Convertium Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          @if (Route::has('login'))
          <ul class="navbar-nav aulink">
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ url('home') }}">Dashbord</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
              @endif
            @endauth
          </ul>
          @endif
        </div>
      </div>
    </nav>
<br>
    <div class="container">
      <div class="row">
        <?php $ldate = date('Y-m-d'); ?>
        @foreach($blogs as $blog)
          @foreach($accepts as $ac)
            @if($blog->id == $ac->blog_id && $ac->publish_date <= $ldate && $ac->due_date >= $ldate)
              <div class="col-sm-4">
                <img class="img-fluid" src="{{asset('images/'.$blog->image)}}" alt="{{$blog->title}}">
                <h3>{{$blog->title}}</h3>
                <a href="{{route('blog.show',$blog->id)}}" class="btn btn-info">View More</a>
              </div>
            @endif
          @endforeach
        @endforeach
      </div>
    </div>







<style media="screen">
  .aulink{
    margin-left: 70%;
  }
</style>

  </body>
</html>
