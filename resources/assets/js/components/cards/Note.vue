<template>

    <tr v-bind:id="'noteHolder'+id">
        <td class="skillPoints">
            {{skillname}}<br>
            <img  v-for="i in level" src="img/set.png" width="19">
            <br><br>
        </td>
        <td v-if="auth" >
            <em class="cardOpBack" @click="deleteNote">DELETE</em>
        </td>
    </tr>

</template>

<script>
    export default {
        mounted() {

        },
        props: ['id', 'skillname', 'level','auth','worker_id'],
        methods:{
            deleteNote(){

                event.stopPropagation();
                let token= $('meta[name="csrf-token"]').attr("content");
                let id=this.id;
                let self=this;

                axios.post('/workers',{
                    _token: token,
                    type:"deleteNote",
                    id: id,
                    worker_id: self.worker_id,
                }).then(function(response){
                    deleteFromNotesArray(id);
                    self.$emit('deleteNote', {
                        id,
                        point: response.data
                    })
                })


            }
        }
    }
</script>