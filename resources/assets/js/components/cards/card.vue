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

            <notes :nts="nts" :id="id"></notes>

            <input type="button" value="new" class="newNoteBtn" :id="'newNoteBtn'+id" onclick="event.stopPropagation()">
            <new-note :skills="skills" :id="id" v-on:create-note="createNote"></new-note>


        </div>

    </div>
</template>



<script type = "text/javascript">
    import Notes from './Notes';
    import NewNote from './NewNote';
    export default {
        mounted() {
            console.log('Card mounted.')
        },

        components:{
            Notes,
            NewNote,
        },

        props:['nts','skills','id','surname','firstname','point','created_at','updated_at'],

        methods: {
            createNote(msg){
                console.log(this.nts);
               /* this.nts.push({
                    asdf : msg.level,

                });*/
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