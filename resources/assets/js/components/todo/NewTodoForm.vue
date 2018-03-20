<template>
    <div>
        <input v-model="newTodoText" @keydown.enter="createTodo">
    </div>
</template>

<script>

    export default{
        name: 'CreateTodo',

        data(){
            return{
                newTodoText:''
            }
        },
        methods:{
            createTodo(){
                this.$store.commit('CREATE_TODO',{
                    text: this.newTodoText
                })
                this.newTodoText=""
            }
        }
    }
</script>