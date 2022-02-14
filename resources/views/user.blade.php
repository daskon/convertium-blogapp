@extends('layouts.main')

@section('content')

<div class="container">
    <p class="btn btn-danger">The Admin aprovel is pending ......</p>
  <div class="row">
    <?php $ldate = date('Y-m-d'); ?>
    @foreach($blogs as $blog)
      @foreach($accepts as $ac)
        @if($blog->id == $ac->blog_id && $ac->publish_date <= $ldate)
          <div class="col-sm-4">
            <img class="img-fluid" src="{{asset('images/'.$blog->image)}}" alt="{{$blog->title}}">
            <h3>{{$blog->title}}</h3>
            <a href="{{route('blog.show',$blog->id)}}" class="btn btn-info">View</a>
          </div>
        @endif
      @endforeach
    @endforeach
  </div>
</div>

@endsection
