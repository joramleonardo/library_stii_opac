import Vue from 'vue';
import Router from 'vue-router';

import Home_Page2 from './views/Home2.vue';
import Home_Page from './views/Home.vue';
import SearchHome_Page from './views/SearchHome.vue';
import Landing_Page from './views/Landing.vue';
import OPAC_Page from './views/Search.vue';
import OPAC_Search_Page from './views/Search_Result.vue';
import OPAC_Search_Subject_Page from './views/Search_Result_Subject.vue';
import Materials_Page from './views/Materials.vue';
import About_Page from './views/About.vue';
import Faqs_Page from './views/Faqs.vue';
import Linkages_Page from './views/Linkages.vue';
import Contact_Page from './views/Contact.vue';
import Result_Page from './views/Result.vue';
import Services_Page from './views/Services.vue';
import MissionVision_Page from './views/MissionVision.vue';
import OrgStructure_Page from './views/OrgStructure.vue';
import MemberBenefits_Page from './views/MemberBenefits.vue';
import HowToUseOPAC_Page from './views/HowToUseOPAC.vue';

import MemberAgencies_Page from './views/MemberAgencies.vue';
import Databases_Page from './views/Databases.vue';


Vue.use(Router);

const routes = [

    {
        path: '/',
        name: '',
        component: Home_Page2
    },
    {
        path: '/home2',
        name: 'home2',
        component: Home_Page,
        children: [
            {
                path: '/result/:id',
                name: 'result',
                component: Result_Page
            },
            {
                path: '/home',
                name: 'home',
                component: Landing_Page
            },
            {
                path: '/opac/search/:type/:filter/:word',
                name: 'opac-search',
                component: OPAC_Search_Page
            },
            {
                path: '/search/browse/subject/:subject',
                name: 'search-browse-subject',
                component: OPAC_Search_Subject_Page
            },
            {
                path: '/opac',
                name: 'opac',
                component: OPAC_Page,
            
            },
            {
                path: '/materials',
                name: 'materials',
                component: Materials_Page
            },
            {
                path: '/services',
                name: 'services',
                component: Services_Page
            },
            {
                path: '/about',
                name: 'about',
                component: About_Page
            },
            {
                path: '/faqs',
                name: 'faqs',
                component: Faqs_Page
            },
            {
                path: '/linkages',
                name: 'linkages',
                component: Linkages_Page
            },
            {
                path: '/contact',
                name: 'contact',
                component: Contact_Page
            },
            {
                path: '/member-agencies',
                name: 'member',
                component: MemberAgencies_Page
            },
            {
                path: '/databases',
                name: 'databases',
                component: Databases_Page
            },
            {
                path: '/missionvision',
                name: 'missionvision',
                component: MissionVision_Page
            },
            {
                path: '/organizationl-structure',
                name: 'organizationlstructure',
                component: OrgStructure_Page
            },
            {
                path: '/member-benefits',
                name: 'member-benefits',
                component: MemberBenefits_Page
            },
            {
                path: '/how-to-use-opac',
                name: 'how-to-use-opac',
                component: HowToUseOPAC_Page
            },
        ],
    },
    // {
    //     path: '/searchHome',
    //     name: 'searchHome',
    //     component: SearchHome_Page,
    //     children: [
    //         {
    //             path: '/opac',
    //             name: 'opac',
    //             component: OPAC_Page
    //         },
    //     ],
    // },
];

const router = new Router({
    routes: routes,
    linkActiveClass: 'active'
});

export default router;