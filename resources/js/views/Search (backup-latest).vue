<template>
<section id="section-1">
    <div class="content-slider">
        <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
        <div class="slider">
            <div id="top-banner-1" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption">
                        <h2>The Science and Technology Information Network of the Philippines</h2>
                        <h1>DOST Union Catalog</h1>
                        <!-- <div class="border-button"><a href="about.html">Go There</a></div> -->
                    </div>
                    <div class="">
                        <div class="">
                            <div class="">
                                <div class="more-info">
                                    <div class="row">
                                        <form id="search-form">
                                            <div class="row">
                                                <div class="col-lg-2" style="text-align: left;">
                                                    <span style="color: #000000; font-weight: bold; "> Material Type: </span>
                                                        <b-form-select
                                                        id="materialType"
                                                        class="mb-4 mr-sm-3 mb-sm-0"
                                                        :options="b"
                                                        v-model="filterMaterialType"></b-form-select>
                                                </div>
                                                <div class="col-lg-2" style="text-align: left;">
                                                    <span style="color: #000000; font-weight: bold"> Field: </span>
                                                        <b-form-select
                                                        id="category"
                                                        class="mb-4 mr-sm-3 mb-sm-0"
                                                        :options="a"
                                                        v-model="filterCategory"></b-form-select>
                                                </div>
                                                <div class="col-lg-6" style="text-align: left;">
                                                    <span style="color: #000000; font-weight: bold"> Keyword: </span>
                                                    <b-form-input class="mb-4 mr-sm-3 mb-sm-0" v-model="searchKeyword" type="search" required> </b-form-input>
                                                </div>
                                                <div class="col-lg-2">                        
                                                    <!-- <router-link :to="{name : 'opac-search', params: { word: searchKeyword, filter: filterCategory, type: filterMaterialType }}">
                                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                                            Search Results
                                                        </button>
                                                    </router-link> -->
                                                    <div class="main-button">
                                                        <router-link :to="{name : 'opac-search', params: { word: searchKeyword, filter: filterCategory, type: filterMaterialType }}">
                                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                                            Search
                                                        </button>
                                                    </router-link>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<style>
.btn-primary{
    background-color: #FFA471 !important;
    border-color: #FFA471 !important;
    color: #ffffff !important;
}

.btn-primary a{
    color: #ffffff !important;
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
            filterMaterialType: 'ALL',
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