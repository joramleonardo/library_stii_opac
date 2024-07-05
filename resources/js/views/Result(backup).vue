<template>
    <div class="container-xxl bg-white">
        <div class="container py-5">
            <div class="mb-3 wow fadeInUp" data-wow-delay="0.1s" id="my-table">
                <div>
                    <b-card :title="`${this.ticket1.Title}`" body-class="text-center" header-tag="nav">
                        <template #header>
                        <b-nav card-header tabs>
                            <b-nav-item active>Catalog View</b-nav-item>
                        </b-nav>
                        </template>
                        <b-card-text>
                            {{this.ticket1.Title}}
                            With supporting text below as a natural lead-in to additional content.
                        </b-card-text>

                        <b-button variant="primary">Go somewhere</b-button>
                    </b-card>
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
        ticket1: [],
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
            { key: 'MaterialType', label: 'MATERIAL TYPE'},
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
            try{
                console.log(this.event_id);

                // //const response = await ticket_service.loadEmployees();
                const response = await ticket_service.loadHoldings_Details(this.event_id);
                this.ticket1 = response.data[0];
                console.log(this.ticket1.Title)
                console.log(this.ticket1);
                this.totalRows = this.ticket.length;
            } catch(error) {
                this.flashMessage.error({
                message: 'Some error occured! Please try again.',
                time: 5000
                });
            }
        },
        viewTicketDetails: async function(data) {
            this.$refs['showReferenceCode'].show();
        },
    }
  }
</script>