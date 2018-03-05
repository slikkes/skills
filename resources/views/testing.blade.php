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
        let skillsToSelect=[];
        let n='[{';
        @foreach ($skills as $skill)
        skills.push(new Skill({{$skill->id}},"{{$skill->skillname}}"));
        skillsToSelect.push("{{$skill->skillname}}");
        @endforeach
        skillsToSelect=skillsToSelect.slice(0,-1);
        @foreach ($qwer as $qwe)

            @foreach ($qwe->notes as $note)
                n+='skillname:\''+skills[ {{$note->skill_id}}-1 ].skillname+'\', level:{{$note->level}}},{';
            @endforeach
            n=n.slice(0,-2)+']';

             card=$('<card ' +
                    ':id="{{$qwe->id}}" '+
                    'surname="{{$qwe->surname}}"'+
                    'firstname="{{$qwe->firstname}}"'+
                    ':point="{{$qwe->points->point}}"'+
                    'created_at="{{$qwe->created_at}}"'+
                    'updated_at="{{$qwe->updated_at}}"'+
                    ':skills="{{$skills}}"'+
                    ':nts="'+n+'"/>'
             );
             n='[{';
             $("#cardHolder").append(card);

            @foreach ($qwe->notes as $note)
                    notes.push(new Note({{$note->id}},{{$note->worker_id}},{{$note->skill_id}},{{$note->level}}));
            @endforeach

        @endforeach

        $(function(){
            $(".cards").flip()
        });

    </script>

<div id="shade">
    <div class="error" id="skillError">
        <p id="skillErrorX">&times;</p>
        <h3 id="skillErrorMsg"></h3>
        <div id="skillErrorNew">
            <form method="POST" id="changeSkillForm" action="/asdf">
                {{ csrf_field() }}
                <input type="hidden" name="worker_id" >
                <input type="hidden" name="skill_id" >
                <input type="hidden" name="level" >
                <input type="hidden" name="id">
                <input type="hidden" name="type" value="4">
                <input type="submit" name="changeSkill" value="updateSkill">
            </form>
        </div>
    </div>
</div>


<script src="{{URL::asset('js/asdf.js')}}"></script>
<script src="{{URL::asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
@stop