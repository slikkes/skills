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
                console.log(msg);

                 createCard(msg);
            }
        })
    })
});





//create new card

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
    let frontContent=$('<h2><u>'+surname+' '+firstname+'</u></h2>point:<em id="point'+id+'">0</em><br>created:'+crea+'<br>updated:'+upda+'<br><br>')
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


    let token=$("#newCard input").get(0);

    let inputh=$('<input />',{
        type: 'hidden',
        value: id,
        name: 'worker_id'
    });
    let select=$('<select name="skill_id">')

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


    //0 token
    //1 worker_id
    //2 skill_id
    //3 level
    //
    // jknQ6Q922peWggjsIhJtmw2KtItgpYMdOxlnf5Rw
    // jknQ6Q922peWggjsIhJtmw2KtItgpYMdOxlnf5Rw

    $(d).insertBefore("#newCardDiv");
    $("#card"+id).append(front,back);
    $("#newFront"+id).append(frontContent);
    $("#newBack"+id).append(backheader,table,newbutton,newdiv);
    $("#newNoteForm"+id).append(form);
    $("#newNote"+id).append(token,inputh,select,inputl,ranval,inputh2,$('<br>'),inputb);
    $(skills).each(function(){
        select.append($('<option>').attr('value',this.id).text(this.skillname));
    });

    $(".cards").flip();
    $("#newCardDiv").flip("toggle");

    toggleNewNoteForm("#newNoteBtn"+id);

    console.log("ready");
    newNoteErrors("#newSkillBtn"+id);

}




