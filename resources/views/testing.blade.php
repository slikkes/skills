@extends('layouts.master')
@section('title','TEST')
@section('import')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/asdfStyle.css') }}">
    <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('js/asdf.js')}}"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
@stop
@section('content')
    <div class="cards" id="newCardDiv">
        <div class="front">
            <h1 style="margin:100px 145px">+</h1>
        </div>

        <div class="back" >
            <form id="newCard" method="POST" action="/asdf" onclick="event.stopPropagation()">
                {{ csrf_field() }}
                <table id="input">
                    <tr>
                        <td>surname:</td>
                        <td><input type="text" name="surname"></td>
                    </tr>
                    <tr>
                        <td>firstname:</td>
                        <td><input type="text" name="firstname"></td>
                    </tr>
                    <tr>
                        <td></td>
                        {{--<td><input type="submit" name="submitBtn" id="newCardb" data-token="{{ csrf_token() }} value="newCard"></td>--}}
                    </tr>
                </table>

                <input type="hidden" name="type" value="2">
            </form>
            <td><button data-token="{{ csrf_token() }}" id="newCardb">newCard</button></td>
        </div>
    </div>
    </div>






 {{--   <form name="newNote{{$qwe->id}}" id="newNote{{$qwe->id}}" method="POST" action="/asdf" onclick="event.stopPropagation()">
        {{ csrf_field() }}
        <input type="hidden" value="{{$qwe->id}}" name="worker_id">
        <select name="skill_id">

            <option value="0">choose one</option>

            @foreach($skills as $skill)
                <option value="{{$skill->id}}">{{$skill->skillname}}</option>
            @endforeach

        </select>
        <input type="range" min="0" max="10" step="1" name="level" id="newNoteRange{{$qwe->id}}"onchange="printRangeValue(this.id,this.value)">
        <div id="rangeValue{{$qwe->id}}"style="float:right;font-weight:bold;">5</div>
        <br>
        <input type="button" class="newSkillBtn" id="newSkillBtn{{$qwe->id}}" value="newSkill" name="submitBtn">

        <input type="hidden" name="type" value="1">
    </form>--}}






<script>
    let skills=[{id: 0, skillname: "aaa"},{id: 0, skillname: "sss"},{id: 0, skillname: "ddd",}];
    let msg={surname: "asdf", firstname: "sd", updated_at: "2018-02-21 07:52:52", created_at: "2018-02-21 07:52:52", id: 20}
    createCard(msg);

    $(function(){
        $(".newNoteBtn" ).click(function() {
            let value=$(this).val();
            ($(this).val()=="new") ? $(this).val('cancel') : $(this).val('new');
            $( "#newNoteForm"+getIdOfBtn(this.id,10) ).slideToggle("slow",function(){
            });
        });
    });

    function createCard(msg){

        let worker=JSON.stringify(msg);
        worker=JSON.parse(worker);

        let id=worker.id;
        let crea=worker.created_at;
        let upda=worker.updated_at;
        let surname=worker.surname;
        let firstname=worker.firstname;



        let d=$('<div class="cards" id="card'+id+'" >');
        let front=$('<div class="front" id="newFront'+id+'">');
        let frontContent=$('<h2><u>'+surname+' '+firstname+'</u></h2>point:0<br>created:'+crea+'<br>updated:'+upda+'<br><br>')
        let back=$('<div class="back" id="newBack'+id+'">');
        let backheader=$(' <h3><u>'+surname+' '+firstname+'</u></h3>');

        let newbutton=$('<input />',{
            type: 'button',
            value: 'new',
            class: 'newNoteBtn',
            id: 'newNoteBtn'+id,
            onclick: 'event.stopPropagation()'
        });
        let newdiv=$('<div />',{
            class: 'newNoteForm',
            id: 'newNoteForm'+id
        });

        let form=$('<form />',{
            name: 'newNote'+id,
            id: 'newNote'+id,
            method: 'POST',
            action: '/asdf',
            onclick: 'event.stopPropagation()'
        });

        let select=$('<select>')
        let inputh=$('<input />',{
            type: 'hidden',
            value: id,
            name: 'worker_id'
        });

        let inputl=$('<input />',{
            type: 'range',
            name:'level',
            id: 'newNoteRange'+id,
            min: 1,
            max: 10,
            step: 1,
            onchange: "printRangeValue(this.id,this.value)"
        });
        let inputh2=$('<input />',{
            type: 'hidden',
            name: 'type',
            value: 1
        });

        let ranval=$('<div />',{
            id: 'rangeValue'+id,
            class: 'rangeValue'
        });
        let inputb=$('<input />',{
            type: 'button',
            class: 'newSkillBtn',
            id: 'newSkillBtn'+id,
            value: 'newSkill"'
        });

        let table=$('<table />',{
            id: 'table'+id
        });

        $(d).insertBefore("#newCardDiv");
        $("#card"+id).append(front,back);
        $("#newFront"+id).append(frontContent);
        $("#newBack"+id).append(backheader,table,newbutton,newdiv);
        $("#newNoteForm"+id).append(form);
        $("#newNote"+id).append(inputh,select,inputl,ranval,inputh2,$('<br>'),inputb);
        $(skills).each(function(){
            select.append($('<option>').attr('value',this.id).text(this.skillname));
        });
        $(".cards").flip();
        $("#newCardDiv").flip("toggle");

    }
</script>
@stop