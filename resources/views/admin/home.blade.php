@extends('layouts.main')

@section('content')

@auth

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!--  Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                View Members
                            </div>
                            <span class="badge rounded-pill bg-info text-dark">{{$users}}</span>
                        </div>
                        <div class="col-sm">
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#userModal">
                          View
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Assign Editors
                            </div>
                        </div>
                        <div class="col-sm">
                            <a href="{{route('editor.index')}}" class="btn btn-success btn-sm">Assign</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Blog Posts
                            </div>
                        </div>
                        <div class="col-sm">
                            <a href="{{route('blog.index')}}" class="btn btn-success btn-sm">View Post</a> 
                        </div>
                </div>
            </div>
        </div>
  </div>
</div>










<!-- The Modal to view users -->
<div class="modal" id="userModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">All users</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th></th>
              <th>Name</th>
              <th>Email</th>
            </tr>
            @foreach($userdata as $u)
              <tr>
                <td></td>
                <td>{{$u -> name}}</td>
                <td>{{$u -> email}}</td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@else
<script type="text/javascript">
    window.location = "{{ route('login') }}";
</script>

@endauth


@endsection
