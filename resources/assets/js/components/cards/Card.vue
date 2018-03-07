<template>
    <div class="cards" :id="'card'+card.id">

        <div class="front">

            <div v-if="!editMode" class="names">
                <em>{{ card.surname }}</em>
                <em>{{ card.firstname }} </em>
            </div>

            <div v-if="editMode" class="names" onclick="event.stopPropagation()">
                <input v-model="newSurname">
                <input v-model="newFirstname">
            </div>

            point:<em v-bind:id="'point'+card.id">{{card.point}}</em><br>
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
                <em>{{card.surname}}&nbsp; </em>
                <em> {{card.firstname}} </em>
            </div>

            <note v-for="note in Notes"
                  :id="note.id"
                  :skillname="skills[note.skill_id-1].skillname"
                  :level="note.level"
                  :auth="auth"
                  v-on:deleteNote="deleteNote"
            ></note>

            <input type="button" value="new" class="newNoteBtn" :id="'newNoteBtn'+card.id" onclick="event.stopPropagation()">
            <new-note :skills="skills" :id="card.id" v-on:create-note="createNote" v-on:error="errorHandler" ></new-note>
        </div>

    </div>
</template>

<script type = "text/javascript">
    import Note from './Note';
    import NewNote from './NewNote';

    export default {
        mounted(){

            toggleNewNoteForm("#newNoteBtn"+this.card.id);

        },
        props: ['card','skills','auth'],
        data(){
            return{
                Notes: this.card.notes,
                editMode: false,
                newSurname: this.card.surname,
                newFirstname: this.card.firstname
            }
        },

        components:{
            Note,
            NewNote,
        },

        methods: {
            createNote(msg){

                this.card.notes.push({
                    skill_id: msg.skill_id,
                    level: msg.level
                });
                console.log(msg.point);
                this.card.point=msg.point;
            },

            deleteNote(id){

                for (let i=this.card.notes.length-1;i>=0;i--){
                    if(this.card.notes[i].id==id){this.card.notes.splice(i,1)}
                        }
                console.log(id);
                        //notes.splice(id,1);


            },

            deleteWorker(){
                let id=this.card.id;
                let token = $('meta[name="csrf-token"]').attr('content');
                let self=this;
                console.log(token);
                $.ajax({
                    method: 'post',
                    url: 'deleteWorker',
                    data:{
                        _token: token,
                        id: id,
                    },
                    success:function(){
                        self.$emit('deleteWorker', id)
                    }
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
                $.ajax({
                    type: "post",
                    url: "modifyWorkerName",
                    data:{
                        _token: token,
                        method: 'post',
                        url: 'modifyWorkerName',
                        type: 5,
                        id: id,
                        surname: newSurname,
                        firstname: newFirstname
                    },
                    success:function(msg){
                        self.card.surname=newSurname;
                        self.card.firstname=newFirstname;
                        self.editMode=false;
                    }
                })
            },

    errorHandler(err){
                this.$emit('error', err);
            }
        }
    }



</script>





<style scoped>
    /* CSS here
     * by including `scoped`, we ensure that all CSS
     * is scoped to this component!
     */
</style>