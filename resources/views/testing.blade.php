@extends('layouts.master')
@section('title','TEST')
@section('import')
{{--<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/asdfStyle.css') }}">--}}
<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('js/Note.js')}}"></script>
<script src="{{URL::asset('js/CardsHelper.js')}}"></script>
<script src="{{URL::asset('js/vue.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.4.0"></script>
    <style>
        body{
            background-color:rgba(0,0,0,.2);
        }
        #cardApp{
            width:80%;
            height:90%;
            margin:0 auto;
        }

    </style>
@stop

@section('content')

    <div id="cardApp"><card-holder auth="@auth true @endauth"></card-holder></div>

    <script src="{{URL::asset('js/asdf.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

@stop