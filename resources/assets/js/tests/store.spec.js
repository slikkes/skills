import { mutations } from '../components/todo/store.js'

describe('mutations',()=>{
    it('completes an incomlete todo',()=>{
        let state={
            todos:{
                '0': {complete:false}
            }
        }
       mutations.TOGGLE_COMPLETE(state,{id:0})

       expect(state.todos[0].complete).toBe(true)
    })

    it('creates a todo by calling CREATE_TODO',()=>{
        let state={
            todos:{},
            ids:[],
        }

        mutations.CREATE_TODO(state, {text:'New todo', complete:false})

        console.log(Object.keys(state.todos[1]));

        expect(Object.keys(state.todos[1]).includes('text')).toBe(true);
        expect(state.todos[1].text).toEqual('New todo')
        expect(state.ids.length).toBe(1)
    })
})