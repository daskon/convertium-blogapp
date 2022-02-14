<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple Blog</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" charset="utf-8"></script>

  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <h4 class="navbar-brand">View Blogs</h4>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        @foreach($blogs as $blog)
        <div class="col-sm-12">
          <br>
          <h2>{{$blog->title}}</h2>
          <br>
          <img class="img-fluid" src="{{asset('images/'.$blog->image)}}" alt="{{$blog->title}}">
          <br>
          <?php echo html_entity_decode($blog->content); ?>
        </div>
        @endforeach
      </div>
    </div>

</body>
</html>
