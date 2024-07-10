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
        
        <div class="visit-country">
            <!-- <div class="container-xxl">
                <div class="mt-3" id="total_result" style="display: none" >
                    <span style="font-weight: bold"> <span style="font-style: italic"> {{totalRows}} </span> result(s) found for Subject Category:</span> <span style="font-weight: 900; font-color: red"> {{subject}} </span>
                </div>
                <div id="spinner_">
                    <div class="text-center mt-5">
                        <b-spinner label="Busy"></b-spinner>
                    </div>
                </div>
            </div> -->
            <!-- <div class="container-xxl">
                <div id="spinner_">
                    <div class="text-center mt-5">
                        <b-spinner label="Busy"></b-spinner>
                    </div>
                </div>
                <div class="mb-3" id="total_result" style="display: none" >
                    <span style="font-weight: bold"> <span style="font-style: italic"> {{totalRows}} </span> result(s) found for Subject Category:</span> <span style="font-weight: 900; font-color: red"> {{subject}} </span>
                </div>
            </div> -->
            <div class="container-xxl">
                <div id="spinner_">
                    <div class="text-center mt-5">
                        <b-spinner label="Busy"></b-spinner>
                    </div>
                </div>
                <div class="mb-3" id="total_result" style="display: none" >
                    <span style="font-weight: bold">
                        <span style="font-style: italic; color: red"> 
                            {{totalRows}} 
                        </span> result(s) found for Subject Category:
                        <span style="font-weight: 900; font-color: red"> 
                            {{subject}} 
                        </span>
                    </span>
                    
                </div>
                <div class="mb-3" id="total_result2" style="display: none" >
                    <span style="font-weight: bold">
                        <span style="font-style: italic; color: red"> 
                            {{totalRows2}} 
                        </span> result(s) found for Subject Category:
                        <span style="font-weight: 900; font-color: red"> 
                            {{subject}} 
                        </span>
                    </span>
                </div>
            </div>

            <div class="container-xxl">
                    <div class="row gy-5 gx-4">
                        <div class="col-lg-12">
                            <div class="container" id="_results">
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
                                                                <h5 class="mb-0" v-html="event.Title"></h5>
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
                            </div>
                        </div>
                    </div>
            </div>

            <div class="container">
                <span v-if="quickView_Details.MaterialType === ''">
                    <b-modal id="showDetails_internal" ref="showDetails_internal" centered title="Details" size="lg" ok-only>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Material Type:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            <div v-if="quickView_Details.MaterialType === ''"></div>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Title:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.Title}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Summary Abstracts:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.SummaryAbstracts}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.AgencyCode}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            <span v-if="quickView_Details.Author === NULL">
                                -
                            </span>
                            <span v-else>
                                {{quickView_Details.Author}}
                            </span>
                        </b-form-group>
                        <!-- <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.agency_source}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.Author}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Call Number:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.CallNum}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Pages:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.PhysicalExtension}}
                        </b-form-group> -->
                    </b-modal>
                </span>
                
                <span v-else>
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
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Title:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.Title}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.agency_source}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.Author}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Call Number:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.CallNum}}
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Pages:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.PhysicalExtension}}
                        </b-form-group>
                    </b-modal>
                </span>
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
            searchKeyword: '',
            keyword: this.$route.params.subject,
            filterCategory: 'All',
            filterMaterialType: 'All',
            term:'',
            subject:'',
            ticket: [],
            ticket1: [],
            quickView_Details: [],
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
                { text: 'All Type', value: 'All' }, 
                { text: 'Articles', value: 'Analytics' },
                { text: 'Books', value: 'Books' },
                { text: 'Investigatory Projects', value: 'Projects' },
                { text: 'Non-Prints', value: 'Nonprints' },
                { text: 'Reprints', value: 'Reprints' },
                { text: 'Serials', value: 'Serials' },
                { text: 'Technical Reports', value: 'Reports' },
                { text: 'Theses/Dissertations', value: 'Theses' },
                { text: 'Vertical Files', value: 'Vf' },
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
                }
                catch (error){}
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
                this.subject = this.$route.params.subject;
                console.log(this.subject);
                console.log("a");
                try{
                    const response = await ticket_service.loadHoldings_Subject_keyword(this.subject, i, this.perPage);
                    this.ticket1 = response.data.data;
                    console.log(this.ticket1);
    
                    this.totalRows = response.data.total;
                    document.getElementById("spinner_").style.display = "none";
                    document.getElementById("_results").style.display = "block"; 
                    document.getElementById("total_result").style.display = "block";
                    document.getElementById("_pagination").style.display = "block"; 
                
                }
                catch (error){
                    
                }
            },
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