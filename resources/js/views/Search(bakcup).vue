<template>
    <div class="container-l ">
        <!-- <div class="container-l py-0">
            <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/opac-banner.png" class="d-block w-100" alt="Sunset Over the City"/>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container-xxl"  id="search-container" style="margin-top: 20%;">
            <div class="container-fluid text-white-50 footer mt-2 mb-5" style="background-color: #041c3691">
                <div class="container py-5">
                    <b-input-group>
                        <template #prepend>
                            <b-form-select
                            id="materialType"
                            class="mb-4 mr-sm-3 mb-sm-0"
                            :options="b"
                            v-model="filterMaterialType"></b-form-select>
                                
                            <b-form-select
                            id="category"
                            class="mb-4 mr-sm-3 mb-sm-0"
                            :options="a"
                            v-model="filterCategory"></b-form-select>
                        </template>
                        
                        <b-form-input class="mb-4 mr-sm-3 mb-sm-0" v-model="searchKeyword" type="search"></b-form-input>

                        <template #append>
                            <router-link :to="{name : 'opac-search', params: { word: searchKeyword, filter: filterCategory, type: filterMaterialType }}">
                                <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                    search
                                </button>
                            </router-link>
                        </template>
                    </b-input-group>
                </div>
            </div>
        </div>  

    </div>
</template>

<style>

    .btn a{
        color: white !important;
        text-decoration: none !important;
    }
    .text-primary {
        color: #004A98 !important;
    }

    .btn-primary {
        color: #000;
        background-color: #004A98;
        border-color: #004A98;
    }

    .testimonial-carousel .owl-item.center .testimonial-item {
        background: #004A98 !important;
    }

    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link.active,
    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link.active {
        color: #004A98;
    }

    .testimonial-carousel .owl-dot {
        border: 5px solid #004A98;
    }

    .testimonial-carousel .owl-dot.active {
        background: var(--dark);
        border-color: #004A98;
    }

    .btn-primary:hover {
        background-color: red;
        border-color: red;
    }

    body {
        background-image: url('/images/bg2.png');
        background-repeat: no-repeat;
  background-attachment: fixed;background-position: center; 
    }

    
</style>

<script>
    import * as ticket_service from '../services/ticket_service';

    export default {
        data() {
        return {
            perPage: 10,
            currentPage: 1,
            totalRows: 0,
            searchKeyword: '',
            filterCategory: 'All',
            filterMaterialType: 'All',
            ticket: [],
            ticket1: [],
            ticket2: [],
            ticketDetails: [],
            filterOn: [],
            filter: null,
            sortDirection: 'desc',
            sortBy: 'id',
            sortDesc: true,
            fields2: [
                { key: 'reference_code', label: 'Reference Code'},
                { key: 'externalName', label: 'Requested By'},
                { key: 'supportType', label: 'Request Type'},
                { key: 'clientNote', label: 'Concern'},
            ],
            fields_ALL: [
                { key: 'HoldingsID', label: 'HOLDINGS ID'},
                { key: 'MaterialType', label: 'MATERIAL TYPE'},
                { key: 'Title', label: 'TITLE'},
                { key: 'CallNum', label: 'CALL NO(S)'},
                { key: 'AgencyCode', label: 'LOCATION(S)'},
            ],
            a: [
                { text: 'All Fields', value: 'All' }, 
                { text: 'Title', value: 'Title' },
                { text: 'Author', value: 'Author' },
                { text: 'Subject', value: 'Subject' },
                { text: 'Call Number', value: 'CallNum' },
            ],
            b: [
                { text: 'All Type', value: 'ALL' }, 
                { text: 'Articles', value: 'ANALYTICS' },
                { text: 'Books', value: 'BOOKS' },
                { text: 'Investigatory Projects', value: 'PROJECTS' },
                { text: 'Non-Prints', value: 'NONPRINTS' },
                { text: 'Reprints', value: 'REPRINTS' },
                { text: 'Serials', value: 'SERIALS' },
                { text: 'Technical Reports', value: 'REPORTS' },
                { text: 'Theses/Dissertations', value: 'THESES' },
                { text: 'Vertical Files', value: 'VF' },
            ],
        }
        },
        mounted() {
        },
        computed: {
        rows() {
            return this.ticket1.length
        }
        },
        methods: {
            onSlideStart(slide) {
                this.sliding = true
            },
            onSlideEnd(slide) {
                this.sliding = false
            },
            searchFunction: async function(i) {
                document.getElementById("union-catalog").style.display = "none"; 
                document.getElementById("search-container").style.display = "none"; 
            },
        }
    }
</script>