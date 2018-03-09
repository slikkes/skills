<template>
    <div class="cards" id="card0">
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
        mounted(){
            startFlip(0);
        },
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
                                firstname
                            });
                             $('#card'+id).flip(function(){console.log("na")}).delay(2800);


                        }
                    })
                } else {
                    this.$emit('error',err);
                }
            }
        }
    }


</script>

<style scoped>
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

    .back{
        padding-left:10px;
        text-align:left;
        border-radius:16px;
        border:solid rgb(140,30,10);
        background-color:rgba(140,30,10,.7);
        overflow-y: hidden;
        overflow-x:hidden;
    }

</style>