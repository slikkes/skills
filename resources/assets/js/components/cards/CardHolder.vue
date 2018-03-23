<template>
    <div>
        <div id="filter" >


            <div class="filterElements">
                <select v-model="searchType">
                    <option value="point" selected>point</option>
                    <option value="skill">skill</option>
                    <option value="name">name</option>
                </select>
                ascending: <input type="checkbox" v-model="asc">
            </div>

            <div class="filterElements" v-if="searchType=='skill'">
            skill:
                <select  v-model="filterSkill" >
                    <option value="0" selected>all</option>
                    <option v-for="skill in skills" :value="skill.id">{{skill.skillname}}</option>
                </select>
            </div>

            <div class="filterElements" v-if="searchType=='name'">
                name:<input  v-model="filterName" type="text">
            </div>
        </div>

        <div id="cardHolder">
            <errors v-if="err>-1" :message="messages[err].message" v-on:closeError="errorHandler"></errors>
            <card v-for="card in cardsOrdered"
                  :card="card"
                  :skills="skills"
                  :auth="auth"
                  v-on:deleteWorker="deleteWorker"
                  v-on:error="errorHandler"
                  v-on:flipped="flip"></card>
            <new-card v-on:createNewWorker="createNewWorker" v-on:error="errorHandler"></new-card>
        </div>
    </div>
</template>

<script type="module">

    import Card from './Card.vue';
    import Errors from './Errors.vue';
    import NewCard from './NewCard.vue';
    import _ from 'lodash';
    import axios from 'axios';

    export default{


        beforeMount(){
            let self=this;
            axios.get('workers').then(function(response){
                setNotes(response.data[0]);
                self.Cards=response.data[0];
                self.skills=response.data[1];
            })
        },

        mounted(){
            console.log("cardholder");
        },

        beforeUpdate(){
            this.flipped.forEach(e=> {
                $('#card'+e).flip('toggle');
            });
        },

        updated(){
            this.flipped.forEach(e=>{
                $('#card'+e).flip('toggle');
            });
        },

        components:{
            Card, Errors, NewCard
        },

        props: ['auth'],
        data(){
            return {
                skills: [],
                Cards:[],
                err: -1,
                messages:[
                    {message: "Choose skill!"},
                    {message: "Skill already exists"},
                    {message: "surname field required"},
                    {message: "firstname field required"},
                ],
                searchType:'point',
                asc: false,
                filterSkill:0,
                filterName:"",
                flipped: []
            }
        },

        methods:{
            errorHandler(err){
                this.err=err;
            },

            createNewWorker(worker){
                let id=parseInt(worker.id);
                this.Cards.push({
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

                for (let i=this.Cards.length-1;i>=0;i--){
                    if(this.Cards[i].id===id){this.Cards.splice(i,1)}
                }
            },

            changedir(){
                this.dir = this.dir === "asc" ? "desc" : "asc";
            },

            flip(id){

                let i=this.flipped.indexOf(id);
                if(i>-1){this.flipped.splice(i,1)}
                else{this.flipped.push(id)}
            }
        },

        computed:{

            cardsOrdered(){

                let self= this;
                let c;
                switch(this.searchType){

                    case "name":

                        c= this.Cards.filter(card => {
                            return card.surname.toLowerCase().includes(self.filterName.toLowerCase())
                        });
                        let d= this.Cards.filter(card => {
                            return card.firstname.toLowerCase().includes(self.filterName.toLowerCase())
                        });
                        c=_.concat(c,_.difference(d,c));
                        break;

                    case "point":

                        c= _.sortBy(this.Cards,'points.point');
                        break;

                    case "skill":

                        if(self.filterSkill!=0){

                            let n=[];
                            c=[];

                            notes.forEach(e=>{
                                if(e.skill_id==self.filterSkill){n.push([e.worker_id,e.level])}
                            });

                            n=_.orderBy(n,1);
                            console.log(n);
                            n.forEach(function(queryElement){
                                self.Cards.forEach( (card)=>{
                                    if(card.id==queryElement[0]){c.push(card)}
                                })
                            })

                        }else{
                            c= _.sortBy(this.Cards,'points.point');
                        }
                        break;
                }

                return this.asc ? c : c.reverse();
            }
        }
    }
</script>

<style scoped>
    #cardHolder{
        margin:0 auto;
        padding:40px 0 40px 0;
        float:left;
        background-color:rgba(255,255,255,.2);
        width:90%;
        height:800px;
        overflow-y: scroll;
        overflow-x:hidden;
        position:relative;
    }
    #filter{
        width:90%;
        height:80px;
        padding:20px 0 20px 0;
        background-color: #ad8a8a;
    }
    .filterElements{
        width:175px;
        float:left;
    }

</style>
