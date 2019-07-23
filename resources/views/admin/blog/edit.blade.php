@extends('admin.blog.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar articulo
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
          {{ method_field('PUT') }}
          <div class="form-group">
              @csrf
              <label for="name">Titulo del articulo </label>
          <input type="text" class="form-control" value={{$blog->title}} name="blog_title" required/>
          </div>
          <div class="form-group">
              <label for="quantity">Descripcion articulo</label>
              <input type="text" class="form-control" value={{$blog->description}} name="blog_description" required/>
          </div>
          <div class="form-group">
              <label for="quantity">Contenido del articulo</label>
              <textarea id="summernote" name="blog_content" required>{{$blog->content}}</textarea>
          </div>
          <div class="form-group">
              <div class="lastFile">
                  <img src={{asset('storage/blog/images/'.$blog->id.'/smalls/'.$blog->image)}} width="200" alt="">
                </div>
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="blog_image"/> <!-- rename it -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
          </div>
          <button type="submit" class="btn btn-primary">Guardar Articulo</button>
          <a href="{{URL::previous() }}">Volver</a>
      </form>
  </div>
</div>
@endsection