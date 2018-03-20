<template>
    <div>
        <h1>{{text}}</h1>
        </br>
        <input v-model="newItem">
        <button @click ="addItemToList">add</button>
        <!-- displays list -->
        <ul>
            <li v-for="item in listItems">{{ item }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'list',

        props:['items'],

        data () {

            return {
                text: "test",
                listItems: this.items,
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