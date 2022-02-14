@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>List Of Blogs</h2>
      </div>
    </div>

    <!-- view draft -->
    <div class="row">
        @foreach($drafts as $draft)
        <div class="col-sm-4">
          <img class="img-fluid" src="{{asset('images/'.$draft->image)}}" alt="{{$draft->title}}">
          <hr>
          <h2>{{$draft->title}}</h2>
          <p class="draft">Draft</p>

          <a href="{{route('draft.show',$draft->id)}}" class="btn btn-info">show</a>
          <a href="{{route('draft.edit',$draft->id)}}" class="btn btn-info">Edit</a>
        </div>
        @endforeach
    </div>

    <!-- view published blogs -->
    <div class="row">
      @foreach($blogs as $blog)
      <div class="col-sm-4">
        <img class="img-fluid" src="{{asset('images/'.$blog->image)}}" alt="{{$blog->title}}">
        <hr>
        <h2>{{$blog->title}}</h2>
        <?php $isex = 'no'; ?>
        @foreach($accepts as $ac)

          @if($blog->id == $ac->blog_id)
            <p class="ap">Approved</p>
            <p class="pb">Publish on {{$ac -> publish_date}}</p>
            <?php $isex = 'yes'; ?>
            @break
          @else
          <?php $isex = 'no'; ?>

          @endif
        @endforeach
        @if ($isex == 'no')
          <p class="na">Not Approved yet</p>
        @endif
        <a href="{{route('blog.show',$blog->id)}}" class="btn btn-info">show</a>
        <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-info">Edit</a>
      </div>
      @endforeach
    </div>
  </div>


  <style>
      .draft{
          color: red;
      }
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
