import './bootstrap';
import axios from "axios";
import Vue from 'vue';
import VueInternationalization from 'vue-i18n';
import Locale from '../../../../../../resources/js/vue-i18n-locales.generated';
import ChatContainer from "../components/Chat/ChatContainer.vue";
import ChatLeftSidebarMenu from "../components/Chat/ChatLeftSidebarMenu.vue";
import ChatUsersSelection from "../components/Chat/ChatUsersSelection.vue";
import ChatMessageContainer from "../components/Chat/ChatMessageContainer.vue";
import ChatMessageInput from "../components/Chat/ChatMessageInput.vue";
import ChatCurrentUser from "../components/Chat/ChatCurrentUser.vue";

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

const lang = document.documentElement.lang.substr(0, 2);

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['lang'] = lang;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'lang': lang
    }
});

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

Vue.use(VueInternationalization);

window.Vue = Vue;

Vue.component('chat-container', ChatContainer);
Vue.component('chat-left-sidebar-menu', ChatLeftSidebarMenu);
Vue.component('chat-users-selection', ChatUsersSelection);
Vue.component('chat-message-container', ChatMessageContainer);
Vue.component('chat-message-input', ChatMessageInput);
Vue.component('chat-current-user', ChatCurrentUser);

// Vue.use(VueSweetalert2);

// or however you determine your current app locale

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#vue',
    i18n,
});

