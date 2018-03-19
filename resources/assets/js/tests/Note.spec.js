import Vue from 'vue';
import Note from '../components/cards/Note.vue';

describe ('Note.vue',()=>{
    const constructor=Vue.extend(Note);
    const NoteComponent=new constructor().$mount();
    console.log('note');
});