import Vue from 'vue';
import List from '../components/todo/List.vue';
import { shallow } from 'vue-test-utils'

describe('List.vue', () => {

    function getRenderedText(Component, propsData){

        const Constructor = Vue.extend(Component);
        const vm = new Constructor({propsData:propsData}).$mount();
        return vm.$el;
    }


    it('displays items from the list', () => {

        let ListComponent=getRenderedText(List,{items:['buy food', 'play games', 'sleep']});

         expect(ListComponent.textContent).toContain('play games');
        });

        it('works', () => {
            const wrapper = shallow(List);
        })




   /* it('adds a new item to list on click',()=>{

        ListComponent.newItem = 'brush my teeth';

        const button = ListComponent.$el.querySelector('button');
        const clickEvent=new window.Event('click');
        button.dispatchEvent(clickEvent);
        ListComponent._watcher.run();

        expect(ListComponent.$el.textContent).toContain('brush my teeth');
        expect(ListComponent.listItems).toContain('brush my teeth');
    })
    it('renderstext',()=>{
        console.log(getRenderedText(List, {text:"mivan"}))
    })*/
});
