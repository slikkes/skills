@extends('layouts.master')
@section('title','ASDF')
@section('import')
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/asdfStyle.css') }}">
   <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
 {{--<script src="{{URL::asset('js/Note.js')}}"></script>--}}
   <script src="{{URL::asset('js/Note2.js')}}"></script>
   <script src="{{URL::asset('js/Skill.js')}}"></script>
   <script src="{{URL::asset('js/admin.js')}}"></script>
   <script src="{{URL::asset('js/asdf.js')}}"></script>
   <script src="{{URL::asset('js/filter.js')}}"></script>
   <script src="{{URL::asset('js/Worker.js')}}"></script>
   <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
   <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>



   <script src="{{URL::asset('js/vue.min.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.4.0"></script>

@stop
@section('content')
    <div id="cardHolder">


        <div id="app">
            <card></card>
        </div>


        <script src="{{URL::asset('js/app.js')}}"></script>
        <script>let notes=[];</script>

        @foreach ($qwer as $qwe)

        <div class="cards" id="card{{$qwe->id}}">

            <div class="front">

                <div class="names" >
                    <em id="fsurname{{$qwe->id}}" class="names{{$qwe->id}}"> {{$qwe-> surname}}&nbsp; </em>
                    <em id="ffirstname{{$qwe->id}}" class="names{{$qwe->id}}"> {{$qwe->firstname}} </em>
                </div>

                point:<em id="point{{$qwe->id}}">{{$qwe->points->point}}</em><br>
                created:{{$qwe->created_at}}<br>
                updated:{{$qwe->updated_at}}<br><br>

                @auth
                    <p id="deleteCard{{$qwe->id}}" class="cardOp" onclick="event.stopPropagation()" >DELETE</p><br>
                    <p id="modifyCard{{$qwe->id}}" class="cardOp" onclick="event.stopPropagation()">MODIFY</p>
                @endauth

            </div>

            <div class="back" align="left">
                <table id="table{{$qwe->id}}">

                    <div class="bnames" >
                        <em id="bsurname{{$qwe->id}}">{{$qwe-> surname}}&nbsp; </em>
                        <em id="bfirstname{{$qwe->id}}" > {{$qwe->firstname}} </em>
                    </div>

                    @foreach ($qwe->notes as $note)
                        <tr id="noteHolder{{$note->id}}">
                            <td class="skillPoints">

                                <script>
                                    notes.push(new Note({{$note->id}},{{$note->worker_id}},{{$note->skill_id}},{{$note->level}}));
                                </script>

                                {{$skills[$note->skill_id-1]->skillname}}<br>
                                @for ($i=0;$i<$note->level;$i++)
                                    <img width="19" src="{{URL::asset('img/set.png')}}">
                                @endfor
                                <br><br>

                            </td>
                            <td>
                            @auth<em class="cardOpBack" id="deleteNote{{$note->id}}" data-token="{{ csrf_token() }}">DELETE</em>@endauth
                            </td>
                    </tr>
                    @endforeach
                </table>
                <input type="button" value="new" class="newNoteBtn" id="newNoteBtn{{$qwe->id}}" onclick="event.stopPropagation()">

                <div class="newNoteForm" id="newNoteForm{{$qwe->id}}" >



                    <form name="newNote{{$qwe->id}}" id="newNote{{$qwe->id}}" method="POST" action="/asdf" onclick="event.stopPropagation()">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$qwe->id}}" name="worker_id">
                        <select name="skill_id">

                            <option value="0">choose one</option>

                            @foreach($skills as $skill)
                                <option value="{{$skill->id}}">{{$skill->skillname}}</option>
                            @endforeach

                        </select>
                        <input type="range" min="1" max="10" step="1" name="level" id="newNoteRange{{$qwe->id}}"onchange="printRangeValue(this.id,this.value)">
                        <div id="rangeValue{{$qwe->id}}"style="float:right;font-weight:bold;">5</div>
                        <br>
                        <input type="button" class="newSkillBtn" id="newSkillBtn{{$qwe->id}}" value="newSkill" name="submitBtn">

                        <input type="hidden" name="type" value="1">
                    </form>


                </div>
            </div>
        </div>
    @endforeach

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
                    </tr>

                </table>

                <input type="hidden" name="type" value="2">
            </form>
            <td><button data-token="{{ csrf_token() }}" id="newCardb">newCard</button></td>
        </div>
    </div>
    </div>


    <div id="sideMenu">

        <form method="POST" action="/asdf">
            {{ csrf_field() }}
            <input type="hidden" value="1" name="numberOfSelectors" id="numberOfSelectors">
            <table id="filterSelects">
                <tr>
                    <td>
                        <label for="skillname">skillname:</label>

                        <select name="skill_id[]" id="skill_id">

                            <option value="0" >all</option>

                            <script>
                                let skills=[];
                                skills.push(new Skill(0,"all"))
                            </script>

                            @foreach($skills as $skill)

                                <script>skills.push(new Skill({{$skill->id}},"{{$skill->skillname}}"));</script>

                                <option value="{{$skill->id}}"
                                        @if($revalue>0)
                                        @if($skill->id==$revalue[0])selected="selected" @endif
                                        @endif
                                >{{$skill->skillname}}

                                </option>
                            @endforeach

                        </select>
                    </td>
                    <td>
                        <em id="filterPlus" class="filterPlus">+</em>
                    </td>
                </tr>

            </table>
            <br>
            <label for="level">min level:</label>
            <input type="number" name="minLevel" id="minLevel" value="{{$revalue[1]}}" min="1" max="10" >
            <br>
            <label for="level">max level:</label>
            <input type="number" name="maxLevel" id="maxLevel" value="{{$revalue[2]}}" min="1" max="10" >
            <br>
            <input type="submit" name="submitBtn" value="filter">

            <input type="hidden" name="type" value="3">
        </form>

        @auth
            qweraqwre
        @endauth

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach


                </ul>
            </div>
        @endif

    </div>
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

    <script>




            /*et s = $('<select/>');
            for (let i=1 in skills) {
                s.append($('<option>',{
                    value:i,
                    text: skills[i]
                }));
            }
            $('#filterSelects').append(s);*/




       /* $("#skill_id").change(function(){
           console.log($(this).val());
           if($(this).val()==0){
               $("#minLevel").attr("disabled", true) ;
               $("#maxLevel").attr("disabled", true) ;
           }else {
               $("#minLevel").attr("disabled", false);e
               $("#maxLevel").attr("disabled", false);
           }
         })*/

    </script>

    <a href="{{url('/')}}"><div id="backButton">back</div></a><div id="all">all</div>
@stop
