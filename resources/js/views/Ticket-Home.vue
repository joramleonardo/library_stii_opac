<template>

<div id="home-top">
        <!-- Navigation-->
        <div class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <button class="navbar-toggler text-uppercase font-weight-bold bg-success text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="">
                                <router-link to="/home" style="color: #fff !important;">
                                Home
                                </router-link>
                            </a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="">
                                <router-link to="/request" style="color: #fff !important;">
                                Submit a Request
                                </router-link>
                            </a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="">
                                <router-link to="/followup" style="color: #fff !important;">
                                Track a Ticket
                                </router-link>
                            </a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="">
                                <router-link to="/login" style="color: #fff !important;">
                                Technical
                                </router-link>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Header-->
        <header class="masthead text-white text-center" style="background-color: #2384b3 !important">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt="..." />
                <!-- <img class="masthead-avatar mb-5" src="img/banner-bg-4.PNG" alt="..." /> -->
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Ticket Management System</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Need help? Submit your request to our support teams</p>
            </div>
        </header>
        <!-- Contact Section-->
        <section class="page-section portfolio" id="contact" style="color: #6c757d !important;">
            <div class="container" style="color: #6c757d !important;">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary">Contact Us</h2>
                <!-- Icon Divider-->
                <div class="divider-custom" style="color: #6c757d !important;">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                
                <div class="col-xl-12">
                    <b-card class="m-2">
                        <b-table striped hover 
                        :items="ticket"
                        :fields="fields_ALL"
                        :current-page="currentPage"
                        :per-page="perPage"
                        :filter="filter"
                        :filter-included-fields="filterOn"
                        :sort-by.sync="sortBy"
                        :sort-desc.sync="sortDesc"
                        :sort-direction="sortDirection"
                        stacked="md"
                        show-empty
                        >
                        </b-table>
                    </b-card>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            DOST-STII Building
                            <br />
                            DOST Compound, Gen. Santos Avenue
                            <br />
                            Bicutan 1631, Taguig, Metro Manila
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <!-- <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Around the Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div> -->
                    <!-- Footer About Text-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Around the Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/dost.stii" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://stii.dost.gov.ph/" target="_blank"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About Freelancer</h4>
                        <p class="lead mb-0">
                            Freelance is a free to use, MIT licensed Bootstrap theme created by
                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                            .
                        </p>
                    </div> -->
                </div>
            </div>
        </footer>
			<FlashMessage></FlashMessage>
</div>
</template>
<style>
    #sub-btn:hover{
        color:rgb(233, 229, 229) !important;
        box-shadow: 3px 5px #838486;
    }
</style>

<script>
import * as ticket_service from '../services/ticket_service';

export default {
    data() {
        return {
            selected: null,
            options_supportType: [
                { value: null, text: 'Please select an option', disabled: true },
                { value: 'Technical Support', text: 'Technical Support' },
                { value: 'Livestream', text: 'Livestream' },
                { value: 'IS', text: 'Information System' },
                { value: 'TWG', text: 'Technical Working Group' }
            ],
            options_supportType_external: [
                { value: null, text: 'Please select an option', disabled: true },
                { value: 'Livestream', text: 'Livestream' },
                { value: 'Other', text: 'Other' }
            ],
            options_sex: [
                { value: null, text: 'Please select an option', disabled: true },
                { value: 'Male', text: 'Male' },
                { value: 'Female', text: 'Female' },
            ],
            variants: ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'light', 'dark'],
            headerBgVariant: 'dark',
            headerTextVariant: 'light',
            bodyBgVariant: 'light',
            bodyTextVariant: 'dark',
            footerBgVariant: 'warning',
            footerTextVariant: 'dark',
			ref_code:'',
            note_:'',
			ticket: [],
			ticketData:{
				status:'',
				reference_code:''
			},
            ticketDetails: [],
            empName: '',
            empSex: '',
            empDiv: '',
            empEmail: '',
            internal_external:'',
			ticketDataStatus:{
				employee_code:'',
				type:'',
				hardware:'',
				software:'',
				note:'',
				reference_code:''
			},
			selected: '',
			ticketData_update:{
				reference_code:''
			},
            ticket: [],
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
                { key: 'HoldingsID', label: 'Holdings ID'},
                { key: 'MaterialType', label: 'Material Type'},
            ],
            fields2_external: [
                { key: 'reference_code', label: 'Reference Code'},
                { key: 'externalName', label: 'Requested By'},
                { key: 'supportType', label: 'Request Type'},
                { key: 'externalAgency', label: 'Agency'},
                { key: 'externalStartDate', label: 'Start Date'},
                { key: 'externalEndDate', label: 'End Date'},
                { key: 'externalEventTitle', label: 'Event Title'},
                { key: 'clientNote', label: 'Remarks'},
            ],
            fields3: [
                { key: 'ticket_created', label: 'Date Submitted'},
                { key: 'ticket_approved', label: 'Date Approved/Assigned'},
                { key: 'ticket_attended', label: 'Date Attended'},
                { key: 'ticket_completed', label: 'Date Completed'},
            ],
            fields4: [
                { key: 'status', label: ''},
            ],
            fields5: [
                { key: 'approved_by', label: 'Approved By'},
                { key: 'assignedStaff', label: 'Assigned To'},
                { key: 'tech_remarks', label: 'Note'},
            ],
		}
    },
    mounted() {
        this.loadEmployees();
    },
	computed:{
	},
    methods: {
        loadEmployees: async function() {
            try{
                //const response = await ticket_service.loadEmployees();
                const response = await ticket_service.loadHoldings();
                this.ticket = response.data;
                this.totalRows = this.ticket.length;
            } catch(error) {
                this.flashMessage.error({
                message: 'Some error occured! Please try again.',
                time: 5000
                });
            }
        },
    }
}
</script>
