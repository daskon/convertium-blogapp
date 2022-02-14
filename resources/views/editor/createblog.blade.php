@extends('layouts.main')

@section('content')



<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>Create Blog</h2>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-12">
      <form class="" action="" method="post" id="form" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title :</label>
          <input type="text" class="form-control" id="title" placeholder="Enter The Title" name="title">
        </div>
        <input type="text" name="editor_id" value="{{Auth::user()->id}}" style="visibility: hidden;">
        <div class="mb-3 mt-3">
          <label for="banner" class="form-label">Banner Image :</label>
          <input type="file" class="form-control" id="image" placeholder="Select a file" name="image">
        </div>

        <textarea name="editor" id="editor" style="visibility: hidden;"></textarea>
      </form>

      <div class="mb-3 mt-3">
        <textarea id="edi">

        </textarea>
        <button type="button" name="button" class="btn btn-info" onclick="publishco()">Publish</button>
        <button type="button" name="button" class="btn btn-info" onclick="draftco()">Draft</button>
        <br><br><br>
      </div>
    </div>
  </div>
</div>



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
    }

    function publishco() {
      getcontent();
      var form = document.getElementById('form').action = "{{route('blog.store')}}";
      var form = document.getElementById('form').submit();
    }

    function draftco() {
      getcontent();
      var form = document.getElementById('form').action = "{{route('draft.store')}}";
      var form = document.getElementById('form').submit();
    }
  </script>





@endsection
