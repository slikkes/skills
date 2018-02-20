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



function getIdOfBtn(string, startPoint){
    let z="";
    for (let i=startPoint;i<string.length;i++){
        z+=string.charAt(i);}
    return z;
}



function printRangeValue(id,value){
    $('#rangeValue'+getIdOfBtn(id,12)).html(value);
}



