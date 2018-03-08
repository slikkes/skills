<template>
    <div id="cardHolder">

        <div id="filter">

            <select v-model="skill_id" >
                <option value="0" selected>choose one</option>
                <option v-for="skill in skills" :value="skill.id">{{skill.skillname}}</option>
            </select>

            surname:<input v-model="surname" type="text">
            firstname:<input v-model="firstname" type="text">

            <button @click="filter">filter</button>

        </div>

        <errors v-if="err>-1" :message="messages[err].message" v-on:closeError="errorHandler"></errors>
        <card v-for="card in cards" :card="card" :skills="skills" :auth="auth" v-on:deleteWorker="deleteWorker" v-on:error="errorHandler"></card>
        <new-card v-on:createNewWorker="createNewWorker" v-on:error="errorHandler"></new-card>
    </div>
</template>

<script type="module">

    import Card from './Card.vue';
    import Errors from './Errors.vue';
    import NewCard from './NewCard.vue';
    import _ from 'lodash';
    export default{
        mounted(){
            console.log(this.cards);
            console.log(_.orderBy(this.cards,'point'));
        },
        props: ['cards','skills','auth'],
        data(){
            return {

                err: -1,
                messages:[
                    {message: "Choose skill!"},
                    {message: "Skill already exists"},
                    {message: "surname field required"},
                    {message: "firstname field required"},
                ],
                dir: 'desc'
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
        computed:{
            cardsOrdered(){
                return _.orderBy(this.cards,'point');
            }
        }

    }
</script>

<style>
    #cardHolder{
        position:relative;
    }
</style>