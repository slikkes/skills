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

            <table v-bind:id="'table'+id">
                <note v-for="(value, key) in nts"  id="0" :skillname="key" :level="value"></note>
            </table>

            <input type="button" value="new" class="newNoteBtn" :id="'newNoteBtn'+id" onclick="event.stopPropagation()">

            <div class="newNoteForm" :id="'newNoteForm'+id" >

                <form v-bind:id="'newNote'+id" method="POST" action="/asdf" onclick="event.stopPropagation()">

                    <input type="hidden" :value="id" name="worker_id">
                    <select name="skill_id">
                        <option value="0">choose one</option>
                        <option v-for="(key, value) in skills" :value="key">{{value}}</option>
                    </select>
                    <input type="range" min="1" max="10" step="1" name="level" :id="'newNoteRange'+id" onchange="printRangeValue(this.id,this.value)">
                    <div :id="'rangeValue'+id" style="float:right;font-weight:bold;">5</div>
                    <br>
                    <input type="button" class="newSkillBtn" :id="'newSkillBtn'+id" value="newSkill" name="submitBtn">
                    <input type="hidden" name="type" value="1">

                </form>

            </div>
        </div>

    </div>
</template>



<script>

    export default {
        mounted() {
            console.log('Card mounted.')
        },
        props: {
            nts: {
                type: Object,
                default: () => ({})
            },
            skills:{
                type:Object,
                default: () => ({})
            },
            id:{
                type:Number
            },
            surname:{
                type:String
            },
            firstname:{
                type:String
            },
            point:{
                type:Number
            },
            created_at: {
                type:String
            },
            updated_at: {
                type:String
            },
        }

    }

</script>





<style scoped>
    /* CSS here
     * by including `scoped`, we ensure that all CSS
     * is scoped to this component!
     */
</style>