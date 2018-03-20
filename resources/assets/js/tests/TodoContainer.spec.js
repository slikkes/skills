import Vue from 'vue';
import Vuex from 'vuex';
import { shallow } from 'vue-test-utils';
import TodoContainer from '../components/todo/TodoContainer.vue'

Vue.use(Vuex);

describe ('TodoContainer',()=>{

    let store;
    let mutations;

    beforeEach(()=>{

        mutations={
            TOGGLE_COMPLETE: jasmine.createSpy( )
        }

        store=new Vuex.Store({
            state:{
                todos:{
                    0:{
                        text: 'Do some worke',
                        completed: false
                    },
                    1:{
                        text: 'Take a rest',
                        completed: false
                    }
                },
                ids:[0,1]
            },
            mutations
        })
    })

    it('renders two todo items',()=>{

        const wrapper= shallow(TodoContainer,{
            store,
            stubs:{
                TodoItem: '<TodoItem/>'
            }
        })

        const todos = wrapper.findAll('TodoItem')

        expect(todos.length).toBe(2)
    })


    it('commits a TOGGLE_COMPLETE mutation when clicked',()=>{

        const wrapper=shallow(TodoContainer,{
            store,
            stubs:{
                TodoItem: '<TodoItem/>'
            }
        })

        const todo = wrapper.find('TodoItem')
        todo.trigger('click')

        expect(todo).toBeDefined();

        expect(mutations.TOGGLE_COMPLETE).toHaveBeenCalled();
        expect(mutations.TOGGLE_COMPLETE.calls.count()).toBe(1);

        //console.log(mutations.TOGGLE_COMPLETE.calls);

        //expect(mutations.TOGGLE_COMPLETE.calls).toHaveProperty('id')
       // expect(mutations.TOGGLE_COMPLETE.mock.calls.length).toBe(1)
    })
})