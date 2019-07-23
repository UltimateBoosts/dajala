@extends('admin.blog.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ route('blog.create')}}" class="btn button greenb" >Crear Articulo</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Titulo</td>
          <td>Nombre</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
  @if(count($blogs) > 0 )
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{$blog->title}}</td>
            <td>{{$blog->name}}</td>
            <td><a href="{{ route('blog.edit',$blog->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('blog.destroy', $blog->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else 
          <tr>
            <td colspan="4">No se encontraron blogs</td>
          </tr>
        @endif  
    </tbody>

  </table>

<div>
@endsection