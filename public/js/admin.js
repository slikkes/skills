$(function() {
    $(".cardOp").click(function () {

        let token = $(this).data('token');
        let id= getIdOfBtn(this.id,10);

        $.ajax({
            type: "post",
            url: "deleteWorker",
            data: {_token: token, id: id},
            success:function(){

                $("#card"+id).remove();
            }
        })
    })
});

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
                console.log(msg);
                $("#noteHolder"+id).remove();
            }
        })
    })
});