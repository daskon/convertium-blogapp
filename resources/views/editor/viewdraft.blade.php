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
        <h4 class="navbar-brand">View Drafts</h4>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        @foreach($drafts as $draft)
        <div class="col-sm-12">
          <br>
          <h2>{{$draft->title}}</h2>
          <br>
          <img class="img-fluid" src="{{asset('images/'.$draft->image)}}" alt="{{$draft->title}}">
          <br>
          <?php echo html_entity_decode($draft->content); ?>
        </div>
        @endforeach
      </div>
    </div>

</body>
</html>
