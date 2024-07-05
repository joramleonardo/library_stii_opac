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


// import Vue from 'vue';
// import Vuex from 'vuex';

// Vue.use(Vuex);

// export default new Vuex.Store({
//     state: {
//         apiURL: 'https://scinet.science.ph/api',
//         serverPath: 'https://scinet.science.ph'
//     },
//     mutations: {},
//     actions: {}
// });