@extends('layouts.app')
        
@section('content')      
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('https://andesscdcomco-my.sharepoint.com/:i:/r/personal/felipe_ayala_andesscd_com_co/Documents/Im%C3%A1genes/logo-andesscd-certificados-digitales.png?csf=1&web=1&e=tLeH1s')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>BLOG</h1>
                            <span class="subheading">Bienvenidos al blog de AndesSCD</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="row">
                 @foreach($posts as $post)
                    <div class="col-md-4">
                        <img class="img-thumbnail mt-4" width="100%" src="{{asset('/storage/images/post_images/'.$post->imagen)}} " alt="{{$post->imagen}}" width="100" alt="post_image">
                    </div>
                    <div class="col-lg-8">
                    <div class="post-preview">
                        <a href="post.html">    
                                    <h2 class="post-title"> {{$post['titulo']}} </h2>
                                    <h3 class="post-subtitle">{{$post['contenido']}}</h3>
                                </a>
                                <p class="post-meta">
                                    Posted by
                                    <a href="#!"> {{$post->usuario['name']}} </a>
                                </p>
                            
                            </div>
                        </div>
                        <!-- Post preview-->

                        <!-- Divider-->
                        @endforeach


                </div>
            </div>
        </div>

@endsection