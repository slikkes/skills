import Vue from 'vue';
import List from '../components/List.vue';

describe('List.vue', () => {

    const Constructor = Vue.extend(List);
    const ListComponent = new Constructor().$mount();


    it('displays items from the list', () => {

        console.log(ListComponent.listItems);
        expect(ListComponent.$el.textContent).toContain('play games');
        });

    it('adds a new item to list on click',()=>{

        ListComponent.newItem = 'brush my teeth';

        const button = ListComponent.$el.querySelector('button');
        const clickEvent=new window.Event('click');
        button.dispatchEvent(clickEvent);
        ListComponent._watcher.run();

        expect(ListComponent.$el.textContent).toContain('brush my teeth');
        expect(ListComponent.listItems).toContain('brush my teeth');
    })


});