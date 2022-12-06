
import appcomponent from './layouts/appcomponent.vue';
import AddPost from './components/AddPost.vue';
import EditPost from './components/EditPost.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: appcomponent
    },
    {
        name: 'add',
        path: '/add',
        component: AddPost
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPost
    }
];