$(function(){
    $(".cards").flip();
});

$(function(){
    $("#all").click(function(){
        $(".cards").flip({trigger:'manual'});
        $(".cards").flip('toggle');

        console.log("adfasfd");
    });
});

function startFlip(id){
    $("#card"+id).flip();
}

function getIdOfBtn(string, startPoint){
    let z="";
    for (let i=startPoint;i<string.length;i++){
        z+=string.charAt(i);}
    return z;
}



function printRangeValue(id,value){
    $('#rangeValue'+getIdOfBtn(id,12)).html(value);
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