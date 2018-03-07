@extends('layouts.master')
@section('title','TEST')
@section('import')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/asdfStyle.css') }}">
<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('js/Note.js')}}"></script>
@stop

@section('content')
    <script>notes=[];</script>
    @php
        $allNotes=array();
    @endphp
<script>
    @foreach ($qwer as $qwe)
        @foreach ($qwe->notes as $note)
            @php array_push($allNotes, $note); @endphp
              notes.push(new Note({{$note->id}},{{$note->worker_id}},{{$note->skill_id}},{{$note->level}}));
        @endforeach
    @endforeach


    </script>
<div id="cardApp"><card-holder :cards="{{$qwer}}" :skills="{{$skills}}" auth="@auth true @endauth"></card-holder></div>


    <script src="{{URL::asset('js/asdf.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

@stop