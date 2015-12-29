//require('./imports.js')
//global.jQuery = require('jquery');

//import slick from './slick/slick.min.js'

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

Vue.use(VueRouter);
Vue.use(VueResource);

Vue.config.debug = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

import App from './components/App.vue';
import Login from './components/Login.vue';
import Pottur from './components/Pottur.vue';
import Home from './components/Home.vue';
import Page from './components/Page.vue';
import Contact from './components/Contact.vue';

var router = new VueRouter();

router.map({
	'/': {
		component: Home
	},
	'/admin': {
		component: Login
	},
	'/hafa-samband': {
		component: Contact
	},
	'/pottur': {
		component: Pottur
	},
	'/*any': {
		name: 'page',
		component: Page
	}
});

router.beforeEach(function (transition) {
	window.scrollTo(0, 0);

	transition.next()
});

router.start(App, 'app')