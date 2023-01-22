@extends('admin.layouts.dashboard')

@section('content')


<div id="layoutSidenav_content">
    
    <div class="container-fluid px-4">
        <div class="col-md-6">
                <h1>Lista de Entradas</h1>
            </div>
        <div class="col-md-3">
                <a href="/posts/create" class="btn btn-primary btn-lg float-md-righr" role="button" aria-pressed="true">Crear Entrada</a>          
    </div>
    <main>
        <div class="container-fluid px-4">
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>                    
                    Ejempo
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Imagen</th>
                                <th>Contenido</th>
                                <th>Usuario</th>
                                <th>Editar/Elimar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Imagen</th>
                                <th>Contenido</th>
                                <th>Usuario</th>
                                <th>Editar/Elimar</th>
                            </tr>
                        </tfoot>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->titulo}}</td>
                                <td><img src=" {{asset('/storage/images/post_images/'.$post->imagen)}} " alt="{{$post->imagen}}" width="100"></td>
                                <td>{{$post->contenido}}</td>
                                <td>{{$post->usuario['name']}}</td>
                                <td>
                                    <a href="posts/{{$post->id}}/edit"><i class="btn btn-warning btn-sm">Editar</i></a>
                                    <form method="POST" action="{{route('posts.destroy', $post->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            
            </div>
        </div>
    </main>
</div>

@endsection
