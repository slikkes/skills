<template>
    <div :class="[todo.completed ? 'completed' : 'todo']">
       {{ todo.text }}
    </div>
</template>

<script>
    export default{

        name : 'todoitem',

        props:['todo']

    }
</script>

<style scoped>


    .completed{
        text-decoration: line-through;
    }

</style>