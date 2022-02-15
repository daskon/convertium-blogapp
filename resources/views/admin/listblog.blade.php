@extends('layouts.main')

@section('content')

@auth

<div class="container">
  <div class="row">
    <div class="col-sm-12 p-4 alert alert-info">
      <h2>All Blog Post</h2>
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
            <p class="pb">Publish on {{$ac -> publish_date}} to {{$ac -> due_date}}</p>
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
            <div class="container">
              <div class="row">
                <div class="col-6 col-sm-6">
                  <label for="day" class="form-label">Publish On :</label>
                  <input type="date" class="form-control" name="publish_date" required>
                </div>
                <div class="col-6 col-sm-6">
                  <label for="day" class="form-label">Expire On :</label>
                  <input type="date" class="form-control" name="due_date" required>
                </div>
                <div class="col-6 col-sm-2 p-2">
                  <button type="submit" name="button" class="btn btn-info">Approve</button>
                </div>
              </div>
            </div>
        </form>
      @endif

      @if($count == 0)
        <form class="" action="{{route('accept.store')}}" method="post">
          @csrf
          <input type="text" name="id" value="{{$blog->id}}" style="visibility: hidden;">
          <div class="mb-3 mt-3">
            <label for="day" class="form-label">Publish On :</label>
            <input type="date" class="form-control" placeholder="Enter The date" name="publish_date" required>
          </div>
          <div class="mb-3 mt-3">
            <label for="day" class="form-label">Due On :</label>
            <input type="date" class="form-control" placeholder="Enter The date" name="due_date" required>
          </div>

          <button type="submit" name="button" class="btn btn-info p-2">Publish</button>
        </form>
      @endif
      <div class="container">
        <div class="row">
          <div class="col-auto">
            <form method="post" action="{{route('blog.destroy',$blog->id)}}">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm p-2">Reject</button>
              </form>
          </div>
          <div class="col-auto">
            <a href="{{route('blog.show',$blog->id)}}" class="btn btn-info p-2">show</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <br><br>
    <!-- view draft -->
    <div class="container">
      <div class="row">
          @foreach($drafts as $draft)
          <div class="col-sm-4">
            <img class="img-fluid" src="{{asset('images/'.$draft->image)}}" alt="{{$draft->title}}">
            <hr>
            <h2>{{$draft->title}}</h2>
            <p class="draft badge bg-warning text-dark">Draft</p>

            <a href="{{route('draft.show',$draft->id)}}" class="btn btn-info">show</a>
          </div>
          @endforeach
      </div>
    </div>
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

@else
<script type="text/javascript">
    window.location = "{{ route('login') }}";
</script>

@endauth

@endsection
