@extends('layouts.main')

@section('content')

@auth

  @foreach($blogs as $blog)
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>Edit Blog</h2>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-12">

      <form class="" action="{{route('blog.update',$blog->id)}}" method="post" id="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title :</label>
          <input type="text" class="form-control" value="{{$blog->title}}" id="title" placeholder="Enter The Title" name="title">
        </div>
        <input type="text" name="editor_id" value="{{Auth::user()->id}}" style="visibility: hidden;">
        <div class="mb-3 mt-3">
          <label for="banner" class="form-label">Banner Image :</label>
          <input type="file" class="form-control" id="image" placeholder="Select a file" name="image">
          <input type="hidden" name="image" value="{{$blog->image}}">
          <img src="{{asset('images/'.$blog->image)}}" alt="" width="300px">
        </div>

        <textarea name="editor" id="editor" style="visibility: hidden;"></textarea>
      </form>

      <div class="mb-3 mt-3">
        <textarea id="edi">
          {{$blog->content}}
        </textarea>
        <button type="button" name="button" class="btn btn-info" onclick="getcontent()">Submit</button>
        <br><br><br>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  tinymce.get("edi").setContent();
</script>

@endforeach

<script>
  tinymce.init({
    selector: '#edi',
    plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Dilum Sadeepa',
  });
</script>

<script type="text/javascript">
  function getcontent() {
    var content = tinymce.get("edi").getContent();
    console.log(content);
    document.getElementById('editor').value = content;
    var form = document.getElementById('form');
    form.submit();
  }
</script>

@else
<script type="text/javascript">
    window.location = "{{ route('login') }}";
</script>
@endauth



@endsection
