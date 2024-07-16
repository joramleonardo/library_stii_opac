<template>

<div>    
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h4>Discover Our Weekly Offers</h4>
                    <h2>Amazing Prices &amp; More</h2>
                    <div class="border-button"><a href="about.html">Discover More</a></div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="cities-town">
        <div class="container">
            <div class="row">
                <div class="slider-content">
                    <div class="row">
                        <form id="search-form" name="gs" method="submit" role="search" action="#">
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
                                    <div class="main-button">
                                       
                                        <router-link :to="{name : 'opac-search', params: { word: searchKeyword, filter: filterCategory, type: filterMaterialType }}">
                                        <button @click="searchFunction2" type="button" class="btn btn-primary" data-mdb-ripple-init>
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

    <div class="visit-country">
        
        <div class="container-xxl">
            <div id="spinner_">
                <div class="text-center mt-5">
                    <b-spinner label="Busy"></b-spinner>
                </div>
            </div>
            <div class="mb-3" id="total_result" style="display: none" >
                <span style="font-weight: bold">
                     <span style="font-style: italic; color: red"> {{totalRows}} </span> result(s) found.
                </span>
            </div>
            <div class="mb-3" id="total_result2" style="display: none" >
                <span style="font-weight: bold">
                     <span style="font-style: italic; color: red"> {{totalRows2}} </span> result(s) found.
                </span>
            </div>
        </div>

        <div class="container-xxl">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-12">
                        <div class="container " id="_results">
                            <div v-for="(event, index) in ticket1" :key="index" class="mb-3 wow fadeInUp" data-wow-delay="0.1s" id="my-table">
                                <!-- <div class="job-item p-4 mb-4 result_box"> -->
                                    <span v-if="event.MaterialType === 'VF'">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="images/vertical.png" alt="" style="width: 40px; height: 40px;"/>
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3" v-html="event.Title"></h5>
                                                        <b-badge variant="" style="background-color: #CD5C5C !important">VERTICAL FILES</b-badge>
                                                        <small>
                                                            <br>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                Quick View
                                                        </b-button>
                                                        <b-button size="sm" class="btn btn-primary">
                                                            <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                Full Catalog
                                                            </router-link>
                                                        </b-button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span v-if="event.MaterialType === 'THESES'">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4" >
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="images/thesis.png" alt="" style="width: 40px; height: 40px;"/>
                                                    <div class="text-start ps-4">
                                                        <!-- <h5 class="mb-3" v-html="event.Title"></h5> -->
                                                        <h4 class="mb-3" v-html="event.Title"></h4> 
                                                        <b-badge  variant="" style="background-color: #FF6347 !important">THESIS/DISSERTATIONS</b-badge>
                                                        <small>
                                                            <br>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                Quick View
                                                        </b-button>
                                                        <b-button size="sm" class="btn btn-primary">
                                                            <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                Full Catalog
                                                            </router-link>
                                                        </b-button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span v-if="event.MaterialType === 'REPORTS'">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="images/tech-report.png" alt="" style="width: 40px; height: 40px;"/>
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3" v-html="event.Title"></h5>
                                                        <b-badge  variant="" style="background-color: #BDB76B !important">TECHNICAL REPORTS</b-badge>
                                                        <small>
                                                            <br>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                Quick View
                                                        </b-button>
                                                        <b-button size="sm" class="btn btn-primary">
                                                            <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                Full Catalog
                                                            </router-link>
                                                        </b-button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span v-if="event.MaterialType === 'PROJECTS'">
                                        <span v-if="event.Title != ''">
                                            <div class="job-item p-4 mb-4 result_box">
                                                <div class="row g-4">
                                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/invproj.png" alt="" style="width: 40px; height: 40px;"/>
                                                        <div class="text-start ps-4">
                                                            <h5 class="mb-3" v-html="event.Title"></h5>
                                                            <b-badge  variant="" style="background-color: #663399 !important">INVESTIGATORY PROJECTS</b-badge>
                                                            <small>
                                                                <br>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                        <div class="d-flex mb-3">
                                                            <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                    Quick View
                                                            </b-button>
                                                            <b-button size="sm" class="btn btn-primary">
                                                                <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                    Full Catalog
                                                                </router-link>
                                                            </b-button> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                        <span v-else-if="event.Title === ''">
                                            <div class="job-item p-4 mb-4 result_box" style="display:none">
                                                <div class="row g-4">
                                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/invproj.png" alt="" style="width: 40px; height: 40px;"/>
                                                        <div class="text-start ps-4">
                                                            <h5 class="mb-3" v-html="event.Title"></h5>
                                                            <b-badge  variant="" style="background-color: #663399 !important">INVESTIGATORY PROJECTS</b-badge>
                                                            <small>
                                                                <br>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                        <div class="d-flex mb-3">
                                                            <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                    Quick View
                                                            </b-button>
                                                            <b-button size="sm" class="btn btn-primary">
                                                                <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                    Full Catalog
                                                                </router-link>
                                                            </b-button> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </span>
                                    <span v-if="event.MaterialType === 'NONPRINTS'">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="images/nonprint.png" alt="" style="width: 40px; height: 40px;"/>
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3" v-html="event.Title"></h5>
                                                        <b-badge  variant="" style="background-color: #808000 !important">NONPRINTS</b-badge>
                                                        <small>
                                                            <br>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                Quick View
                                                        </b-button>
                                                        <b-button size="sm" class="btn btn-primary">
                                                            <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                Full Catalog
                                                            </router-link>
                                                        </b-button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span v-if="event.MaterialType === 'BOOKS'">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4" >
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="images/book.png" alt="" style="width: 40px; height: 40px;"/>
                                                    <div class="text-start ps-4">
                                                        <!-- <span v-if="event.Title != ''">
                                                            <h5 class="mb-3" v-html="event.Title"></h5>
                                                        </span>
                                                        <span v-else-if="event.Title === ''">
                                                            <span v-if="event.SeriesTitle != ''">
                                                                <h5 class="mb-3" v-html="event.SeriesTitle"></h5>
                                                            </span>
                                                            <span v-else-if="event.SeriesTitle === ''">
                                                                <span v-if="event.JournalTitle != ''">
                                                                    <h5 class="mb-3" v-html="event.JournalTitle"></h5>
                                                                </span>
                                                                <span v-else-if="event.JournalTitle === ''">
                                                                    <h5 class="mb-3">No Title</h5>
                                                                </span>
                                                            </span>
                                                        </span> -->
                                                                <h5 class="mb-0" v-html="event.Title"></h5>
                                                                <span style="font-style: italic"> 
                                                                <span class="mb-3" v-html="event.SeriesTitle"></span>
                                                                </span>
                                                                <br>

                                                        <b-badge  variant="" style="background-color: #4682B4 !important">BOOKS</b-badge>
                                                        <small>
                                                            <br>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                Quick View
                                                        </b-button>
                                                        <b-button size="sm" class="btn btn-primary">
                                                            <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                Full Catalog
                                                            </router-link>
                                                        </b-button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span v-if="event.MaterialType === 'ANALYTICS'">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4">
                                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/article.png" alt="" style="width: 40px; height: 40px;"/>
                                                        <div class="text-start ps-4">
                                                                <!-- <h5 class="mb-0" v-html="event.Title"></h5> -->
                                                                <h5 class="mb-0">
                                                                    {{event.Title}}
                                                                </h5>
                                                                <span style="font-style: italic"> 
                                                                <span class="mb-3" v-html="event.JournalTitle"></span>
                                                                </span>
                                                                <br>
                                                            <b-badge  variant="" style="background-color: #B8860B !important">ARTICLES</b-badge>
                                                            <small>
                                                                <br>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                        <div class="d-flex mb-3">
                                                            <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                    Quick View
                                                            </b-button>
                                                            <b-button size="sm" class="btn btn-primary">
                                                                <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                    Full Catalog
                                                                </router-link>
                                                            </b-button> 
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </span>
                                    <span v-if="event.MaterialType === 'SERIALS'">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="images/serials.png" alt="" style="width: 40px; height: 40px;"/>
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3" v-html="event.Title"></h5>
                                                        <b-badge  variant="" style="background-color: #5F9EA0 !important">SERIALS</b-badge>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                Quick View
                                                        </b-button>
                                                        <b-button size="sm" class="btn btn-primary">
                                                            <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                Full Catalog
                                                            </router-link>
                                                        </b-button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span v-if="event.MaterialType === 'REPRINTS'">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="images/print.png" alt="" style="width: 40px; height: 40px;"/>
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3" v-html="event.Title"></h5>
                                                        <b-badge  variant="" style="background-color: #3CB371 !important">REPRINTS</b-badge>
                                                        <small>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                Quick View
                                                        </b-button>
                                                        <b-button size="sm" class="btn btn-primary">
                                                            <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                                                Full Catalog
                                                            </router-link>
                                                        </b-button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span v-if="event.MaterialType === ''">
                                        <div class="job-item p-4 mb-4 result_box">
                                            <div class="row g-4" >
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="images/article.png" alt="" style="width: 40px; height: 40px;"/>
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3" v-html="event.Title"></h5>
                                                        <small>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <b-button size="sm" class="btn btn-primary" style="margin-right: 10px" @click="quickView(event.HoldingsID)">
                                                                Quick View
                                                        </b-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                <!-- </div> -->
                            </div>
                            <div style="display: none" id="_pagination">
                                <b-pagination :total-rows="totalRows" :per-page="perPage"  @change="searchFunction" aria-controls="my-table">

                                </b-pagination>
                            </div>
                            <div style="display: none" id="_pagination2">
                                <b-pagination :total-rows="totalRows2" :per-page="perPage"  @change="searchFunction2" aria-controls="my-table">

                                </b-pagination>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="container">
            <b-modal id="showDetails_internal" ref="showDetails_internal" centered title="Details" size="lg" ok-only>
                <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Material Type:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                    <div v-if="quickView_Details.MaterialType === 'VF'">
                        <b-badge variant="" style="background-color: #CD5C5C !important">VERTICAL FILES</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === 'THESES'">
                        <b-badge  variant="" style="background-color: #FF6347 !important">THESIS/DISSERTATIONS</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === 'REPORTS'">
                        <b-badge  variant="" style="background-color: #BDB76B !important">TECHNICAL REPORTS</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === 'PROJECTS'">
                        <b-badge  variant="" style="background-color: #663399 !important">INVESTIGATORY PROJECTS</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === 'NONPRINTS'">
                        <b-badge  variant="" style="background-color: #808000 !important">NONPRINTS</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === 'BOOKS'">
                        <b-badge  variant="" style="background-color: #4682B4 !important">BOOKS</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === 'ANALYTICS'">
                        <b-badge  variant="" style="background-color: #B8860B !important">ARTICLES</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === 'SERIALS'">
                        <b-badge  variant="" style="background-color: #5F9EA0 !important">SERIALS</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === 'REPRINTS'">
                        <b-badge  variant="" style="background-color: #3CB371 !important">REPRINTS</b-badge>
                    </div>
                    <div v-if="quickView_Details.MaterialType === ''">
                        
                    </div>
                </b-form-group>
                <!-- <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Title:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                        <h5 class="mb-3" v-html="quickView_Details.Title"></h5><br>
                </b-form-group> -->
                 <span v-if="quickView_Details.MaterialType === 'ANALYTICS'">
                    <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Title:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            <!-- <h5 class="mb-3" v-html="quickView_Details.Title"></h5><br> -->
                            <h5 class="mb-3">
                                {{quickView_Details.Title}}
                            </h5>
                    </b-form-group>
                    <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Journal Title:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            <h5 class="mb-3" v-html="quickView_Details.JournalTitle"></h5>
                    </b-form-group>
                 </span>
                 <span v-else>
                    <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Title:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            <h5 class="mb-3" v-html="quickView_Details.Title"></h5><br>
                    </b-form-group>
                 </span>
                <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                        <!-- <span v-if="quickView_Details.AgencyCode === ''">
                            -
                        </span>
                        <span v-else>
                            {{quickView_Details.AgencyCode}}
                        </span> -->
                        {{quickView_Details.AgencyCode}}
                </b-form-group>
                <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                        <span v-if="quickView_Details.Author === ''">
                            -
                        </span>
                        <span v-else>
                            {{quickView_Details.Author}}
                        </span>
                    <!-- {{quickView_Details.Author}} -->
                </b-form-group>
                <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Call Number:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                        <span v-if="quickView_Details.CallNum === ''">
                            -
                        </span>
                        <span v-else>
                            {{quickView_Details.CallNum}}
                        </span>
                    <!-- {{quickView_Details.CallNum}} -->
                </b-form-group>
                <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Pages:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                        <!-- <span v-if="quickView_Details.PhysicalExtension === '' || quickView_Details.PhysicalExtension === NULL"> -->
                        <span v-if="quickView_Details.PhysicalExtension === ''">
                            -
                        </span>
                        <span v-else>
                            {{quickView_Details.PhysicalExtension}}
                        </span>
                    <!-- {{quickView_Details.PhysicalExtension}} -->
                </b-form-group>
                <div v-if="hasFile === 1">
                    <!-- <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="File Name:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                        {{quickView_MultimediaDetails.FileName}}
                    </b-form-group> -->
                    <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="File Type:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                        
                        <b-badge variant="secondary" id="popover-target-1">
                            {{quickView_MultimediaDetails.Extension}}
                        </b-badge>
                        <b-popover target="popover-target-1" triggers="hover" placement="right">
                            <template #title>File Name</template>
                                {{quickView_MultimediaDetails.FileName}}
                        </b-popover>
                    </b-form-group>
                </div>
                
                 
                
            </b-modal>
        </div>
        
    </div>

</div>
</template>


<script>
    import * as ticket_service from '../services/ticket_service';

    export default {
        data() {
        return {
            perPage: 10,
            currentPage: 1,
            totalRows: 0,
            totalRows2: 0,
            searchKeyword: '',
            keyword: this.$route.params.word,
            keyword_2: 'All',
            filterCategory: 'All',
            filterMaterialType: 'ALL',
            response0: '',
            term:'',
            ticket: [],
            ticket1: [],
            quickView_Details: [],
            quickView_MultimediaDetails: [],
            hasFile: [],
            resultSubject: [],
            resultAll: [],
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
            
            options: [
                { text: 'All', value: 'All' },
                { text: 'Books', value: 'Books' },
                { text: 'Articles', value: 'Articles' },
                { text: 'Theses/Dissertation', value: 'Theses/Dissertation' },
                { text: 'Technical Reports', value: 'Technical Reports' },
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
            this.searchFunction();
        },
        computed: {
        rows() {
            return this.ticket1.length
        }
        },
        methods: {
            quickView: async function(id) {
                try{
                    const response = await ticket_service.quickView(id);
                    this.quickView_Details = response.data[0];

                    const response1 = await ticket_service.ifHas_File(id);
                    this.hasFile = response1.data;

                    const response2 = await ticket_service.quickView_Multimedia(id);
                    this.quickView_MultimediaDetails = response2.data[0];
                }
                catch (error){}
                // console.log(this.quickView_Details.Title);

                const aa = this.quickView_Details.Title;
                const bb = {
                            '&lt;font size=&quot;3&quot;&gt;': '',
                            'b': '',
                            'c': ''
                            };
                                    
                // const cc = aa.replace('&lt;font size=&quot;3&quot;&gt;','');                   
                const cc = aa.replace(/&lt;font size=&quot;3&quot;&gt;/g, '');                
                const dd = aa.replaceAll(/&lt;font size=&quot;3&quot;&gt;/g, '')
                            .replaceAll(/&lt;/g, '')
                            .replaceAll(/font&gt;/g, '')
                            .replaceAll('/', '')
                            .replaceAll('p>', '')
                            .replaceAll('<p>', '')
                            .replaceAll('</p>', '')
                            .replaceAll(/p&gt;/g, '')
                            .replaceAll(/&lt;/g, '')
                            .replaceAll('font face="Tahoma">', '')
                            .replaceAll('font>', '');
                this.quickView_Details.Title = dd;

                this.$refs['showDetails_internal'].show();
            },
            onSlideStart(slide) {
                this.sliding = true
            },
            onSlideEnd(slide) {
                this.sliding = false
            },
            searchFunction: async function(i) {
                document.getElementById("spinner_").style.display = "block";
                document.getElementById("_results").style.display = "none";
                
                console.log(this.$route.params.type);
                console.log(this.$route.params.filter);
        
                try{
                    if(this.keyword === ""){
                        this.response0 = await ticket_service.loadHoldings_Type_All(this.$route.params.type, this.keyword_2, i, this.perPage);
                        
                       
                    }
                    else  if(this.keyword !== ""){
                        if (this.$route.params.type === "ALL"){

                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_All_keyword(this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Title_keyword(this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Author_keyword(this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Subject_keyword(this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_CallNum_keyword(this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "ANALYTICS"){
                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "BOOKS"){
                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "PROJECTS"){
                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "NONPRINTS"){

                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "REPRINTS"){
                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "SERIALS"){
                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "REPORTS"){

                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "THESES"){
                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }
                        else if (this.$route.params.type === "VF"){
                            if (this.$route.params.filter === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                            else if (this.$route.params.filter === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.$route.params.type, this.keyword, i, this.perPage);
                            }
                        }

                        

                    }

                    this.ticket1 = this.response0.data.data;
                    const abc = this.ticket1;
                        
                        for (i = 0; i < abc.length; i++ ){
                            const aa = abc[i]['Title'];
                            const bb = {
                                        '&lt;font size=&quot;3&quot;&gt;': '',
                                        'b': '',
                                        'c': ''
                                        };
                                                
                            // const cc = aa.replace('&lt;font size=&quot;3&quot;&gt;','');                   
                            const cc = aa.replace(/&lt;font size=&quot;3&quot;&gt;/g, '');                
                            const dd = aa.replaceAll(/&lt;font size=&quot;3&quot;&gt;/g, '')
                                        .replaceAll(/&lt;/g, '')
                                        .replaceAll(/font&gt;/g, '')
                                        .replaceAll('/', '')
                                        .replaceAll('p>', '')
                                        .replaceAll('<p>', '')
                                        .replaceAll('</p>', '')
                                        .replaceAll(/p&gt;/g, '')
                                        .replaceAll(/&lt;/g, '')
                                        .replaceAll('font face="Tahoma">', '')
                                        .replaceAll('font>', '')
                                        .replaceAll('&nbsp;', '')
                                        .replaceAll('&quot;', '"')
                                        .replaceAll('<i>', '')
                                        .replaceAll('<u>', '')
                                        .replaceAll('<', '')
                                        .replaceAll('>', '')
                                        .replaceAll('emstrong', '')
                                        .replaceAll('em', '')
                                        .replaceAll('div', '')
                                        .replaceAll('strong', '')
                                        .replaceAll('font size="2"', '')
                                        .replaceAll('font size="4"', '')
                                        .replaceAll('font size="5"', '')
                                        .replaceAll('font size="4"', '')
                                        .replaceAll('p align=', '')
                                        .replaceAll('&gt;', '')
                                        .replaceAll('', '')
                                        .replaceAll('', '')
                                        .replaceAll('', '')
                                        .replaceAll('', '')
                                        .replaceAll('', '')
                                        .replaceAll('', '');

                            abc[i]['Title'] = dd;
                        }
                        
                    this.totalRows = this.response0.data.total;

                    document.getElementById("spinner_").style.display = "none";
                    document.getElementById("_results").style.display = "block"; 
                    document.getElementById("total_result").style.display = "block";
                    document.getElementById("_pagination").style.display = "block"; 
                    console.log("HELLO");
                
                }
                catch (error){
                }
            },
            searchFunction2: async function(i) {
                console.log("search function 2");
                console.log("aa");
                console.log(this.filterMaterialType); //this.$route.params.type
                console.log(this.filterCategory); //this.$route.params.filter
                console.log(this.searchKeyword); //this.keyword

                document.getElementById("total_result").style.display = "none";
                document.getElementById("_pagination").style.display = "none"; 
                document.getElementById("_results").style.display = "none"; 
                document.getElementById("spinner_").style.display = "block";

            
                try{
                    if(this.searchKeyword === ""){
                        this.response0 = await ticket_service.loadHoldings_Type_All(this.filterMaterialType, this.keyword_2, i, this.perPage);
                       
                    }
                    else  if(this.searchKeyword !== ""){
                        if (this.filterMaterialType === "ALL"){

                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_All_keyword(this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Title_keyword(this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Author_keyword(this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Subject_keyword(this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_CallNum_keyword(this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "ANALYTICS"){
                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "BOOKS"){
                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "PROJECTS"){
                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "NONPRINTS"){

                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "REPRINTS"){
                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "SERIALS"){
                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "REPORTS"){

                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.$filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory=== "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "THESES"){
                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                        else if (this.filterMaterialType === "VF"){
                            if (this.filterCategory === "All"){
                                this.response0 = await ticket_service.loadHoldings_Type_All_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Title"){
                                this.response0 = await ticket_service.loadHoldings_Type_Title_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Author"){
                                this.response0 = await ticket_service.loadHoldings_Type_Author_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "Subject"){
                                this.response0 = await ticket_service.loadHoldings_Type_Subject_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                            else if (this.filterCategory === "CallNum"){
                                this.response0 = await ticket_service.loadHoldings_Type_CallNum_keyword(this.filterMaterialType, this.searchKeyword, i, this.perPage);
                            }
                        }
                    }

                    this.ticket1 = this.response0.data.data;
                    const abc = this.ticket1;
                        
                        for (i = 0; i < abc.length; i++ ){
                            const aa = abc[i]['Title'];
                            const bb = {
                                        '&lt;font size=&quot;3&quot;&gt;': '',
                                        'b': '',
                                        'c': ''
                                        };
                                                
                            // const cc = aa.replace('&lt;font size=&quot;3&quot;&gt;','');                   
                            const cc = aa.replace(/&lt;font size=&quot;3&quot;&gt;/g, '');                
                            const dd = aa.replaceAll(/&lt;font size=&quot;3&quot;&gt;/g, '')
                                        .replaceAll(/&lt;/g, '')
                                        .replaceAll(/font&gt;/g, '')
                                        .replaceAll('/', '')
                                        .replaceAll('p>', '')
                                        .replaceAll('<p>', '')
                                        .replaceAll('</p>', '')
                                        .replaceAll(/p&gt;/g, '')
                                        .replaceAll(/&lt;/g, '')
                                        .replaceAll('font face="Tahoma">', '')
                                        .replaceAll('font>', '')
                                        .replaceAll('&nbsp;', '')
                                        .replaceAll('&quot;', '"');

                            abc[i]['Title'] = dd;
                        }
                    this.totalRows2 = this.response0.data.total;

                    document.getElementById("spinner_").style.display = "none";
                    document.getElementById("_results").style.display = "block"; 
                    document.getElementById("total_result2").style.display = "block";
                    document.getElementById("_pagination2").style.display = "block"; 
                
                }
                catch (error){
                }
                // this.term = this.searchKeyword;
                // let keyword = this.searchKeyword;
                // this._keyword = this.searchKeyword;
                // let keywordString = keyword.toString();
                // try{
                //     const response = await ticket_service.loadHoldings_keyword(this.term, i, this.perPage);
                //     this.ticket1 = response.data.data;
                //     this.totalRows = response.data.total;
                //     document.getElementById("spinner_").style.display = "none";
                //     document.getElementById("_results").style.display = "block"; 
                //     document.getElementById("total_result").style.display = "block";
                //     document.getElementById("_pagination").style.display = "block"; 
                // }
                // catch (error){
                    
                // }
            }
        }
    }
</script>

<style scoped>

 .result_box{
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    /* background-color: #f7f7f7; */
 }
.btn-primary{
    background-color: #FFA471 !important;
    border-color: #FFA471 !important;
    color: #ffffff !important;
}

.btn-primary a{
    color: #ffffff !important;
}

.btn-primary:hover{
    background-color: #f8b188 !important;
    border-color: #f8b188 !important;
    color: #ffffff !important;
}
</style>