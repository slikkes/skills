$(function(){
    $(".cards").flip();
});

$(function(){
    $(".newNoteBtn" ).click(function() {
        let value=$(this).val();
        ($(this).val()=="new") ? $(this).val('cancel') : $(this).val('new');
        $( "#newNoteForm"+getIdOfBtn(this.id,10) ).slideToggle("slow",function(){

        });
    });
});



function getIdOfBtn(string, startPoint){
    let z="";
    for (let i=startPoint;i<string.length;i++){
        z+=string.charAt(i);}
    return z;
}

function printRangeValue(id,value){
    document.getElementById('rangeValue'+getIdOfBtn(id,12)).innerHTML=value;
}


//new note errors

$(function(){
    $(".newSkillBtn").click(function(){
        let id="newNote"+getIdOfBtn(this.id,11);
        let values=[];
        for(let i=1;i<4;i++){

            //0 token
            //1 worker_id
            //2 skill_id
            //3 level

            values[i]=document.getElementById(id).elements[i].value;
        }
        let msg="";
        let error=false;
        console.log(values[2]);
        if(values[2]==0){
            error=true;
            document.getElementById("skillErrorNew").style = "display:none;";
            msg='<h3 id="skillErrorMsg">válassz képességet!!</h3>';

        }
        else {

            for (let i = 0; i < notes.length; i++) {

                if (notes[i].worker_id == values[1] && notes[i].skill_id == values[2]) {
                    document.getElementById("skillErrorNew").style = "display:block;";
                    for(let j=1;j<4;j++){
                        document.getElementById("changeSkillForm").elements[j].value=values[j];
                    }
                    msg = "létezik. csere?"
                    error=true;
                }
            }
            if(!error){
                document.getElementById(id).submit();
            }
        }
        if(error){
            document.getElementById("shade").style="display:block";
            document.getElementById("skillError").style = "display:block;";
            document.getElementById("skillErrorMsg").innerHTML=msg;

        }


    })
});

$(function(){
    $("#skillErrorX").click(function(){
        document.getElementById("skillError").style="display:none;";
        document.getElementById("shade").style="display:none;";
    })
});


let selectNumber=1;
$(function(){
    $("#filterPlus").click(function(){

        let top=$(this).css({ top : "+=" +20 + 'px'});
        console.log(top);
        $(this).css('top',top);
        l = $('<label for="skillname">skillname: </label>');
        s = $('<select name="skill_id'+selectNumber+'">');
        b = $('<br>');
        em = $('<em class="filterPlusMinus">-</em>');
        $.each(skills, function (i, skill) {
            s.append($('<option>', {
                value: skill.id,
                text : skill.skillname
            }));
        });
        $('#filterSelects').append(l,s,em,b);
        selectNumber++;
    })
})
