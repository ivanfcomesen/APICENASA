@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-6">
        0        <div class="panel panel-default">
            @include('posts.headGuia') 
            <div class="panel-heading">MARCAS DE FIERROS</div>
            <br>
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