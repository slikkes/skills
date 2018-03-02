<template>
    <div>
        // Render the TodoList component
        // TodoList becomes
        <todo-list :todos="todos"></todo-list>
        <create-todo v-on:add-todo="addTodo"></create-todo>
    </div>
</template>
<script>
    import TodoList from './TodoList';
    import CreateTodo from './CreateTodo';
    export default {
        components: {
            // Add a reference to the TodoList component in the components property
            TodoList,
            CreateTodo,
        },
        // data function avails data to the template
        data() {
            return {
                todos: [{
                    title: 'Todo A',
                    project: 'Project A',
                    done: false,
                }, {
                    title: 'Todo B',
                    project: 'Project B',
                    done: true,
                }, {
                    title: 'Todo C',
                    project: 'Project C',
                    done: false,
                }, {
                    title: 'Todo D',
                    project: 'Project D',
                    done: false,
                }],
            };
        },
        methods:{
            addTodo(msg){
                this.todos.push({
                    title: msg.title,
                    project: msg.project,
                    done: msg.done,
                });
            }
        }
    };
</script>