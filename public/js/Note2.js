class Note{
    constructor(id,worker_id,skill_id,level){
        this.id=id;
        this.worker_id=worker_id;
        this.skill_id=skill_id;
        this.level=level;
    }
}


//toggle new note form

$(function(){
    $(document).ready(toggleNewNoteForm(".newNoteBtn"));
});

function toggleNewNoteForm(id){

    $(id).click(function() {
        let value=$(this).val();
        ($(this).val()=="new") ? $(this).val('cancel') : $(this).val('new');
        $( "#newNoteForm"+getIdOfBtn(this.id,10) ).slideToggle("slow");
    });
};



//new note



function createNewNote(values){
    $.ajax({
        type: "post",
        url: "asdf",
        data: {
            _token: values[0],
            worker_id: values[1],
            skill_id: values[2],
            level: values[3],
            type: 1
        },
        success:function(msg) {
            $("#newNoteBtn" + values[1]).val('new');
            $("#newNoteForm" + values[1]).slideToggle("fast",function(){
                let skillpoints = "<br>";
                for (let i = 0; i < values[3]; i++) {
                    skillpoints += '<img style="margin:2px;" width="19" src="img/set.png">';
                }
                $("#table" + values[1]).append("<tr><td>" + skills[values[2]].skillname + skillpoints + "</td><td></td></tr>");

                $("#point" + values[1]).html(msg);
            })


        }
    })

}


//new note errors
$(function(){
    $(document).ready(newNoteErrors(".newSkillBtn"))
});

function newNoteErrors(id) {
    $(id).click(function () {
        let id = "newNote" + getIdOfBtn(this.id, 11);
        let values = [];
        for (let i = 0; i < 4; i++) {

            //0 token
            //1 worker_id
            //2 skill_id
            //3 level

            values[i] = document.getElementById(id).elements[i].value;

        }
        let msg = "";
        let error = false;

        if (values[2] == 0) {
            error = true;
            $("#skillErrorNew").css("display", "none");
            msg = '<h3 id="skillErrorMsg">válassz képességet!!</h3>';

        }
        else {
            for (let i = 0; i < notes.length; i++) {

                if (notes[i].worker_id == values[1] && notes[i].skill_id == values[2]) {
                    $("#skillErrorNew").css("display", "block");
                    for (let j = 1; j < 4; j++) {
                        document.getElementById("changeSkillForm").elements[j].value = values[j];
                    }
                    document.getElementById("changeSkillForm").elements[4].value = notes[i].id;
                    msg = "létezik. csere?";
                    error = true;
                }
            }

            if (!error) {
                //document.getElementById(id).submit();
                createNewNote(values);
            }
        }
        if (error) {
            $("#shade").css("display", "block");
            $("#skillError").css("display", "block");
            $("#skillErrorMsg").html(msg);

        }
    });
}


$(function(){
    $("#skillErrorX").click(function(){
        $("#skillError").css("display","none");
        $("#shade").css("display","none");

    })
});