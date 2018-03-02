<template>

    <div class="newNoteForm" :id="'newNoteForm'+id" onclick="event.stopPropagation()" >

        <select name="skill_id" v-model="skill" >
            <option value="0" selected>choose one</option>
            <option v-for="(key, value) in skills" :value="key">{{value}}</option>
        </select>

        <input v-model="level" type="range" min="1" max="10" step="1"  :id="'newNoteRange'+id" onchange="printRangeValue(this.id,this.value)">

        <div :id="'rangeValue'+id" style="float:right;font-weight:bold;">5</div>

        <br>
        <button class="newSkillBtn" :id="'newSkillBtn'+id" @click="newNote">newskill</button>

    </div>

</template>

<script>
    export default {
        data: function(){
            return{
                skill: 0,
                level: 10
            };
        },
        props:['skills', 'id'],
        methods:{
            newNote(){
                const worker_id= this.id;
                const skill_id= this.skill;
                const level = this.level;
                this.$emit('create-note', {
                    worker_id,
                    skill_id,
                    level,
                });
            }
        }
    }
</script>