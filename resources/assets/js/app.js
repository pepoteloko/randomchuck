/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import PhrasesIndex from './components/phrases/PhrasesIndex.vue';
import PhrasesCreate from './components/phrases/PhrasesCreate.vue';
import PhrasesEdit from './components/phrases/PhrasesEdit.vue';

const routes = [
	{
		path: '/',
		components: {
			phrasesIndex: PhrasesIndex
		}
	},
	{path: '/admin/phrases/create', component: PhrasesCreate, name: 'createPhrase'},
	{path: '/admin/phrases/edit/:id', component: PhrasesEdit, name: 'editPhrase'}
];

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')