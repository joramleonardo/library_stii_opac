<template>
    
    <div>
        <div class="container-l">
            <div class="container-l py-0">
                <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/opac-banner.png" class="d-block w-100" alt="Sunset Over the City"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-xxl">
                <div class="container-fluid text-white-50 footer mt-2 mb-5" style="background-color: #004a98">
                    <!-- <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s"> -->
                    <div class="container py-5">
                        <div class="input-group">
                            <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <router-link :to="{name : 'opac-search', params: { word: term }}">
                                <button @click="searchFunction2" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                    Search
                                </button>
                            </router-link>
                        </div>
                        <!-- <div class="mt-2">
                            <b-form-checkbox-group
                                :options="options"
                                name="flavour-1a"
                            ></b-form-checkbox-group>
                        </div> -->
                    </div>
                </div>
            </div> 
        </div>

        <div class="container-xxl">
            <div class="mt-3" id="total_result" style="display: none" >
                <span style="font-weight: bold"> <span style="font-style: italic"> {{totalRows}} </span> result(s) found for </span> <span style="font-weight: 900; font-color: red"> {{term}} </span>
            </div>
            <div id="spinner_">
                <div class="text-center mt-5">
                    <b-spinner label="Busy"></b-spinner>
                </div>
            </div>
        </div>
        <div class="container py-3" id="_results">
            <div v-for="(event, index) in ticket1" :key="index" class="mb-3 wow fadeInUp" data-wow-delay="0.1s" id="my-table">
                <div class="job-item p-4 mb-4">
                    <div class="row g-4" v-if="event.MaterialType === 'VF'">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/vertical.png" alt="" style="width: 40px; height: 40px;"/>
                            <div class="text-start ps-4">
                                <h5 class="mb-3">{{event.Title}}</h5>
                                <b-badge variant="" style="background-color: #CD5C5C !important">VERTICAL FILES</b-badge>
                                <small>
                                    <br>
                                    <!-- <span class="text-truncate me-2"><i class="fa fa-user text-primary me-2"></i>{{event.Author}}</span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2">
                                        <i class="fa fa-align-justify text-primary me-2"></i>
                                        <span v-if="event.Subject !== null" >
                                            <b-link href="#" class="" v-for="(ev, index) in event.Subject.split(',')" :key="index">
                                                {{ev}}
                                            </b-link>
                                        </span>
                                    </span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2"><i class="fa fa-file-text text-primary me-2"></i>{{event.PublisherName}}</span> -->
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === 'THESES'">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/thesis.png" alt="" style="width: 40px; height: 40px;"/>
                            <div class="text-start ps-4">
                                <h5 class="mb-3">{{event.Title}}</h5>
                                <b-badge  variant="" style="background-color: #FF6347 !important">THESIS/DISSERTATIONS</b-badge>
                                <small>
                                    <br>
                                    <!-- <span class="text-truncate me-2"><i class="fa fa-user text-primary me-2"></i>{{event.Author}}</span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2">
                                        <i class="fa fa-align-justify text-primary me-2"></i>
                                        <span v-if="event.Subject !== null" >
                                            <b-link href="#" class="" v-for="(ev, index) in event.Subject.split(',')" :key="index">
                                                {{ev}}
                                            </b-link>
                                        </span>
                                    </span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2"><i class="fa fa-file-text text-primary me-2"></i>{{event.PublisherName}}</span> -->
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === 'REPORTS'">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/tech-report.png" alt="" style="width: 40px; height: 40px;"/>
                            <div class="text-start ps-4">
                                <h5 class="mb-3" v-html="event.Title"></h5>
                                <b-badge  variant="" style="background-color: #BDB76B !important">TECHNICAL REPORTS</b-badge>
                                <small>
                                    <br>
                                    <!-- <span class="text-truncate me-2"><i class="fa fa-user text-primary me-2"></i>{{event.Author}}</span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2">
                                        <i class="fa fa-align-justify text-primary me-2"></i>
                                        <span v-if="event.Subject !== null" >
                                            <b-link href="#" class="" v-for="(ev, index) in event.Subject.split(',')" :key="index">
                                                {{ev}}
                                            </b-link>
                                        </span>
                                    </span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2"><i class="fa fa-file-text text-primary me-2"></i>{{event.PublisherName}}</span> -->
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === 'PROJECTS'">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/invproj.png" alt="" style="width: 40px; height: 40px;"/>
                            <div class="text-start ps-4">
                                <h5 class="mb-3" v-html="event.Title"></h5>
                                <b-badge  variant="" style="background-color: #663399 !important">INVESTIGATORY PROJECTS</b-badge>
                                <small>
                                    <br>
                                    <!-- <span class="text-truncate me-2"><i class="fa fa-user text-primary me-2"></i>{{event.Author}}</span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2">
                                        <i class="fa fa-align-justify text-primary me-2"></i>
                                        <span v-if="event.Subject !== null" >
                                            <b-link href="#" class="" v-for="(ev, index) in event.Subject.split(',')" :key="index">
                                                {{ev}}
                                            </b-link>
                                        </span>
                                    </span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2"><i class="fa fa-file-text text-primary me-2"></i>{{event.PublisherName}}</span> -->
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === 'NONPRINTS'">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/nonprint.png" alt="" style="width: 40px; height: 40px;"/>
                            <div class="text-start ps-4">
                                <h5 class="mb-3" v-html="event.Title"></h5>
                                <b-badge  variant="" style="background-color: #808000 !important">NONPRINTS</b-badge>
                                <small>
                                    <br>
                                    <!-- <span class="text-truncate me-2"><i class="fa fa-user text-primary me-2"></i>{{event.Author}}</span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2">
                                        <i class="fa fa-align-justify text-primary me-2"></i>
                                        <span v-if="event.Subject !== null" >
                                            <b-link href="#" class="" v-for="(ev, index) in event.Subject.split(',')" :key="index">
                                                {{ev}}
                                            </b-link>
                                        </span>
                                    </span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2"><i class="fa fa-file-text text-primary me-2"></i>{{event.PublisherName}}</span> -->
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === 'BOOKS'">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/book.png" alt="" style="width: 40px; height: 40px;"/>
                            <div class="text-start ps-4">
                                <h5 class="mb-3" v-html="event.Title"></h5>
                                <b-badge  variant="" style="background-color: #4682B4 !important">BOOKS</b-badge>
                                <small>
                                    <br>
                                    <!-- <span class="text-truncate me-2"><i class="fa fa-user text-primary me-2"></i>{{event.Author}}</span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2">
                                        <i class="fa fa-align-justify text-primary me-2"></i>
                                        <span v-if="event.Subject !== null" >
                                            <b-link href="#" class="" v-for="(ev, index) in event.Subject.split(',')" :key="index">
                                                {{ev}}
                                            </b-link>
                                        </span>
                                    </span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2"><i class="fa fa-file-text text-primary me-2"></i>{{event.PublisherName}}</span> -->
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === 'ANALYTICS'">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/article.png" alt="" style="width: 40px; height: 40px;"/>
                            <div class="text-start ps-4">
                                <h5 class="mb-3" v-html="event.Title"></h5>
                                <b-badge  variant="" style="background-color: #B8860B !important">ARTICLES</b-badge>
                                <small>
                                    <br>
                                    <!-- <span class="text-truncate me-2"><i class="fa fa-user text-primary me-2"></i>{{event.Author}}</span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2">
                                        <i class="fa fa-align-justify text-primary me-2"></i>
                                        <span v-if="event.Subject !== null" >
                                            <b-link href="#" class="" v-for="(ev, index) in event.Subject.split(',')" :key="index">
                                                {{ev}}
                                            </b-link>
                                        </span>
                                    </span> -->
                                    <!-- <br>
                                    <span class="text-truncate me-2"><i class="fa fa-file-text text-primary me-2"></i>{{event.PublisherName}}</span> -->
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === 'SERIALS'">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/serials.png" alt="" style="width: 40px; height: 40px;"/>
                            <div class="text-start ps-4">
                                <h5 class="mb-3" v-html="event.Title"></h5>
                                <b-badge  variant="" style="background-color: #5F9EA0 !important">SERIALS</b-badge>
                                <!-- <small>
                                    <br>
                                    <span class="text-truncate me-2"><i class="fa fa-user text-primary me-2"></i>{{event.Author}}</span>
                                    <br>
                                    <span class="text-truncate me-2">
                                        <i class="fa fa-align-justify text-primary me-2"></i>
                                        <span v-if="event.Subject !== null" >
                                            <b-link href="#" class="" v-for="(ev, index) in event.Subject.split(',')" :key="index">
                                                {{ev}}
                                            </b-link>
                                        </span>
                                    </span>
                                    <br>
                                    <span class="text-truncate me-2"><i class="fa fa-file-text text-primary me-2"></i>{{event.PublisherName}}</span>
                                </small> -->
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === 'REPRINTS'">
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
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                    <div class="row g-4" v-if="event.MaterialType === ''">
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
                                <!-- <b-button size="sm" class="btn btn-primary">
                                    <router-link v-bind:to="{name : 'result', params: { id: event.HoldingsID}}"  target="_blank">
                                        Full Catalog
                                    </router-link>
                                </b-button>  -->
                            </div>
                            <!-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small> -->
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="_pagination">
                <b-pagination :total-rows="totalRows" :per-page="perPage"  @change="searchFunction" aria-controls="my-table">

                </b-pagination>
            </div>
            <div style="display: none" id="_pagination2">
                <b-pagination :total-rows="totalRows" :per-page="perPage"  @change="searchFunction2" aria-controls="my-table">

                </b-pagination>
            </div>
        </div>

    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
        <div class="container">
            <!-- <b-modal id="showDetails_internal" ref="showDetails_internal" hide-footer title="TICKET DETAILS" size="xl">
                <div class="">
                    <div class="">
                        
                    </div>
                </div>
            </b-modal> -->
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
                <!-- <b-form-group label-cols="4" label-cols-lg="2" label-for="input-default" label="Abstract:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                    {{quickView_Details.SummaryAbstracts}}
                </b-form-group> -->
                <!-- <b-row>
                    <b-col>
                        <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Date of Request:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.Title}}
                        </b-form-group>
                    </b-col>
                    <b-col>
                        <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Date Accomplished:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                            {{quickView_Details.Title}}
                        </b-form-group>
                    </b-col>
                </b-row> -->
            </b-modal>
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
            keyword: this.$route.params.word,
            term:'',
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
            ]
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
                    console.log(this.quickView_Details);
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
                this.term = this.$route.params.word;
                try{

                    const response0 = await ticket_service.loadHoldings_All(this.keyword, i, this.perPage);
                    this.ticket1 = response0.data.data;
                    console.log(this.resultAll);
                    console.log(response0.data.total);

                    const response = await ticket_service.loadHoldings_keyword(this.keyword, i, this.perPage);
                    this.ticket1 = response.data.data;

                    const response2 = await ticket_service.loadHoldings_Subject(this.keyword, i, this.perPage);
                    this.resultSubject = response2.data.data;



                    this.totalRows = response.data.total;


                    document.getElementById("spinner_").style.display = "none";
                    document.getElementById("_results").style.display = "block"; 
                    document.getElementById("total_result").style.display = "block";
                    document.getElementById("_pagination").style.display = "block"; 
                
                }
                catch (error){
                    
                }
            },
            searchFunction2: async function(i) {
                document.getElementById("total_result").style.display = "none";
                document.getElementById("_pagination").style.display = "none"; 
                document.getElementById("_results").style.display = "none"; 
                document.getElementById("spinner_").style.display = "block";
                // document.getElementById("union-catalog").style.display = "none"; 
                // document.getElementById("search-container").style.display = "none"; 
                this.term = this.searchKeyword;
                let keyword = this.searchKeyword;
                this._keyword = this.searchKeyword;
                let keywordString = keyword.toString();
                try{
                    const response = await ticket_service.loadHoldings_keyword(this.term, i, this.perPage);
                    this.ticket1 = response.data.data;
                    this.totalRows = response.data.total;
                    document.getElementById("spinner_").style.display = "none";
                    document.getElementById("_results").style.display = "block"; 
                    document.getElementById("total_result").style.display = "block";
                    document.getElementById("_pagination").style.display = "block"; 
                }
                catch (error){
                    
                }
            }
        }
    }
</script>