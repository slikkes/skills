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
    $(".filterPlus").click(function(){
        tr= $('<tr id="tr'+selectNumber+'">');
        td1= $('<td id="td'+selectNumber+'a">');
        td2= $('<td id="td'+selectNumber+'b" onclick="remove('+selectNumber+');">');
        l = $('<label for="skill_id">skillname: </label>');
        //s = $('<select name="skill_id'+selectNumber+'">');
        s = $('<select name="skill_id[]">');
        em = $('<em class="filterPlus" id="filterMinus'+selectNumber+'">&nbsp-</em>');
        $.each(skills, function (i, skill) {
            s.append($('<option>', {
                value: skill.id,
                text : skill.skillname
            }));
        });
        $('#filterSelects').append(tr);
        $('#tr'+selectNumber).append(td1,td2);
        $('#td'+selectNumber+'a').append(l,s);
        $('#td'+selectNumber+'b').append(em);
        $('#numberOfSelectors').val(selectNumber);
        selectNumber++;
        console.log( selectNumber);
    })
});

function remove(x){

       $("#tr"+x).remove();
       selectNumber--;
       $('#numberOfSelectors').val(selectNumber);
       console.log( selectNumber );


};
