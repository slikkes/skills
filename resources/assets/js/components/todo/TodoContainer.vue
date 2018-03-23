<template>
    <div>
        <todoitem
                v-for="id in $store.state.ids"
                :key="id"
                :todo="$store.state.todos[id]"
                @click="complete(id)"
        ></todoitem>
    </div>
</template>

<script>
    import TodoItem from './TodoItem.vue';
    //import $store from './store.js';
    export default{

        name:'index',

        components: {
            TodoItem
        },

        methods: {
            complete(id){
                this.$store.commit('TOGGLE_COMPLETE', {id})
            }
        }
    }
</script>