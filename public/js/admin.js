
$(function() {
    $(".cardOp").click(function () {

        let id=$(this).attr('id');
        let type=id.charAt(0)
        id= getIdOfBtn(id,10);

        switch(type){
            case 'd':
                deleteWorker(id);
                break;
            case 'm':
                moidfyWorkerName(id);
                break;
            default :
                console.log("bad id");
                break;
        }
    })
});



function deleteWorker(id){

    let token =$('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "post",
        url: "deleteWorker",
        data: {_token: token, id: id},
        success:function(){
            console.log("#card"+id)
            $("#card"+id).remove();
        }
    })
}



function moidfyWorkerName(id){

    //choose which name

    $('.names'+id).hover(
        function(){
            $(this).css('background-color','rgba(0,0,0,.4)')
        },
        function(){
            $(this).css('background-color','rgba(0,0,0,0)')
        });


    let applyb=$('<p />',{
        class: "cardOp",
        id: "apply"+id,
        text: "APPLY",
        onclick: "event.stopPropagation(); apply("+id+");"
    });
    let cancelb=$('<p />',{
        class: "cardOp",
        id: "cancel"+id,
        text: "CANCEL",
        onclick: "event.stopPropagation(); resetmod("+id+",0,0);"
    });

    $('#modifyCard'+id).css("display","none");
    $('#card'+id+' .front').append(applyb,cancelb);



    //remove, input

    $('.names'+id).click(function(){
    console.log(id);
        event.stopPropagation();
        $(this).unbind('mouseenter mouseleave');
        $(this).css('background-color','rgba(0,0,0,0)');
        $(this).html("");
        let inputid=(this.id).slice(1);

        let input=$('<input />',{
            type: "text",
            id: inputid,
            width: 80,
            onclick: "event.stopPropagation()"

        }).insertBefore(this);
    })

}

function resetmod(id, nsurname, nfirstname){

    $("#apply"+id).remove();
    $("#cancel"+id).remove();
    $('#modifyCard'+id).css("display","block");
    $('#surname'+id).remove();
    $('#firstname'+id).remove();
    $('.names'+id).off();

    console.log(nfirstname);
    if(nsurname){
        $('#fsurname'+id).html(nsurname);
        $('#bsurname'+id).html(nsurname);
    }else{
        let surname=$('#bsurname'+id).text();
        $('#fsurname'+id).html(surname);
    }
    if(nfirstname){
        $('#ffirstname'+id).html(nfirstname);
        $('#bfirstname'+id).html(nfirstname);
    }else{
        let firstname=$('#bfirstname'+id).text();
        $('#ffirstname'+id).html(firstname);
    }
}


function apply(id){

    let _token=$('meta[name="csrf-token"]').attr('content');

    //1-2-3
    let newValue=[];
    newValue[0]="";
    let surname=0;
    let firstname=0;
    if($("#surname"+id).val()){
        newValue[0]+="surname";
        surname= $("#surname"+id).val();
        newValue.push(surname);
    }
    if($("#firstname"+id).val()){
        newValue[0]+="firstname";
        firstname=$("#firstname"+id).val();
        newValue.push(firstname);

    }

    console.log(firstname);

    $.ajax({
        type: "post",
        url: "modifyWorkerName",
        data:{
            _token: _token,
            type: 5,
            id: id,
            newValue: newValue
        },
        success:function(msg){
            console.log(msg)
            resetmod(id,surname,firstname);
        }
    })

}



//delete note

$(function(){
    $(".cardOpBack").click(function () {

        event.stopPropagation();
        let token = $(this).data('token');
        let id= getIdOfBtn(this.id,10);

        $.ajax({
            type: "post",
            url: "deleteNote",
            data: {_token: token, id: id},
            success:function(msg){
                $("#noteHolder"+id).remove();
            }
        })
    })
});

