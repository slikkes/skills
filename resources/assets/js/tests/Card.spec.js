import Vue from 'vue';
import Card from '../components/cards/Card.vue';

function getRenderedText(Component){

    let card={
        id:1,
        created_at:"2018-03-08 06:58:46",
        updated_at:"2018-03-12 07:19:45",
        surname:"asdfff",
        firstname:"dfsfdsfd",
        notes:[
            {
                id:3,
                level:7,
                skill_id:1,
                worker_id:1,
            },
            {
                id:4,
                level:10,
                skill_id:1,
                worker_id:1,
            }
        ],
        points:{
            point:345,
            worker_id:1
        }
    };


    let skills=[
        {
            id:1,
            skillname:"mindreading"
        }
    ];
    let auth= false;

    const Constructor = Vue.extend(Component);
    const vm = new Constructor({propsData:{card:card, skills:skills, auth:false}}).$mount();
    console.log(vm.$el.point);
    return vm.data;
}


describe ('Card.vue',()=>{

    it('renders correctly',()=>{
       expect(typeof getRenderedText(Card)).toBe("integer");

    })

})
