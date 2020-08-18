@extends('web.master')

@section('content')
   
    <div class="card" v-for = "post in posts"  >
        <img v-bind:src=" '/images/' + post.image" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">@{{post.title}}</h5>
          <p class="card-text">@{{post.content}}</p>
          <a href="#" class="btn btn-primary">Ver Resumen</a>
        </div>
    </div>

@endsection

 