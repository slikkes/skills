import TodoItem from '../components/todo/TodoItem.vue';
import { shallow } from 'vue-test-utils';


describe ('TodoItem',()=>{

    it('renders a todo item',()=>{

        const wrapper=shallow(TodoItem,{
            propsData:{
                todo:{
                    text: 'Do work',
                    completed:false,
                }
            }
        })

        expect(wrapper.html().includes('Do work')).toBe(true);
    })


    it('assingns "completed" class to a completed todo',()=>{

        const wrapper=shallow(TodoItem,{
            propsData:{
                todo:{
                    text: 'Do work',
                    completed:true,
                }
            }
        })

        expect(wrapper.classes()).toContain('completed');
    })

        
})
