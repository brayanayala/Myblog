@extends('admin.layouts.dashboard')

@section('content')



<div id="layoutSidenav_content">
    
    @if ($errors->any())

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
    
@endif

    <div class="container-fluid px-4">
    <main>
        <div class="container-fluid px-4">
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>                    
                    Actualizar Entrada
                    <div class="col-md-3">
                    <a href="/posts" class="btn btn-primary btn-lg float-md-righr" role="button" aria-pressed="true">Atras</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data">
                        @method('PATCH')
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title..." value="{{ $post->titulo }}">
                        </div>
                        <label for="image">Selecionar Imagen</label>
                        <input type="file" name="image" class="form-control-file" id="profile-img" value="{{$post->image}}">
                        <div class="row">
                            <img src="{{asset('/storage/images/post_images/'.$post->imagen)}}" id="profile-img-tag" class="img-thumbnail mx-auto" alt="{{$post->imagen}}" width="100">
                        </div>
                        <div class="form-group">
                            <label for="content">Descripción</label>
                            <textarea class="form-control" name="post_content" id="content">{{$post->contenido}}</textarea>
                        </div>
                    
                        <div class="form-group pt-2">
                            <input class="btn btn-primary" type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </main>
</div>


@endsection