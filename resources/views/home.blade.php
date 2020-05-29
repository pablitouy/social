@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
    <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Perfecto</h4>
          {{ Session::get('message') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/home/publicar" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="detalle">Algo para Compartir?</label>
                          <textarea class="form-control" id="detalle" name="detalle"rows="3"></textarea>
                        </div>
                      <div class="form-group">
                      <button type="submit" class="btn btn-primary">Compartir</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">Publicaciones</div>

            <div class="card-body">
                <ul class="list-unstyled">
                    @foreach($posts as $post)
                    <li class="media">
                      <img src="..." class="mr-3" alt="...">
                      <div class="media-body">
                        <h5 class="mt-0 mb-1">{{ $post->user->name }}</h5>
                        {{ $post->detalle }}
                      </div>
                    </li>
                    <hr>
                    @endforeach
                  </ul>
                
            </div>
        </div>
    </div>
</div>
@endsection
