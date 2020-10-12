require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import { Form, HasError, AlertError } from 'vform';

// vform
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// components
import Home from './components/Home';
import Song from './components/Song';
import Upload from './components/Upload';

//vue router
Vue.use(VueRouter)

const routes = [
	{ path: '/home', component: Home },
	{ path: '/songs', component: Song },
	{ path: '/upload', component: Upload }
]

const router = new VueRouter({
	mode: 'history',
	routes
});

const app = new Vue({
    el: '#app',
    router
});
