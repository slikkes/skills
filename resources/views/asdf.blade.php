@extends('layouts.master')
@section('title','ASDF')
@section('import')
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/workerSkillsStyle.css') }}">
   <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>

   <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.4.0"></script>

@stop
@section('content')

    <div id="VueApp">
        <card-holder auth="@auth true @endauth"></card-holder>
    </div>
    <a href="{{url('/')}}"><div id="backButton">back</div></a>

    <script src="{{URL::asset('js/CardsHelper.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>

    <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
@stop
