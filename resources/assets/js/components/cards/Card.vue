<template>
    <div class="cards" :id="'card'+card.id" @click="changeState">

        <div class="front">

            <div v-if="!editMode" class="names">
                <em>{{ card.surname }}</em>
                <em>{{ card.firstname}} </em>
            </div>

            <div v-if="editMode" class="names" onclick="event.stopPropagation()">
                <input v-model="newSurname">
                <input v-model="newFirstname">
            </div>

            point:<em v-bind:id="'point'+card.id">{{point}}</em><br>
            created:{{card.created_at}}<br>
            updated:{{card.updated_at}}<br><br>

            <div v-if="auth" onclick="event.stopPropagation()">
                <p class="cardOp"  @click="deleteWorker">DELETE</p><br>
                <p v-if="!editMode" class="cardOp" @click="modifyWorker">MODIFY</p>
                <p v-if="editMode" class="cardOp" @click="cancelModification">CANCEL</p>
                <p v-if="editMode" class="cardOp" @click="applyModification">APPLY</p>
            </div>
        </div>


        <div class="back">

            <div class="bnames" >
                <em>{{card.surname }}&nbsp; </em>
                <em> {{card.firstname }} </em>
            </div>

            <note v-for="note in notes"
                  :id="note.id"
                  :skillname="skills[note.skill_id-1].skillname"
                  :level="note.level"
                  :auth="auth"
                  :worker_id="card.id"
                  v-on:deleteNote="deleteNote"
            ></note>

            <button class="newNoteBtn" :id="'newNoteBtn'+card.id" @click="toggle">{{toggleButton}}</button>
            <new-note :skills="skills" :id="card.id" v-on:create-note="createNote" v-on:error="errorHandler"></new-note>

        </div>
    </div>
</template>

<script type = "text/javascript">
    import note from './Note.vue';
    import NewNote from './NewNote.vue';
    import _ from 'lodash';

    export default {

        mounted(){

            startFlip(this.card.id);

        },



        updated(){
            $('.cards').flip();

        },

        components:{
            note,
            NewNote,
        },


        props: ['card','skills','auth'],

        data(){

            return{
                notes: this.card.notes,
                point: this.card.points.point,
                editMode: false,
                newSurname: this.card.surname,
                newFirstname: this.card.firstname,
                toggleButton:"new",
            }
        },



        watch:{

            'card':function(newVal,oldVal){
                this.notes=newVal.notes;
                this.point=newVal.points.point;
            }
        },

        methods: {

            createNote(response){

                this.notes.push({
                    id: response.note_id,
                    skill_id: response.skill_id,
                    level: response.level
                });
                this.card.points.point=this.point=response.point;
                notes.push(new Note(response.note_id,this.card.id,response.skill_id,response.level));
            },

            deleteNote(response){

                for (let i=this.card.notes.length-1;i>=0;i--){
                    if(this.notes[i].id==response.id){this.notes.splice(i,1)}
                        }
                this.card.points.point=this.point=response.point;
            },

            deleteWorker(){

                let id=this.card.id;
                let token = $('meta[name="csrf-token"]').attr('content');
                let self=this;

                axios.post('/workers',{
                    _token: token,
                    type:"deleteWorker",
                    id: id,
                }).then(function(){
                    self.$emit('deleteWorker', id)
                })
            },

            modifyWorker(){
                this.editMode=true;
            },

            cancelModification(){
                this.editMode=false;
            },

            applyModification(){

                let token=$('meta[name="csrf-token"]').attr('content');
                let newSurname=this.newSurname;
                let newFirstname=this.newFirstname;
                let id=this.card.id;
                let self=this;

                axios.post('/workers',{
                    _token: token,
                    method: 'post',
                    type: "modifyName",
                    id: id,
                    surname: newSurname,
                    firstname: newFirstname
                }).then(function(){
                    self.card.surname=newSurname;
                    self.card.firstname=newFirstname;
                    self.editMode=false;
                }).catch(function(error){
                    console.log(error);
                })

            },

            errorHandler(err){
                this.$emit('error', err);
            },

            toggle(){
                event.stopPropagation();
                $('#newNoteForm'+this.card.id).slideToggle('slow');
                this.toggleButton = this.toggleButton === "new" ? "cancel" : "new";
            },

            changeState(){
                this.$emit('flipped',this.card.id)
            }
        }

    }

</script>

<style >
    .cards{
        width:300px;
        height:300px;
        float:left;
        text-align:center;
        margin:15px;
        cursor:pointer;

    }
    .front{
        padding-left:5px;
        border-radius:16px;
        border:solid rgb(140,30,10);
        background-color:rgba(140,30,10,.6);
    }
    .front:hover{
        background-color:rgba(140,30,10,.4);
        transition:.4s;
    }
    .names{
        display: block;
        font-size: 1.5em;
        width:80%;
        margin: 0.83em auto;
        font-weight: bold;
        text-decoration:underline;

    }

    .bnames{
        display: block;
        font-size: 1.17em;
        width:80%;
        margin: 0.83em auto;
        font-weight: bold;
        text-decoration:underline;
    }
    .back{
        padding-left:10px;
        text-align:left;
        border-radius:16px;
        border:solid rgb(140,30,10);
        background-color:rgba(140,30,10,.7);
        overflow-y: hidden;
        overflow-x:hidden;
    }

    .cardOp{
        margin:0 auto;
        width:140px;
        cursor:pointer;
        background-color:rgba(0,0,0,.2);
    }
    .cardOp:hover{
        background-color:rgba(0,0,0,.4);
    }
    .cardOpBack{
        margin:0 auto;
        width:80px;
        cursor:pointer;
        background-color:rgba(0,0,0,.2);
    }
    .cardOpBack:hover{
        background-color:rgba(0,0,0,.4);
    }
</style>
