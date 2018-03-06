class Card{

    constructor(id, surname, firstname, point, created_at, updated_at, skills, nts){
        this.id=id;
        this.surname=surname;
        this.firstname=firstname;
        this.point=point;
        this.created_at=created_at;
        this.updated_at=updated_at;

    }




    ':id="{{$qwe->id}}" '+
    'surname="{{$qwe->surname}}"'+
    'firstname="{{$qwe->firstname}}"'+
    ':point="{{$qwe->points->point}}"'+
    'created_at="{{$qwe->created_at}}"'+
    'updated_at="{{$qwe->updated_at}}"'+
    ':skills="{{$skills}}"'+
    ':nts="'+n+'"/>'
}


