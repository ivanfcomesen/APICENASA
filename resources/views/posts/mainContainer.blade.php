@extends('layouts.app')
@section('content')
<div class="container col-md-12">
    <div class="col-md-5">               
        @include('posts.headGuia') 
        @include('posts.marcas')                     
        @include('posts.productor') 
        @include('posts.transportista')        
    </div>
    <div class="col-md-5">
        @include('posts.regAnimal')                      
    </div>
     <div class="col-md-2">
        @include('posts.tablaTipos')                      
    </div>

</div>
@endsection
@section('script')
<script src="{{ asset('js/script.js') }}"></script>
@endsection
  