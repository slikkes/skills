function deleteFromNotesArray(id) {

    notes.forEach(function (e, i) {
        if (e.id == id) {
            notes.splice(i, 1);
        }
    });
}


function validNote(worker_id, skill_id){

    let error;
    skill_id === 0 ? error=0 : error=-1;
    notes.forEach(function(e){
        if(e.worker_id==worker_id &&e. skill_id==skill_id){
            error=1;
        }
    });
    return error;
}


function validWorker(surname, firstname){

    let err=-1;
    if(!firstname){err=3;}
    if(!surname){err=2;}
    return err;
}


function startFlip(id){

    $("#card"+id).ready(function(){

        $("#card"+id).flip();
    })
}