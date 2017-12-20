@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-6 ">
        <div class="panel panel-primary" style="margin-bottom: 5px">
            @include('posts.headGuia') 
            @include('posts.marcas')                     
            @include('posts.productor2') 
            @include('posts.transportista') 
        </div>
    </div>
    <div class="col-md-6"> 
        @include('posts.regAnimal') 
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/script.js') }}"></script>
@endsection