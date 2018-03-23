import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import comments from'../comments/api';

Vue.use(Vuex);

const commentsStore=new Vuex.Store({

    state: {
        comments:[],
        favouriteComments:[],
    },

    mutations:{

        FETCH(state,comments){
            state.comments=comments;
        },

        FETCH_FAVOURITE(state, favouriteComments){
            state.favouriteComments=favouriteComments;
        },
    },

    actions:{

        fetch({commit}){
            return axios.get(notes)
                .then(response=>commit('FETCH', response.data));
        },

        deleteComment({},id){

          axios.delete(`${comments}/${id}`)
              .then(()=> this.dispatch('fetch'))
        },

        edit({},comment){
            axios.put(`${comments}/${id}`,{
                title: comment.title
            })
                .then(()=>this.dispatch('fetch'))
        },

        toggleFavourite({},id){

            axios.put(`${comments}/${id}`,{
                is_favourite:true
            })
                .then(()=>this.dispatch('fetch'))
        },

        fetchFavourite({commit}){

            return axios.get(`${comments}?type=favourite`)
                .then(response => commit('FETCH_FAVOURITE', response.data))

        },

        add({},title){

            axios.post(`${comments}`,{
                'title':title,
                'is_favourite':falsek
            })
        }
    }
});

export default commentsStore;
