@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-md-6">

        @include('posts.headGuia') 
        @include('posts.productor2') 

        <div class="panel panel-default">
            <div class="panel-heading">MARCAS DE FIERROS</div>
            <br> <br>
            <div class="panel-body"></div>
        </div>
    </div>
    <div class="col-md-6">

        @include('posts.transportista') 
        @include('posts.regAnimal') 

    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/script.js') }}"></script>
@endsection