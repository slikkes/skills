<template>
    <div class="cards">
        <div class="front">
            +
        </div>
        <div class="back">
            <div class="inputs" onclick="event.stopPropagation()">
                <input type="text" v-model="surname">
                <input type="text" v-model="firstname">
                <button @click="createNewWorker">new worker</button>
            </div>
        </div>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                surname:"",
                firstname:"",
            }
        },

        methods:{
            createNewWorker(){
                const surname=this.surname;
                const firstname=this.firstname;
                let err=validWorker(surname, firstname);
                if(err==-1) {

                    let token = $('meta[name="csrf-token"]').attr('content');

                    const level = parseInt(this.level);
                    let self = this;
                    $.ajax({
                        type: "post",
                        url: "asdf",
                        data: {
                            _token: token,
                            surname:surname,
                            firstname:firstname,
                            type: 2
                        },
                        success: function (id) {

                            self.$emit('createNewWorker', {
                                id : id,
                                surname,
                            });
                            $('#card'+id).ready(function(){
                                console.log(id);
                                $('#card'+id).flip();
                            })
                        }
                    })
                } else {
                    this.$emit('error',err);
                }
            }
        }
    }

    function validWorker(surname, firstname){
        let err=-1;
        if(!firstname){err=3;}
        if(!surname){err=2;}
        return err;
    }
</script>