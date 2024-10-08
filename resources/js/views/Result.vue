<template>

    <div class="container-xxl py-5" style="margin-top: 5%;">
            <div id="spinner_">
                <div class="text-center mt-5">
                    <b-spinner label="Busy"></b-spinner>
                </div>
            </div>
        <div class="container mt-10">
            <div v-if="ticket_materialType === 'VF'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/vertical.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                </h4>
                                <!-- <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>{{this.ticket1.Author}}</span> -->
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge  variant="" style="background-color: #CD5C5C !important" class="mb-5">VERTICAL FILES</b-badge>
                            <h5 class="mb-3">Catalog</h5>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Call No(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.CallNum}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Main Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.Author}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="University/College:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublisherName}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Year of Publication:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Pagination/Collation:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PhysicalExtension}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span v-if="this.ticket1.Subject !== null" >
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </span>
                            </b-form-group>
                            <!-- <div v-if="this.ticket1.SummaryAbstracts === ''">
                                <p>
                                <span style="font-style: italic">
                                        No Summary
                                </span>
                                </p>
                            </div>
                            <div v-if="this.ticket1.SummaryAbstracts != ''">
                                <p>
                                    {{this.ticket1.SummaryAbstracts}}
                                </p>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ticket_materialType === 'THESES'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/thesis.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                </h4>
                                <!-- <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>{{this.ticket1.Author}}</span> -->
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge variant="" style="background-color: #FF6347 !important" class="mb-5">THESIS/DISSERTATIONS</b-badge>
                            <!-- <h5 class="mb-3">Catalog</h5> -->
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Main Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.mainAuthor}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Join Author(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span href="#" class="" v-for="(ev, index) in this.subAuthor" :key="index">
                                    {{ev['AuthorName']}} <br>
                                </span>
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Call No(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.CallNum}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Pages:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.location}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Degree:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.SeriesTitle}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="University/College:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublisherName}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Address:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublicationPlace}}
                            </b-form-group>

                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Publication Year :" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Abstract:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.SummaryAbstracts}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span v-if="this.ticket1.Subject !== null" >
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </span>
                            </b-form-group>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ticket_materialType === 'REPORTS'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/tech-report.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                </h4>
                                <!-- <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>{{this.ticket1.Author}}</span> -->
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge  variant="" style="background-color: #BDB76B !important" class="mb-5">TECHNICAL REPORTS</b-badge>
                            <h5 class="mb-3">Catalog</h5>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Call No(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.CallNum}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Main Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.Author}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="University/College:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublisherName}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Year of Publication:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Pagination/Collation:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PhysicalExtension}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span v-if="this.ticket1.Subject !== null" >
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </span>
                            </b-form-group>
                            <!-- <div v-if="this.ticket1.SummaryAbstracts === ''">
                                <p>
                                <span style="font-style: italic">
                                        No Summary
                                </span>
                                </p>
                            </div>
                            <div v-if="this.ticket1.SummaryAbstracts != ''">
                                <p>
                                    {{this.ticket1.SummaryAbstracts}}
                                </p>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ticket_materialType === 'PROJECTS'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/invproj.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                </h4>
                                <!-- <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>{{this.ticket1.Author}}</span> -->
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge  variant="" style="background-color: #663399 !important" class="mb-5">INVESTIGATORY PROJECTS</b-badge>
                            <h5 class="mb-3">Catalog</h5>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Call No(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.CallNum}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Main Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.Author}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="University/College:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublisherName}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Year of Publication:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Pagination/Collation:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PhysicalExtension}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span v-if="this.ticket1.Subject !== null" >
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </span>
                            </b-form-group>
                            <!-- <div v-if="this.ticket1.SummaryAbstracts === ''">
                                <p>
                                <span style="font-style: italic">
                                        No Summary
                                </span>
                                </p>
                            </div>
                            <div v-if="this.ticket1.SummaryAbstracts != ''">
                                <p>
                                    {{this.ticket1.SummaryAbstracts}}
                                </p>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ticket_materialType === 'NONPRINTS'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/nonprint.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                </h4>
                                <!-- <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>{{this.ticket1.Author}}</span> -->
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge  variant="" style="background-color: #808000 !important" class="mb-5">NONPRINTS</b-badge>
                            <h5 class="mb-3">Catalog</h5>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Call No(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.CallNum}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Main Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.mainAuthor}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Join Author(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span href="#" class="" v-for="(ev, index) in this.subAuthor" :key="index">
                                    {{ev['AuthorName']}} | 
                                </span>
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="University/College:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublisherName}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Year of Publication:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Pagination/Collation:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PhysicalExtension}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span v-if="this.ticket1.Subject !== null" >
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </span>
                            </b-form-group>
                            <!-- <div v-if="this.ticket1.SummaryAbstracts === ''">
                                <p>
                                <span style="font-style: italic">
                                        No Summary
                                </span>
                                </p>
                            </div>
                            <div v-if="this.ticket1.SummaryAbstracts != ''">
                                <p>
                                    {{this.ticket1.SummaryAbstracts}}
                                </p>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ticket_materialType === 'BOOKS'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/book.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <span v-if="this.ticket1.Title != ''">
                                    
                                    <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4> -->
                                    <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                    </h4>
                                </span>
                                <span v-else-if="this.ticket1.Title === ''">
                                    <span v-if="this.ticket1.SeriesTitle != ''">
                                        <h4 class="mb-3" v-html="this.ticket1.SeriesTitle"></h4>
                                    </span>
                                    <span v-else-if="this.ticket1.SeriesTitle === ''">
                                        <span v-if="this.ticket1.JournalTitle != ''">
                                            <h4 class="mb-3" v-html="this.ticket1.JournalTitle"></h4>
                                        </span>
                                        <span v-else-if="this.ticket1.JournalTitle === ''">
                                            <h4 class="mb-3">No Title</h4>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge variant="" style="background-color: #4682B4 !important" class="mb-5">BOOKS</b-badge>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Main Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.mainAuthor}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Join Author(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span href="#" class="" v-for="(ev, index) in this.subAuthor" :key="index">
                                    {{ev['AuthorName']}} <br>
                                </span>
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Call No(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.CallNum}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Pages:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PhysicalExtension}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Year of Publication:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Abstract:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.SummaryAbstracts}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span v-if="this.ticket1.Subject !== null" >
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </span>
                            </b-form-group>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Request Material</h4>
                            <p class="m-0 mb-4">Click the button below to copy the material details below and email it at
                                <span style="font-weight: bold">
                                    library@stii.dost.gov.ph
                                </span>
                            </p>
                            <b-button size="sm" class="btn btn-primary" @click="showLink_books">
                                Copy Details
                            </b-button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ticket_materialType === 'ANALYTICS'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/article.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                </h4>
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge variant="" style="background-color: #B8860B !important" class="mb-5">ARTICLES</b-badge>
                            <!-- <h5 class="mb-3">Catalog</h5> -->
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Journal Title:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.JournalTitle}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Volume(Issue):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.VolumeNo}}({{this.ticket1.IssueNo}})
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Publication Date:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Main Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.mainAuthor}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Join Author(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span href="#" class="" v-for="(ev, index) in this.subAuthor" :key="index">
                                    {{ev['AuthorName']}} <br>
                                </span>
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Call No(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.CallNum}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Pages:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PhysicalExtension}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>

                            <!-- <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Publication Year:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublicationDate}}
                            </b-form-group> -->
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Abstract:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.SummaryAbstracts}}
                            </b-form-group>
                            <span v-if="this.ticket1.Subject !== null">
                                <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </b-form-group>
                            </span>
                            <span v-if="this.ticket1.Sector !== null">
                                <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Type of Write Up:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Sector.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </b-form-group>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Request Material</h4>
                            <p class="m-0 mb-4">Click the button below to copy the material details below and email it at
                                <span style="font-weight: bold">
                                    library@stii.dost.gov.ph
                                </span>
                            </p>
                            <b-button size="sm" class="btn btn-primary" @click="showLink_articles">
                                Copy Details
                            </b-button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ticket_materialType === 'SERIALS'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/serials.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                </h4>
                                <!-- <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>{{this.ticket1.Author}}</span> -->
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge  variant="" style="background-color: #5F9EA0 !important" class="mb-5">SERIALS</b-badge>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Journal Title:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.JournalTitle}}
                            </b-form-group>
                            <span v-if="ticket1.VolumeNo === '' && ticket1.IssueNo === ''">
                                <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Volume(Issue):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                    
                                </b-form-group>
                            </span>
                            
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Publication Date:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Main Author:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.mainAuthor}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Join Author(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span href="#" class="" v-for="(ev, index) in this.subAuthor" :key="index">
                                    {{ev['AuthorName']}} <br>
                                </span>
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Call No(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.CallNum}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Pages:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PhysicalExtension}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>

                            <!-- <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Publication Year:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublicationDate}}
                            </b-form-group> -->
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Abstract:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.SummaryAbstracts}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span v-if="this.ticket1.Subject !== null" >
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </span>
                            </b-form-group>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Request Material</h4>
                            <p class="m-0 mb-4">Click the button below to copy the material details below and email it at
                                <span style="font-weight: bold">
                                    library@stii.dost.gov.ph
                                </span>
                            </p>
                            <b-button size="sm" class="btn btn-primary" @click="showLink_serials">
                                Copy Details
                            </b-button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ticket_materialType === 'REPRINTS'"> 
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center mb-2">
                            <img class="flex-shrink-0 img-fluid border rounded" src="images/print.png" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- <h4 class="mb-3" v-html="this.ticket1.Title"></h4>  -->
                                <h4 class="mb-3">
                                        {{this.ticket1.Title}}
                                </h4>
                                <!-- <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>{{this.ticket1.Author}}</span> -->
                            </div>
                        </div>
                        <div class="mb-5">
                            <b-badge variant="" style="background-color: #3CB371 !important" class="mb-5">REPRINTS</b-badge>
                            <!-- <h5 class="mb-3">Catalog</h5> -->
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Location:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.AgencyCode}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Publisher:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.PublisherName}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Year of Publication:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.publicationDate}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Abstract:" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                {{this.ticket1.SummaryAbstracts}}
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="4" label-for="input-default" label="Subject(s):" label-class="font-weight-bold pt-0" class="ticket_details-font">
                                <span v-if="this.ticket1.Subject !== null" >
                                    <div href="#" class="" v-for="(ev, index) in this.ticket1.Subject.split(',')" :key="index">
                                        <router-link v-bind:to="{name : 'search-browse-subject', params: { subject: ev}}"  target="_blank">
                                            {{ev}}
                                        </router-link>
                                        <br>
                                    </div>
                                </span>
                            </b-form-group>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 mb-4">
                            <h4 class="mb-3">Quick Search</h4>
                                <div class="input-group">
                                    <input v-model="searchKeyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <router-link :to="{name : 'opac-search', params: { word: searchKeyword }}">
                                        <button @click="searchFunction" type="button" class="btn btn-primary" data-mdb-ripple-init>
                                            search
                                        </button>
                                    </router-link>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
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

    .ticket_details-font{
        color: black !important;
    }

    ._vue-flash-msg-body ._vue-flash-msg-body__content p{
        color: white !important;
    }
</style>

<script>

// import * as library_service from '../services/library_service';
import * as ticket_service from '../services/ticket_service';

  export default {
    data() {
      return {
        event_id : this.$route.params.id,
        event_data : {},
        ticket: [],
        hasPublisher: [],
        publicationDate: "",
        mainAuthor: '',
        location:'',
        subAuthor: [],
        searchKeyword: '',
        ticket1: [],
        ticket0: [],
        ticket_materialType:[],
        ticket2: [],
        ticketDetails: [],
        errors : '',
        totalRows: 1,
        currentPage: 1,
        perPage: 10,
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
            // { key: 'MaterialType', label: 'MATERIAL TYPE'},
            { key: 'Title', label: 'TITLE'},
            { key: 'CallNum', label: 'CALL NO(S)'},
            { key: 'AgencyCode', label: 'LOCATION(S)'},
            // { key: 'PublisherName', label: 'PUBLISHER'},
            // { key: 'PublicationPlace', label: 'PUBLICATION PLACE'},
            // { key: 'PublicationDate', label: 'DATE PUBLISHED'},
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
        this.loadEmployees();
    },
    methods: {
        onSlideStart(slide) {
        this.sliding = true
        },
        onSlideEnd(slide) {
        this.sliding = false
        },
        loadEmployees: async function() {
                console.log(this.event_id);
                document.getElementById("spinner_").style.display = "block";
            try{
                const response = await ticket_service.loadHoldingsDetails_MaterialType(this.event_id);
                this.ticket_materialType = response.data[0].MaterialType;
                console.log(this.ticket_materialType);

                if (this.ticket_materialType === "ANALYTICS"){
                    console.log("This is a ARTICLES");
                    const response0 = await ticket_service.loadHoldingsDetails_Articles_HoldingsOnly(this.event_id);
                    this.ticket0 = response0.data[0];

                    if(this.ticket0.Title === ""){
                        console.log("No title");
                        const response = await ticket_service.loadHoldingsDetails_Articles_HoldingsOnly(this.event_id);
                        this.ticket1 = response.data[0]; 
                    }
                    else{
                        console.log("Has Title");
                        const response = await ticket_service.loadHoldingsDetails_Articles_HoldingsOnly(this.event_id);
                        this.ticket1 = response.data[0]; 
                        const aa = this.ticket1.Title;
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
                        this.ticket1.Title = dd;
                    }

                    const responsePublisher = await ticket_service.ifHas_Publisher(this.event_id);
                    this.hasPublisher = responsePublisher.data;
                    console.log("Has publisher? " + this.hasPublisher);

                    
                    if (this.hasPublisher === 1){
                        const responsePublishedYear = await ticket_service.loadHoldingsDetails_Publisher(this.event_id);
                        this.publicationDate = responsePublishedYear.data[0].PublicationDate;
                        console.log("Year published: " + this.publicationDate);
                        
                    }
                    else{
                        this.publicationDate = "-";
                        console.log(this.publicationDate);
                    }

                    console.log("dd")
                    
                    // const aa = this.ticket1.Title;
                    // console.log(aa);
                    // const bb = {
                    //             '&lt;font size=&quot;3&quot;&gt;': '',
                    //             'b': '',
                    //             'c': ''
                    //             };
                                        
                    // // const cc = aa.replace('&lt;font size=&quot;3&quot;&gt;','');                   
                    // const cc = aa.replace(/&lt;font size=&quot;3&quot;&gt;/g, '');                
                    // const dd = aa.replaceAll(/&lt;font size=&quot;3&quot;&gt;/g, '')
                    //              .replaceAll(/&lt;/g, '')
                    //              .replaceAll(/font&gt;/g, '')
                    //              .replaceAll('/', '')
                    //              .replaceAll('p>', '')
                    //              .replaceAll('<p>', '')
                    //              .replaceAll('</p>', '')
                    //              .replaceAll(/p&gt;/g, '')
                    //              .replaceAll(/&lt;/g, '')
                    //              .replaceAll('font face="Tahoma">', '')
                    //              .replaceAll('font>', '');
                    // this.ticket1.Title = dd;
                }
                else if (this.ticket_materialType === "VF"){
                    console.log("This is a VF");
                    const response1 = await ticket_service.ifHas_Author(this.event_id);
                    console.log(response1.data);

                }
                else if (this.ticket_materialType === "BOOKS" 
                        || this.ticket_materialType === "THESES" 
                        || this.ticket_materialType === "REPRINTS" 
                        || this.ticket_materialType === "NONPRINTS" 
                        || this.ticket_materialType === "PROJECTS"  
                        || this.ticket_materialType === "REPORTS"   
                        || this.ticket_materialType === "SERIALS"){
                    console.log("This is a BOOKS");
                    // const aa = 
                    const response = await ticket_service.loadHoldingsDetails_Articles_HoldingsOnly(this.event_id);
                    this.ticket1 = response.data[0]; 
                    const aa = this.ticket1.Title;
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
                    this.ticket1.Title = dd;
                    


                    // const tit = this.ticket1.Title;
                    // console.log(tit);
                    // console.log("done");

                    const responsePublisher = await ticket_service.ifHas_Publisher(this.event_id);
                    this.hasPublisher = responsePublisher.data;
                    console.log("Has publisher? " + this.hasPublisher);

                    
                    if (this.hasPublisher === 1){
                        const responsePublishedYear = await ticket_service.loadHoldingsDetails_Publisher(this.event_id);
                        this.publicationDate = responsePublishedYear.data[0].PublicationDate;
                        console.log("Year published: " + this.publicationDate);
                    }
                    else{
                        this.publicationDate = "-";
                        console.log(this.publicationDate);
                    }

                }
                
                document.getElementById("spinner_").style.display = "none";

                this.totalRows = this.ticket.length;

                const response_getMainAuthor = await ticket_service.loadHoldings_MainAuthor(this.event_id);
                this.mainAuthor = response_getMainAuthor.data[0].AuthorName;

                const response_getSubAuthor = await ticket_service.loadHoldings_SubAuthor(this.event_id);
                this.subAuthor = response_getSubAuthor.data;

                const response_holdingCopy = await ticket_service.loadHoldingsCopy(this.event_id);
                this.location = response_holdingCopy.data[0].Location;
                
                
        
            } catch(error) {
                // this.flashMessage.error({
                // message: 'Some error occured! Please try again.',
                // time: 5000
                // });
            }
        },
        searchFunction: async function(i) {
            document.getElementById("spinner_").style.display = "block";
            document.getElementById("union-catalog").style.display = "none"; 
            console.log("aa");
            console.log(this.searchKeyword);
        },
        viewTicketDetails: async function(data) {
            this.$refs['showReferenceCode'].show();
        },
        showLink_books: async function(data){
                let __link =    "Title: " + this.ticket1.Title + "\n" +
                                "Author: " + this.mainAuthor + "\n" +
                                "Call No: " + this.ticket1.CallNum + "\n" +
                                "Year of Publication: " + this.publicationDate + "\n"
                                ;
                const textarea = document.createElement('textarea');
                textarea.value = __link;
                //hide textarea from UI (trick 🙂 )
                textarea.style.position = 'fixed';
                textarea.style.left = '-9999px';
                document.body.appendChild(textarea);

                textarea.select();
                textarea.setSelectionRange(0, 99999); // For mobile devices

                // Use the Clipboard API to copy the selected text
                document.execCommand('copy');

                // Remove the temporary textarea
                document.body.removeChild(textarea);
            this.flashMessage.success({
                message: 'Details Copied Successfully!'
            });
        },
        showLink_articles: async function(data){
                let __link =    "Title: " + this.ticket1.Title + "\n" +
                                "Author: " + this.mainAuthor + "\n" +
                                "Call No: " + this.ticket1.CallNum + "\n" +
                                "Serial Title: " + this.ticket1.JournalTitle + "\n" +
                                "Year of Publication: " + this.publicationDate + "\n"
                                ;
                const textarea = document.createElement('textarea');
                textarea.value = __link;
                //hide textarea from UI (trick 🙂 )
                textarea.style.position = 'fixed';
                textarea.style.left = '-9999px';
                document.body.appendChild(textarea);

                textarea.select();
                textarea.setSelectionRange(0, 99999); // For mobile devices

                // Use the Clipboard API to copy the selected text
                document.execCommand('copy');

                // Remove the temporary textarea
                document.body.removeChild(textarea);
            this.flashMessage.success({
                message: 'Details Copied Successfully!'
            });
        },
        showLink_serials: async function(data){
                let __link =    "Title: " + this.ticket1.Title + "\n" +
                                "Author: " + this.mainAuthor + "\n" +
                                "Call No: " + this.ticket1.CallNum + "\n" +
                                "Publication Title: " + this.ticket1.JournalTitle + "\n" +
                                "Pagination: " + this.ticket1.PhysicalExtension + "\n"
                                ;
                const textarea = document.createElement('textarea');
                textarea.value = __link;
                //hide textarea from UI (trick 🙂 )
                textarea.style.position = 'fixed';
                textarea.style.left = '-9999px';
                document.body.appendChild(textarea);

                textarea.select();
                textarea.setSelectionRange(0, 99999); // For mobile devices

                // Use the Clipboard API to copy the selected text
                document.execCommand('copy');

                // Remove the temporary textarea
                document.body.removeChild(textarea);
            this.flashMessage.success({
                message: 'Details Copied Successfully!'
            });
        },
    }
  }
</script>