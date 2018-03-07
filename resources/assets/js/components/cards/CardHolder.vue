<template>
    <div id="cardHolder">
        <errors v-if="err>-1" :message="messages[err].message" v-on:closeError="errorHandler"></errors>
        <card v-for="card in Cards" :card="card" :skills="skills" :auth="auth" v-on:deleteWorker="deleteWorker" v-on:error="errorHandler"></card>
        <new-card v-on:createNewWorker="createNewWorker" v-on:error="errorHandler"></new-card>
    </div>
</template>

<script>

    import Card from './Card.vue';
    import Errors from './Errors.vue';
    import NewCard from './NewCard.vue';

    export default{

        props: ['cards','skills','auth'],
        data(){
            return {
                Cards: this.cards,
                err: -1,
                messages:[
                    {message: "Choose skill!"},
                    {message: "Skill already exists"},
                    {message: "surname field required"},
                    {message: "firstname field required"},
                ]
            }
        },
        components:{
            Card, Errors, NewCard
        },
        methods:{
            errorHandler(err){
                this.err=err;
            },

            createNewWorker(worker){
                let id=parseInt(worker.id);
                this.cards.push({
                    id:id,
                    surname:worker.surname,
                    firstname: worker.firstname,
                    notes: [],
                    point: 0,
                    created_at:'-',
                    updated_at:'-'
                });
            },

            deleteWorker(id){

                for (let i=this.cards.length-1;i>=0;i--){
                    if(this.cards[i].id==id){this.cards.splice(i,1)}
                }

            }
        },
    }
</script>

<style>
    #cardHolder{
        position:relative;
    }
</style>