import CreateComment from './CreateComment.vue';
import List from './List.vue';
import FavouriteList from './FavouriteList.vue';

const routes=[
    { path: '/', component: List},
    { path: 'create', component: CreateComment},
    { path: '/list', component: List},
    { path: 'favourite-list', component: FavouriteList},
    { path: '*', redirect:'/list'},
];