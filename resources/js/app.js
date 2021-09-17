/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueCarousel from 'vue-carousel';
import {BadgerAccordion, BadgerAccordionItem} from 'vue-badger-accordion'

import vmodal from 'vue-js-modal'
Vue.use(vmodal)


Vue.use(VueCarousel);
Vue.use(VueSweetalert2);

Vue.component('BadgerAccordion', BadgerAccordion)
Vue.component('BadgerAccordionItem', BadgerAccordionItem)


Vue.component('managecate-component', require('./components/ManageCate.vue').default);
Vue.component('createuser-component', require('./components/CreateUser.vue').default);
Vue.component('manageuser-component', require('./components/ShowUser.vue').default);
Vue.component('createcontent-component', require('./components/CreateContent.vue').default);
Vue.component('carouselhome-component', require('./components/CarouselHome.vue').default);
Vue.component('home-component', require('./components/Home.vue').default);
Vue.component('managecontent-component', require('./components/ManageContent.vue').default);
Vue.component('detailcontent-component', require('./components/DetailContent.vue').default);
Vue.component('editcontent-component', require('./components/EditContent.vue').default);
Vue.component('edituser-component', require('./components/EditUser.vue').default);
Vue.component('usereditpersonal-component', require('./components/UserEditPersonal.vue').default);
Vue.component('contentbycate-component', require('./components/ContentByCate.vue').default);
Vue.component('contentbysubcate-component', require('./components/ContentBySubcate.vue').default);
Vue.component('menu-component', require('./components/Menu.vue').default);
Vue.component('searchcontent-component', require('./components/SearchContent.vue').default);
Vue.component('contact-component', require('./components/Contact.vue').default);
Vue.component('managepopup-component', require('./components/ManagePopup.vue').default);
Vue.component('manageslide-component', require('./components/ManageSlide.vue').default);
const app = new Vue({
    el: '#app',
});
