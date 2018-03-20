import {shallow} from 'vue-test-utils'
import NewTodoForm from '../components/todo/NewTodoForm.vue'

describe('NewTodoForm',()=>{

    it('calls createTodo when enter is pressed',()=>{
        const createTodo = jasmine.createSpy()

        const wrapper=shallow(NewTodoForm)
        wrapper.setMethods({createTodo})

        const input = wrapper.find('input')
        input.trigger('keydown.enter')

        expect(createTodo.calls.count()).toBe(1);
    })


})