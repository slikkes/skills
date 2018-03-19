<template>
    <div>
        <h1>{{text}}</h1>
        </br>
        <input v-model="newItem">
        <button @click ="addItemToList">add</button>
        <!-- displays list -->
        <!--<ul>
            <li v-for="item in listItems">{{ item }}</li>
        </ul>-->
    </div>
</template>

<script>
    export default {
        name: 'list',
        mounted(){
            console.log('list mounted')
        },
        props:['text'],
        data () {
            return {
                listItems: ['buy food', 'play games', 'sleep'],
                newItem:'',
            }
        },
        methods:{
            addItemToList(){

                this.listItems.push(this.newItem);
                this.newItem='';
            }
        }

    }
</script>