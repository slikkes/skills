<template>
    <div class="cards" :id="'card'+id">

        <div class="front">
            <div class="names">
                <em v-bind:id="'fsurname'+id">{{ surname }}</em>
                <em v-bind:id="'ffirstname'+id">{{ firstname }} </em>
            </div>
            point:<em v-bind:id="'point'+id">{{point}}</em><br>
            created:{{created_at}}<br>
            updated:{{updated_at}}<br><br>
        </div>


        <div class="back">

            <div class="bnames" >
                <em :id="'bsurname'+id">{{surname}}&nbsp; </em>
                <em :id="'bfirstname'+id" > {{firstname}} </em>
            </div>


            <note v-for="note in notes" :id="id" :note="note"></note>

            <input type="button" value="new" class="newNoteBtn" :id="'newNoteBtn'+id" onclick="event.stopPropagation()">
            <new-note :skills="skills" :id="id" v-on:create-note="createNote"></new-note>



        </div>

    </div>
</template>



<script type = "text/javascript">
    import Note from './Note';
    import NewNote from './NewNote';
    export default {
        mounted() {
        },
        props:['nts','skills','id','surname','firstname','point','created_at','updated_at'],

        /*computed:{
            cache:false,
            get:function(){
                return nts;
            }
        },*/

        data(){
            return{
                notes: this.nts,
            }
        },

        /*data() {
            return {
                nts: [{
                    skillname: 'sss',
                    level: 3
                }]
            }
        },*/

        components:{
            Note,
            NewNote,
        },

        methods: {
            createNote(msg){

                this.nts.push({
                    //skillname: this.skills[msg.skill_id].skillname,
                    skillname: skills[msg.skill_id-1].skillname,
                    level: msg.level
                });
                this.point=msg.point;
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