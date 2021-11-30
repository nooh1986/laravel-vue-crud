require('./bootstrap');

import { createApp } from 'vue';

import Master from './components/layouts/Master'

import router from './router'

createApp({
    components: {
        Master
    }
}).use(router).mount('#app')
