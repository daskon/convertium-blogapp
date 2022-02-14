@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>List Of Blogs</h2>
    </div>
  </div>

  <div class="row">

    <?php $count = 0;
    $isex = 'no'; ?>

    @foreach($blogs as $blog)
    <div class="col-sm-4">
      <img class="img-fluid" src="{{asset('images/'.$blog->image)}}" alt="{{$blog->title}}">
      <hr>
      <h2>{{$blog->title}}</h2>

      @foreach($accepts as $ac)
        <?php $count = $count + 1 ?>
        @if($blog->id == $ac->blog_id)
            <p class="ap">Approved</p>
            <p class="pb">Publish on {{$ac -> publish_date}}</p>
          <?php $isex = 'yes';?>
          @break
        @else
            @if ($blog->id != $ac->blog_id)
                <?php $isex = 'no';?>

            @endif

        @endif

      @endforeach

      @if ($isex == 'no')
        <form class="" action="{{route('accept.store')}}" method="post">
            @csrf
            <input type="text" name="id" value="{{$blog->id}}" style="visibility: hidden;">
            <div class="mb-3 mt-3">
            <label for="day" class="form-label">Publish Date :</label>
            <input type="date" class="form-control" placeholder="Enter The date" name="publish_date" required>
            </div>

            <button type="submit" name="button" class="btn btn-info">Publish</button>
        </form>
      @endif

      @if($count == 0)
        <form class="" action="{{route('accept.store')}}" method="post">
          @csrf
          <input type="text" name="id" value="{{$blog->id}}" style="visibility: hidden;">
          <div class="mb-3 mt-3">
            <label for="day" class="form-label">Publish Date :</label>
            <input type="date" class="form-control" placeholder="Enter The date" name="publish_date" required>
          </div>

          <button type="submit" name="button" class="btn btn-info">Publish</button>
        </form>
      @endif
      <form method="post" action="{{route('blog.destroy',$blog->id)}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
        <a href="{{route('blog.show',$blog->id)}}" class="btn btn-info">show</a>
    </div>
    @endforeach
  </div>
</div>

<style>
    .ap{
          color: #279cdb;
      }
      .pb{
          color:#8d27db;
      }
      .na{
          color:brown;
      }
</style>

@endsection
