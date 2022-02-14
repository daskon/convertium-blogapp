@extends('layouts.main')

@section('content')

<?php $exis = 'no'; ?>
  @foreach($drafts as $draft)
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>Edit Blog</h2>
        <?php $exis ='yes'; ?>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-12">

      <form class="" action="{{route('draft.update',$draft->id)}}" method="post" id="form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT" id="me">

        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title :</label>
          <input type="text" class="form-control" value="{{$draft->title}}" id="title" placeholder="Enter The Title" name="title">
        </div>
        <input type="text" name="editor_id" value="{{Auth::user()->id}}" style="visibility: hidden;">
        <div class="mb-3 mt-3">
          <label for="banner" class="form-label">Banner Image :</label>
          <input type="file" class="form-control" id="image" placeholder="Select a file" name="image">
        </div>
        <input type="hidden" name="draft_id" value="{{$draft->id}}">

        <textarea name="editor" id="editor" style="visibility: hidden;"></textarea>
      </form>

      <div class="mb-3 mt-3">
        <textarea id="edi">
          {{$draft->content}}
        </textarea>
        <button type="button" name="button" class="btn btn-info" onclick="publish()">Publish</button>
        <button type="button" name="button" class="btn btn-info" onclick="draft()">Draft</button>
        <br><br><br>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  tinymce.get("edi").setContent();
</script>

@endforeach

@if ($exis == 'no')
    <div class="textis">
        This Blog is Published <br>
        <br>
        <a href="{{url('home')}}" class="btn btn-info">Dashbord</a>
    </div>

@endif

<style>
    .textis{
        text-align: center;
    }
</style>

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

  function publish() {
    var x = getcontent();
    var me = document.getElementById('me').value="POST"
    var form = document.getElementById('form').action = "{{route('blog.store')}}";
    var form = document.getElementById('form').submit();
  }

  function draft() {
    var x = getcontent();
    var form = document.getElementById('form');
    form.submit();
  }
</script>





@endsection
