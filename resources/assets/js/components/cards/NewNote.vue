<template>

    <div class="newNoteForm" :id="'newNoteForm'+id" onclick="event.stopPropagation()" >

        <select v-model="skill_id" >
            <option value="0" selected>choose one</option>
            <option v-for="skill in skills" :value="skill.id">{{skill.skillname}}</option>
        </select>

        <input v-model="level" type="range" min="1" max="10" step="1"  :id="'newNoteRange'+id" onchange="printRangeValue(this.id,this.value)">

        <div :id="'rangeValue'+id" style="float:right;font-weight:bold;">10</div>

        <br>
        <button class="newSkillBtn" :id="'newSkillBtn'+id" @click="newNote">newskill</button>

    </div>

</template>

<script>
    export default {
        mounted(){
        },
        data: function(){
            return{
                skill_id: 0,
                level: 10
            };
        },

        props:['skills', 'id'],
        methods:{

            newNote(){

                const worker_id = this.id;
                const skill_id = this.skill_id;
                let err=validNote(worker_id, skill_id);
                if(err==-1) {

                    let token = $('meta[name="csrf-token"]').attr('content');

                    const level = parseInt(this.level);
                    let self = this;
                    $.ajax({
                        type: "post",
                        url: "asdf",
                        data: {
                            _token: token,
                            worker_id: worker_id,
                            skill_id: skill_id,
                            level: level,
                            type: 1
                        },
                        success: function (point) {

                            self.$emit('create-note', {
                                worker_id,
                                skill_id,
                                level,
                                point
                            });
                        }
                    })
                } else {
                    this.$emit('error',err);
                }
            }
        }
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

</script>