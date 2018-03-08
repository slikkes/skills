@extends('layouts.master')
@section('title','TEST')
@section('import')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/asdfStyle.css') }}">
<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('js/Note.js')}}"></script>
<script src="{{URL::asset('js/CardsHelper.js')}}"></script>
<script src="{{URL::asset('js/vue.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.4.0"></script>
@stop

@section('content')

    <script>notes=[];</script>
    @foreach ($qwer as $qwe)
        @foreach ($qwe->notes as $note)
            <script>notes.push(new Note({{$note->id}},{{$note->worker_id}},{{$note->skill_id}},{{$note->level}}));</script>
        @endforeach
    @endforeach

{{--
    <div id="sortingTestApp">
       <table>
           <thead>
            <tr>
                <th v-for="column in columns">
                    <a href="#" @click="sortBy(column)" :class="{active: sortKey == column}">
                        @{{ column }}
                    </a>
                </th>
            </tr>
           </thead>
           <tbody>
            <tr v-for="user in orderedUsers">
                <td>@{{ user.name }}</td>
                <td> @{{ user.age }}</td>
            </tr>
           </tbody>
       </table>
    </div>
<style>

    a {
        font-weight: normal;
        color: blue;
    }

    a.active {
        font-weight: bold;
        color: black;
    }
</style>


    <script type="module">

       // console.log(_.sortBy(notes,'level'));

        let sorting=new Vue({

            el: '#sortingTestApp',

            data() {
                return{
                    sortKey: 'name',

                    columns: ['name', 'age'],

                    users: [
                        {name: 'John', age: 50},
                        {name: 'Jane', age: 22},
                        {name: 'Paul', age: 34},
                        {name: 'Kate', age: 15},
                        {name: 'Amanda', age: 65},
                        {name: 'Steve', age: 38},
                        {name: 'Keith', age: 21},
                        {name: 'Don', age: 50},
                        {name: 'Susan', age: 21}
                    ]
                }
            },
            methods:{
                sortBy(sortKey){
                    this.sortKey=sortKey;
                }
            },
            computed:{
                orderedUsers: function(){
                    return _.orderBy(this.users, this.sortKey);
                }
            }


        });


    </script>--}}

    <div id="cardApp"><card-holder :cards="{{$qwer}}" :skills="{{$skills}}" auth="@auth true @endauth"></card-holder></div>


    <script src="{{URL::asset('js/asdf.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

@stop