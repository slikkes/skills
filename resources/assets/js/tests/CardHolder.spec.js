import Vue from 'vue';
import CardHolder from '../components/cards/CardHolder.vue';

describe('CardHolder.vue',()=>{

    const constructor =Vue.extend(NewCard);
    const CardHolderComponent=new constructor().vue.$mount();


    console.log("-------------");

   /* it('cards is defined',()=>{
        expect(CardHolderComponent.$el.cards).toBeDefined();
    })*/
});