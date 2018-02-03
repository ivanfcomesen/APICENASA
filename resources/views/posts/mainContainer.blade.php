@extends('layouts.master')
@section('content')
<div class="col-md-5" style="padding: 5px">               
        @include('posts.headGuia')                  
        @include('posts.productor') 
        @include('posts.transportista')        
    </div>
    <div class="col-md-5"  style="padding: 5px">
        @include('posts.regAnimal')                      
    </div>
     <div class="col-md-2" style="padding: 5px">
        @include('posts.tablaTipos')                      
    </div>

@endsection
@section('script')
<script src="{{ asset('js/script.js') }}"></script>
@endsection
  