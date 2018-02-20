$(function() {
    $("#newCardb").click(function () {

        let token = $(this).data('token');
        let surname=$("#newCard").find("input[name='surname']").val();
        let firstname=$("#newCard").find("input[name='firstname']").val();

        $.ajax({
            type: "post",
            url: "asdf",
            data: {_token: token, surname:surname, firstname:firstname, type:2},
            success:function(msg){


                 createCard(msg);
            }
        })
    })
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
    let form=$('<form name="newNote{{$qwe->id}}" id="newNote{{$qwe->id}}" method="POST" action="/asdf" onclick="event.stopPropagation()">')


    $(d).insertBefore("#newCardDiv");
    $("#card"+id).append(front,back);
    $("#newFront"+id).append(frontContent);
    $("#newBack"+id).append(backheader);
    $(".cards").flip();

    $("#newCardDiv").flip("toggle");

}



/*
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
        <input type="range" min="0" max="10" step="1" name="level" id="newNoteRange{{$qwe->id}}"onchange="printRangeValue(this.id,this.value)">
    <div id="rangeValue{{$qwe->id}}"style="float:right;font-weight:bold;">5</div>
    <br>
    <input type="button" class="newSkillBtn" id="newSkillBtn{{$qwe->id}}" value="newSkill" name="submitBtn">

    <input type="hidden" name="type" value="1">
    </form>
    </div>

*/


