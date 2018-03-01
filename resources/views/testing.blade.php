@extends('layouts.master')
@section('title','TEST')
@section('import')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/asdfStyle.css') }}">
<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
<script src="{{URL::asset('js/vue.min.js')}}"></script>
<script src="{{URL::asset('js/Note.js')}}"></script>
<script src="{{URL::asset('js/Skill.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.4.0"></script>
<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
@stop

@section('content')

<div id="cardHolder"></div>

    <script>

        let notes=[];
        let skills=[];
        let skillsToSelect="{";
        @foreach ($skills as $skill)
        skills.push(new Skill({{$skill->id}},"{{$skill->skillname}}"));
        skillsToSelect+="{{$skill->skillname}}:{{$skill->id}},";
        @endforeach
        console.log();
        skillsToSelect=skillsToSelect.slice(0,-1)+'}';
        @foreach ($qwer as $qwe)
           nts="{asd:2,erwe:4}";
           console.log({{count($qwe->notes)}});
             card=$('<card ' +
                    ':id="{{$qwe->id}}" '+
                    'surname="{{$qwe->surname}}"'+
                    'firstname="{{$qwe->firstname}}"'+
                    ':point="{{$qwe->points->point}}"'+
                    'created_at="{{$qwe->created_at}}"'+
                    'updated_at="{{$qwe->updated_at}}"'+
                    ':skills="'+skillsToSelect+'"'+
                    ':nts="{'+
                     @php
                         $c=count($qwe->notes);
                     @endphp
                     @foreach($qwe->notes as $note)

                         skills[{{$note->skill_id}}-1].skillname+': '+ {{$note->level}}

                         @if ($c>1)
                             +','+
                             @php $c--; @endphp
                         @else
                             +
                         @endif


                     @endforeach
                 '}"/>'
                );

            $("#cardHolder").append(card);

            @foreach ($qwe->notes as $note)
                notes.push(new Note({{$note->id}},{{$note->worker_id}},{{$note->skill_id}},{{$note->level}}));
            @endforeach

        @endforeach

            $(".back").ready(function(){

            notes.forEach(function(e){

                note=$('<note />',{
                    id: e.id,
                    skillname:skills[e.skill_id-1].skillname,
                    level:e.level
                });


                $("#table"+e.worker_id).append(note);
                });
            });

        $(function(){
            $(".cards").flip()
        });

    </script>

<script src="{{URL::asset('js/asdf.js')}}"></script>
<script src="{{URL::asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
@stop