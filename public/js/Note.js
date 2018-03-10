class Note{
    constructor(id,worker_id,skill_id,level){
        this.id=id;
        this.worker_id=worker_id;
        this.skill_id=skill_id;
        this.level=level;
    }
}


//toggle new note form

/*$(function(){
    $(document).ready(toggleNewNoteForm(".newNoteBtn"));
});*/

function toggleNewNoteForm(id){
    console.log(id);
    $(id).unbind('click');

    $(id).click(function() {
        let value=$(this).val();
        ($(this).val()=="new") ? $(this).val('cancel') : $(this).val('new');
        $( "#newNoteForm"+getIdOfBtn(this.id,10) ).slideToggle("slow");
    });
}

function updateToggleButtons(){
    console.log("upd");
    $('.newNoteBtn').unbind('click');

    $('.newNoteBtn').click(function(){
        ($(this).val()=="new") ? $(this).val('cancel') : $(this).val('new');
        $( "#newNoteForm"+getIdOfBtn(this.id,10) ).slideToggle("slow");
    })
}
/**/