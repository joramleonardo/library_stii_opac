import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        apiURL: 'http://127.0.0.1:8000/api',
        serverPath: 'http://127.0.0.1:8000'
    },
    mutations: {},
    actions: {}
});


// export default new Vuex.Store({
//     state: {
//         apiURL: 'http://scinet.dost.gov.ph/api',
//         serverPath: 'http://scinet.dost.gov.ph'
//     },
//     mutations: {},
//     actions: {}
// });