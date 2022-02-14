@extends('layouts.main')

@section('content')



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
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
                                Blog members</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users}}</div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
                          show
                        </button>
                        <div class="col-auto">

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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Assign Editors</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('editor.index')}}" class="btn btn-info">Assign The Editor</a> </div>
                        </div>
                        <div class="col-auto">

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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Blog Posts
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('blog.index')}}" class="btn btn-info">View All Blogs</a> </div>
                            <div class="row no-gutters align-items-center">


                            </div>
                        </div>
                        <div class="col-auto">

                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card  ->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->
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


@endsection
