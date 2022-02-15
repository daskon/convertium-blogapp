@extends('layouts.main')

@section('content')

@auth



<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>

        @endif

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
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter The Title" name="title" required>
             @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="text" name="editor_id" value="{{Auth::user()->id}}" style="visibility: hidden;">
        <div class="mb-3 mt-3">
          <label for="banner" class="form-label">Banner Image :</label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Select a file" name="image" required>
          @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>

        <textarea name="editor" id="editor" style="visibility: hidden;"></textarea>
      </form>

      <div class="mb-3 mt-3 @error('content') is-invalid @enderror">
        <textarea id="edi" required>

        </textarea>
        @error('content')
        <span class="text-danger">{{ $message }}</span>
        @enderror

      </div>
      <button type="button" name="button" class="btn btn-info" onclick="publishco()">Publish</button>
        <button type="button" name="button" class="btn btn-info" onclick="draftco()">Draft</button>
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


@else
<script type="text/javascript">
    window.location = "{{ route('login') }}";
</script>
@endauth


@endsection
