let selectNumber=1;
$(function(){
    $(".filterPlus").click(function(){

        tr= $('<tr id="tr'+selectNumber+'">');
        td1= $('<td id="td'+selectNumber+'a">');
        td2= $('<td id="td'+selectNumber+'b" onclick="remove('+selectNumber+');">');
        l = $('<label for="skill_id">skillname: </label>');
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

}