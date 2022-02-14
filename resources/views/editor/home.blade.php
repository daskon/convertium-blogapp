@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12">
        <!--  Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Create blog
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('blog.create')}}" class="btn btn-info">Create Blog</a> </div>
                            <div class="row no-gutters align-items-center">


                            </div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{url('viewblog')}}" class="btn btn-info">View All Blogs</a> </div>
                        <div class="row no-gutters align-items-center">


                        </div>
                    </div>
                    <div class="col-auto">

                </div>
            </div>
        </div>
    </div>
  </div>
</div>




@endsection


