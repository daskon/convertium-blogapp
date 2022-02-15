@extends('layouts.main')

@section('content')

@auth

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Welcome {{ Auth::user()->name}} (Blog Editor)</h1>
    </div>

  <div class="row">
    
        <!--  Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Create Blog Post
                            </div>
                        </div>
                        <div class="col-sm">
                            <a href="{{route('blog.create')}}" class="btn btn-success btn-sm">Create</a> 
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
                                All Blog Posts
                            </div>
                        </div>
                        <div class="col-sm">
                            <a href="{{url('viewblog')}}" class="btn btn-success btn-sm">View</a>
                        </div>
                    </div>
                </div>
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


