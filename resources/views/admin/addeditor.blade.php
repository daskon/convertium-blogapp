@extends('layouts.main')

@section('content')
@auth

<!-- view all users to add a edito -->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>Action</th>
            <th></th>
            <th>Member Name</th>
            <th>Email</th>
            <th>Privillage</th>
          </tr>
          @foreach($users as $user)
            <tr>
              @if($user->level == 1)
                <td></td>
                <td></td>
              @else
              <td>
                <form class="" action="{{route('editor.store')}}" method="post">
                  @csrf
                  <input type="text" name="id" value="{{$user->id}}" style="visibility: hidden;">
                  <button type="submit" name="button" class="btn btn-info">Assign Role</button>
                </form>
              </td>
              <!-- delete -->
              <th>
                <form method="post" action="{{route('editor.destroy',$user->id)}}">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm">Remove Role</button>
                  </form>
              </th>
              @endif
              <!-- end delete -->
              <td>{{$user -> name}}</td>
              <td>{{$user -> email}}</td>

              <!-- show the useer possion -->
              @foreach($editors as $e)
                @if($user -> level == 1)
                  <td>Admin</td>
                  @break
                @else
                    @if($user -> id == $e -> user_id && $user -> level == 3)
                    <td>Editor</td>
                        @break

                @endif
                @endif
              @endforeach
              <!-- end if -->
            </tr>
          @endforeach
          <!-- end foreach -->
        </table>
      </div>
    </div>
  </div>
</div>

<style media="screen">
  .g2{
    visibility: hidden;
  }
</style>

@else
<script type="text/javascript">
    window.location = "{{ route('login') }}";
</script>

@endauth

@endsection
