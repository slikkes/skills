@extends('layouts.master')
@section('title','TEST')
@section('import')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/asdfStyle.css') }}">
    <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
{{--<script src="resources/assets/js/app.js"></script>
<script src="/assets/js/components/ExampleComponent.vue"></script>--}}
<script src="{{URL::asset('js/vue.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.4.0"></script>

<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>

<script>
    // rename myToken as you like
    window.myToken =  <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

@stop
@section('content')


<button onclick="newc()" >new</button>

    {{--<div id="cardHolder">
        @foreach ($qwer as $qwe)
            <test-component surname="{{$qwe->surname}}" firstname="{{$qwe->firstname}}" ></test-component>
        @endforeach
    </div>--}}

// $("#cardHolder").append('<card   id="{{$qwe->id}}"surname="{{$qwe->surname}}"firstname="{{$qwe->firstname}}"point="{{$qwe->points->point}}"created_at="{{$qwe->created_at}}"updated_at="{{$qwe->updated_at}}"></card>')


<div id="cardHolder">

</div>
<script>
    @foreach ($qwer as $qwe)

     card=$('<card />',{
            id:"{{$qwe->id}}",
            surname:"{{$qwe->surname}}",
            firstname:"{{$qwe->firstname}}",
            point:"{{$qwe->points->point}}",
            created_at:"{{$qwe->created_at}}",
            updated_at:"{{$qwe->updated_at}}"
        });
    $("#cardHolder").append(card);

         @foreach ($qwe->notes as $note)



         @endforeach

    @endforeach
</script>
<script>

        $(function(){
            $(".cards").flip();
        });

        function newc(){
            $('#cardHolder').append('<test-component surname="a" firstname="b"></test-component>')
        }



        let texts=["custom component","custom component2","custom component3","custom component"]

        Vue.component('test-component',
            {
                props:['surname', 'firstname'],
                template:
                    '<div class="cards">' +
                        '<div class="front">' +
                            '<div class="names">' +
                                 '<em>@{{ surname }} </em>' +
                                 '<em>@{{ firstname }}</em>' +
                            '</div>' +
                        '<div class="back"></div>' +
                    '</div>'

            });


        new Vue({
            el: '#cardHodlder',

        });





    </script>

    <style>
        .cardp{
            width:200px;
            height:300px;
            float:left;
        }
    </style>

    <script src="{{URL::asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
@stop