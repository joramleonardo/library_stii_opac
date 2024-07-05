<template>
  <div class="container-fluid">
    <h1 class="mt-4 admin-header-title">COMPLETED TICKETS</h1>
    <div class="breakcrumbs mt-3">
        Home > Tickets > <span class="admin-sub-header-title">COMPLETED TICKETS</span>
    </div>
    <div class="row mt-4">
        <div class="col-xl-12">
        <b-card class="m-2">
            <div class="row">
                <label style="font-weight: 900">Spreadsheet Links: </label>
            </div>
            <div class="row mb-3">
                <div class="col-md-1 col-lg-1 mb-0">
                    <b-button><a style="text-decoration: none; color: white" target="_blank" href="https://docs.google.com/spreadsheets/d/1oGQxKNG9aJChCWD2A_i8JrEIMEBqyNAW641p40713Xw/edit?usp=sharing"> Internal Client </a></b-button>
                </div>
                <div class="col-md-1 col-lg-1 mb-0">
                    <b-button><a style="text-decoration: none; color: white" target="_blank" href="https://docs.google.com/spreadsheets/d/1jkoRn4oGIzWWi6QXybRIMs9kg-gJP53iHyBtEGnwWdI/edit?usp=sharing"> External Client </a></b-button>
                </div>
                <div class="col-md-1 col-lg-1 mb-0">
                    <b-button><a style="text-decoration: none; color: white" target="_blank" href="https://docs.google.com/spreadsheets/d/1LO9th3WDBX7Aj-adpavANQRzZ_wGYpDSCIHsj3uUUCE/edit?usp=sharing"> STARBOOKS Client</a></b-button>
                </div>
            </div>
                    <b-container fluid>
                            <b-row class="mb-3">
                                <b-col lg="5" class="my-1">
                                    <b-form-group label="Filter" label-for="filter-input" label-cols-sm="3" label-align-sm="right" label-size="sm" class="mb-0" >
                                        <b-input-group size="sm">
                                            <b-form-input id="filter-input" v-model="filter" type="search" placeholder="Type to Search" ></b-form-input>
                                            <b-input-group-append>
                                                <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                                            </b-input-group-append>
                                        </b-input-group>
                                    </b-form-group>
                                </b-col>
                                <!-- <b-col lg="3" class="my-1">
                                    <b-form-group label="Per page" label-for="per-page-select" label-cols-sm="6" label-cols-md="4" label-cols-lg="3" label-align-sm="right" label-size="sm" class="mb-0">
                                        <b-form-select id="per-page-select" v-model="perPage" :options="pageOptions" size="sm"></b-form-select>
                                    </b-form-group>
                                </b-col> -->
                                <b-col lg="2" class="my-1">
                                    <b-form-group label="Sort" label-for="sort-by-select" label-cols-sm="3" label-align-sm="right" label-size="sm" class="mb-0" v-slot="{ ariaDescribedby }">
                                        <b-input-group size="sm">
                                            <!-- <b-form-select id="sort-by-select" v-model="sortBy" :options="sortOptions" :aria-describedby="ariaDescribedby" class="w-75">
                                                <template #first>
                                                <option value="">-- none --</option>
                                                </template>
                                            </b-form-select> -->

                                            <b-form-select v-model="sortDesc" :disabled="!sortBy" :aria-describedby="ariaDescribedby" size="sm" class="w-25">
                                                <option :value="false">Asc</option>
                                                <option :value="true">Desc</option>
                                            </b-form-select>
                                        </b-input-group>
                                    </b-form-group>
                                </b-col>
                            </b-row>
                                <b-table striped hover 
                                :items="ticket"
                                :fields="fields"
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
                                    <template #cell(supportType)="row">
                                        <b style="color:rgb(35, 132, 179)">{{ row.value}}</b>
                                    </template>
                                    <template #cell(reference_code)="row">
                                        <b>{{ row.value}}</b>
                                    </template>
                                    <template #cell(priority)="row">
                                        <div v-if="row.item.priority === 'Low'">
                                            <b-badge class="mr-1 badge" variant="primary">LOW</b-badge>
                                        </div>
                                        <div v-if="row.item.priority === 'Medium'">
                                            <b-badge class="mr-1 badge" variant="warning">MEDIUM</b-badge>
                                        </div>
                                        <div v-if="row.item.priority === 'Urgent'">
                                            <b-badge class="mr-1 badge" variant="danger">URGENT</b-badge>
                                        </div>
                                    </template>
                                    <template #cell(externalName)="row">
                                        {{ row.value.toUpperCase()}}
                                    </template>
                                    <template #cell(internal_external)="row">
                                        <div v-if="row.item.internal_external === 'Internal'">
                                            <b-badge class="mr-1 badge" variant="success">Internal</b-badge>
                                        </div>
                                        <div v-if="row.item.internal_external === 'External'">
                                            <b-badge class="mr-1 badge" variant="primary">External</b-badge>
                                        </div>
                                    </template>
                                    <template #cell(feedback_status)="row">
                                        <div v-if="row.item.feedback_status === 'Received'">
                                            <b-badge class="mr-1 badge" variant="success">Received</b-badge>
                                        </div>
                                        <div v-if="row.item.feedback_status === 'Pending'">
                                            <b-badge class="mr-1 badge" variant="danger">Pending</b-badge>
                                        </div>
                                    </template>
                                    <template #cell(actions)="row">
                                        <b-button @click="setStatus(row.item, row.index, $event.target)" size="sm" class="mr-1 jkl-btn-view" style="background-color: rgb(21, 202, 32) !important;">Feedback Received</b-button>
                                        <b-button @click="showLink(row.item, row.index, $event.target)" size="sm" class="mr-1 jkl-btn-view" style="background-color: rgb(205, 168, 57) !important;">Copy Feedback Link</b-button>
                                    </template>
                                    <template #cell(details)="row">
                                        <b-button @click="viewTicketDetails(row.item, row.index, $event.target)" size="sm" class="mr-1 jkl-btn-view-details">View Details</b-button>
                                    </template>
                                    <template #cell(status)="row">
                                        <div v-if="row.item.status === 'Completed'">
                                            <b-badge class="mr-1 badge" variant="success">COMPLETED</b-badge>
                                        </div>
                                    </template>
                                </b-table>
                            <b-row>
                                    <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" align="center" ></b-pagination>
                            </b-row>
                    </b-container>
        </b-card>
        </div>
    </div>
    <!-- <b-modal id="showReferenceCode" ref="showReferenceCode" hide-footer title="Technical Support Client Satisfaction Measurement Form">
        <div class="center">
        <input type="text" id="myInput" disabled style="color:black; font-weight: bold" value="https://forms.gle/475YJgUWHcY4x57Z8">
        </div>
        <b-button class="mt-3" variant="info" block @click="copyReferenceCode()">Copy</b-button>
    </b-modal> -->
    <b-modal id="showReferenceCode" ref="showReferenceCode" hide-footer title="Technical Support Client Satisfaction Measurement Form">
        <div class="d-block text-center">
        <!-- <input type="text" v-model="this.ticketData_update.reference_code" id="myInput" disabled style="color:black; font-weight: bold"> -->
        </div>
        <b-button class="mt-3" variant="info" block @click="copyReferenceCode()">Copy</b-button>
    </b-modal>
    <b-modal id="showDetails" ref="showDetails" hide-footer title="TICKET INFORMATION">
        <span style="font-weight: bold"> Details </span>
        <b-table 
            stacked
            :items="ticketDetails"
            :fields="fields2"
            :sort-by.sync="sortBy"
            :sort-desc.sync="sortDesc"
            sort-icon-left
            responsive="sm"
            :filter="filterOn"
            :current-page="currentPage"
            :per-page="perPage"
            :filter-included-fields="filterOn">
        </b-table>
        <span style="font-weight: bold"> Tracking </span>
        <b-table 
            stacked
            :items="ticketDetails"
            :fields="fields3"
            :sort-by.sync="sortBy"
            :sort-desc.sync="sortDesc"
            sort-icon-left
            responsive="sm"
            :filter="filterOn"
            :current-page="currentPage"
            :per-page="perPage"
            :filter-included-fields="filterOn">
        </b-table>
    </b-modal>
    <b-modal id="showDetails_internal" ref="showDetails_internal" hide-footer title="TICKET DETAILS" size="xl">
        <div class="">
            <div class="">
                <b-form class="login-form" id="login-form" v-on:submit.prevent="assignStaff">
                                <!-- <div class="sign-in-htm"> -->
                        <div class="">
                            <div class="">
                                <span style="font-weight: bold"> DETAILS </span>
                                <b-table 
                                    :items="ticketDetails"
                                    :fields="fields_internal"
                                    :sort-by.sync="sortBy"
                                    :sort-desc.sync="sortDesc"
                                    sort-icon-left
                                    responsive="sm"
                                    :filter="filterOn"
                                    :current-page="currentPage"
                                    :per-page="perPage"
                                    :filter-included-fields="filterOn">
                                    <template #cell(reference_code)="row">
                                        <b>{{ row.value}}</b>
                                    </template>
                                    <template #cell(externalName)="row">
                                        {{ row.value.toUpperCase()}}
                                    </template>
                                    <template #cell(internal_external)="row">
                                        <div v-if="row.item.internal_external === 'Internal'">
                                            <b-badge class="mr-1 badge" variant="success">Internal</b-badge>
                                        </div>
                                        <div v-if="row.item.internal_external === 'External'">
                                            <b-badge class="mr-1 badge" variant="primary">External</b-badge>
                                        </div>
                                    </template>
                                    <template #cell(supportType)="row">
                                        <b style="color:rgb(35, 132, 179)">{{ row.value}}</b>
                                    </template>
                                </b-table>
                                    
                                <span style="font-weight: bold"> PROBLEM THAT NEEDED SUPPORT </span>
                                <b-table 
                                    :items="ticketDetails"
                                    :fields="fields_moreInfo"
                                    :sort-by.sync="sortBy"
                                    :sort-desc.sync="sortDesc"
                                    sort-icon-left
                                    responsive="sm"
                                    :filter="filterOn"
                                    :current-page="currentPage"
                                    :per-page="perPage"
                                    :filter-included-fields="filterOn">
                                        <template #cell(clientNote)="row">
                                            <div v-if="row.item.clientNote === ''">
                                                No remarks.
                                            </div>
                                            <div v-else>
                                                <div style="font-style: italic">{{ row.value}}</div>
                                            </div>
                                        </template>
                                </b-table>
                            </div>
                        </div>
                </b-form>
            </div>
        </div>
    </b-modal>

    <b-modal id="showDetails_external" ref="showDetails_external" hide-footer title="TICKET DETAILS" size="xl">
        <div class="">
            <div class="">
                <b-form class="login-form" id="login-form" v-on:submit.prevent="assignStaff">
                                <!-- <div class="sign-in-htm"> -->
                        <div class="">
                            <div class="">
                                <span style="font-weight: bold"> DETAILS </span>
                                <b-table 
                                    :items="ticketDetails"
                                    :fields="fields_external"
                                    :sort-by.sync="sortBy"
                                    :sort-desc.sync="sortDesc"
                                    sort-icon-left
                                    responsive="sm"
                                    :filter="filterOn"
                                    :current-page="currentPage"
                                    :per-page="perPage"
                                    :filter-included-fields="filterOn">
                                        <template #cell(reference_code)="row">
                                            <b>{{ row.value}}</b>
                                        </template>
                                        <template #cell(externalName)="row">
                                            {{ row.value.toUpperCase()}}
                                        </template>
                                        <template #cell(externalAgency)="row">
                                            {{ row.value.toUpperCase()}}
                                        </template>
                                        <template #cell(internal_external)="row">
                                            <div v-if="row.item.internal_external === 'Internal'">
                                                <b-badge class="mr-1 badge" variant="success">Internal</b-badge>
                                            </div>
                                            <div v-if="row.item.internal_external === 'External'">
                                                <b-badge class="mr-1 badge" variant="primary">External</b-badge>
                                            </div>
                                        </template>
                                        <template #cell(supportType)="row">
                                            <b style="color:rgb(35, 132, 179)">{{ row.value}}</b>
                                        </template>
                                </b-table>
                                <span style="font-weight: bold"> EVENT DETAILS </span>
                                <b-table 
                                    :items="ticketDetails"
                                    :fields="fields_external_event"
                                    :sort-by.sync="sortBy"
                                    :sort-desc.sync="sortDesc"
                                    sort-icon-left
                                    responsive="sm"
                                    :filter="filterOn"
                                    :current-page="currentPage"
                                    :per-page="perPage"
                                    :filter-included-fields="filterOn">
                                </b-table>
                                <span style="font-weight: bold"> REMARKS</span>
                                <b-table 
                                    :items="ticketDetails"
                                    :fields="fields_moreInfo"
                                    :sort-by.sync="sortBy"
                                    :sort-desc.sync="sortDesc"
                                    sort-icon-left
                                    responsive="sm"
                                    :filter="filterOn"
                                    :current-page="currentPage"
                                    :per-page="perPage"
                                    :filter-included-fields="filterOn">
                                        <template #cell(clientNote)="row">
                                            <div v-if="row.item.clientNote === ''">
                                                No remarks.
                                            </div>
                                            <div v-else>
                                                <div style="font-style: italic">{{ row.value}}</div>
                                            </div>
                                        </template>
                                </b-table>
                            </div>
                        </div>
                </b-form>
            </div>
        </div>
    </b-modal>
  </div>
  
</template>

<style>
    .font-weight-800{
        font-weight: 800;
    }
    .font-weight-700{
        font-weight: 700;
    }
    .font-weight-600{
        font-weight: 600;
    }
</style>

<script>
import * as ticket_service from '../services/ticket_service';

export default {
    name: 'employee',
    data() {
        return {
            ticket: [],
            ticketDetails: [],
            ticketData:{
                status:'',
                reference_code:''
            },
            assignedTicketData:{},
            employee_Email: '',
            employee_Div: '',
            errors : '',
            internal_external:'',
            infoModal: {
                id: 'info-modal',
                title: '',
                content: ''
            },
            pageOptions: [5, 10, 15, { value: 100, text: "Show a lot" }],
            totalRows: 0,
            currentPage: 1,
            perPage: 100,
            filterOn: [],
            filter: null,
            sortDirection: 'asc',
            sortBy: 'id',
            sortDesc: true,
            fields: [
                { key: 'reference_code', label: 'Reference Code'},
                { key: 'status', label: 'Status'},
                { key: 'ticket_created', label: 'Date Requested'},
                { key: 'ticket_completed', label: 'Date Completed'},
                { key: 'externalName', label: 'Client Name'},
                { key: 'internal_external', label: 'Client Type'},
                { key: 'type', label: 'Type'},
                { key: 'supportType', label: 'Support Type'},

                
                // { key: 'details', label: 'Details'},
                { key: 'feedback_status', label: 'Feedback Status' },
                { key: 'actions', label: 'Action' }
            ],
            fields_INPROG: [
                { key: 'reference_code', label: 'Reference Code'},
                { key: 'priority', label: 'Priority'},
                { key: 'ticket_created', label: 'Date Requested'},
                { key: 'externalName', label: 'Client Name'},
                { key: 'internal_external', label: 'Client Type'},
                { key: 'supportType', label: 'Support Type'},
                { key: 'status', label: 'Status'},

                { key: 'details', label: 'Details'},
                { key: 'actions', label: 'Action' }
            ],
            fields2: [
                { key: 'status', label: 'Status'},
                { key: 'reference_code', label: 'Reference Code'},
                { key: 'name', label: 'Client Name'},
                { key: 'division_id', label: 'Division'},
                { key: 'email', label: 'Email'},
                { key: 'type', label: 'Request Type'},
                { key: 'concerned_division', label: 'Concerned Division'},
                { key: 'concerned_section', label: 'Concerned Section'},
                { key: 'note', label: 'Note'},
            ],
            fields3: [
                { key: 'ticket_created', label: 'Date Submitted'},
                { key: 'ticket_approved', label: 'Date Approved'},
                // { key: 'ticket_approved', label: 'Date Assigned'},
                { key: 'ticket_attended', label: 'Date Attended'},
                { key: 'ticket_updated', label: 'Date Updated'},
                { key: 'ticket_completed', label: 'Date Completed'},
            ],
            fields_internal: [
                { key: 'reference_code', label: 'Reference Code'},
                { key: 'ticket_created', label: 'Date Submitted'},
                { key: 'externalName', label: 'Client Name'},
                { key: 'division_id', label: 'Division'},
                { key: 'internal_external', label: 'Client Type'},
                { key: 'supportType', label: 'Support Type'},
            ],
            fields_external: [
                { key: 'reference_code', label: 'Reference Code'},
                { key: 'ticket_created', label: 'Date Submitted'},
                { key: 'externalName', label: 'Client Name'},
                { key: 'externalAgency', label: 'Agency'},
                { key: 'internal_external', label: 'Client Type'},
                { key: 'supportType', label: 'Support Type'},
            ],
            fields_external_event: [
                { key: 'externalEventTitle', label: 'Event Title'},
                { key: 'externalStartDate', label: 'Start Date'},
                { key: 'externalEndDate', label: 'End Date'},
            ],
            fields_moreInfo: [
                { key: 'clientNote', label: ''},
            ],
            fields_tracking: [
                { key: 'ticket_created', label: 'Date Submitted'},
                { key: 'ticket_approved', label: 'Date Approved'},
                { key: 'ticket_attended', label: 'Date Attended'},
                { key: 'ticket_updated', label: 'Date Updated'},
            ],
            }
    },
    mounted() {
        this.loadAllTicketDetails();
    },
    computed: {
      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },
    methods: {
        viewTicketDetails: async function(data) {
            this.assignedTicketData = {...data}

            let govTypeId = this.assignedTicketData.internal_external;

            if (govTypeId == "Internal"){
                try{
                    const response = await ticket_service.loadTicketDetails(this.assignedTicketData.id);
                    this.ticketDetails = response.data;
                }
                catch (error){

                }
                this.$refs['showDetails_internal'].show();

            } else if (govTypeId == "External"){
                try{
                    const response = await ticket_service.loadTicketDetails(this.assignedTicketData.id);
                    this.ticketDetails = response.data;
                }
                catch (error){

                }
                this.$refs['showDetails_external'].show();
            }
        },
        loadAllTicketDetails: async function() {

            const response_getUserData = await ticket_service.getUserData();
            this.displayName=response_getUserData.data.user.name;
            
			let name = this.displayName;
            const response_name = await ticket_service.setName(name);
            
            try{
                const response_set_refCode = await ticket_service.setDisplayName(name);
                const response = await ticket_service.getAllTicketDetails_Completed_Assigned(name);
                this.ticket = response.data;
                this.totalRows = this.ticket.length;
            } catch(error) {
                this.flashMessage.error({
                message: 'Some error occured! Please try again.',
                time: 5000
                });
            }
        },
        loadEmployeeHealthAndTraining: async function(data) {
            this.$refs['showDetails'].show();
            
        },
        setStatus: async function(data) {
            
            this.assignedTicketData = {...data}

            this.loadAllTicketDetails();

            const date = new Date();
			const months = [
				'January',
				'February',
				'March',
				'April',
				'May',
				'June',
				'July',
				'August',
				'September',
				'October',
				'November',
				'December'
				];
			const monthIndex = date.getMonth()
			const monthName = months[monthIndex]
			let currentDay= String(date.getDate()).padStart(2, '0');
			let currentMonth = String(date.getMonth()+1).padStart(2,"0");
			let currentYear = date.getFullYear();
			// let date_ticketCreated = monthName + " " + currentDay + " " + currentYear;
            let getHours = date.getHours();
            let getMinutes = date.getMinutes();
            let getSeconds = date.getSeconds();
            // Check whether AM or PM
            let newformat = getHours >= 12 ? 'PM' : 'AM';
            // Find current hour in AM-PM Format
            getHours = getHours % 12;
            // To display "0" as "12"
            getHours = getHours ? getHours : 12;
            getMinutes = getMinutes < 10 ? '0' + getMinutes : getMinutes;
			let date_ticketCreated = monthName + " " + currentDay + " " + currentYear + " " + getHours + ":" + getMinutes + " " + newformat;

			let currentDateTime = currentYear + "-" + currentMonth + "-" + currentDay;
            const response_getUserData = await ticket_service.getUserData();
            this.displayName=response_getUserData.data.user.name;

            var ticket_data = {...data}

            try {
                let formData = new FormData();
                formData.append('feedback_received', date_ticketCreated);
                formData.append('feedback_status', 'Received');


                const response = await ticket_service.updateFeedbackStatus(this.assignedTicketData.id, formData);
               
                this.flashMessage.success({
					message: 'Feedback Received Successfully!'
				});

            } catch (error) {
                this.flashMessage.warning({
					message: 'Please fill out the form!'
				});
            }
            this.loadAllTicketDetails();
        },
        showLink: async function(data){
            this.assignedTicketData = {...data}

           
            this.internal_external = this.assignedTicketData.internal_external;

            if (this.internal_external === "Internal"){
                let a1 = "Government (Employee or another agency)".replaceAll(" ", "+");
                let a2 = "National Capital Region (NCR)".replaceAll(" ", "+");
                let a3 = "Technical Support Services".replaceAll(" ", "+");
                let a4 = "Gobyerno (Empleyado o Ahensya)".replaceAll(" ", "+");
                let a5 = this.assignedTicketData.reference_code.replaceAll(" ", "+");
                let a6 = this.assignedTicketData.externalName.replaceAll(" ", "+");
                let a7 = this.assignedTicketData.empEmail.replaceAll(" ", "+");
                let a8 = this.assignedTicketData.empDiv.replaceAll(" ", "+");
                let a9 = this.assignedTicketData.date1.replaceAll(" ", "+"); // request date
                let a10 = this.assignedTicketData.date2.replaceAll(" ", "+"); // completed date
                let a11 = this.assignedTicketData.clientNote.replaceAll(" ", "+");
                let a12 = this.assignedTicketData.actions_taken.replaceAll(" ", "+");
                let a13 = this.assignedTicketData.natureOfSupport.replaceAll(" ", "+");
                let a14 = this.assignedTicketData.attended_by.replaceAll(" ", "+");
                let a15 = this.assignedTicketData.remarks.replaceAll(" ", "+");
                let a16 = this.assignedTicketData.assisted_by_1.replaceAll(" ", "+");

                let link_internal = "https://docs.google.com/forms/d/e/1FAIpQLSfda5Huf3g5zB5kIoemYLrM-SPR41VmTYRQ2gyeGwaeTtXPsg/viewform?usp=pp_url"
                + "&entry.613601820=" + a1
                + "&entry.2007236997=" + a2
                + "&entry.474414778=" + a3
                + "&entry.1426259693=" + a4
                + "&entry.1972918236=" + a2
                + "&entry.2008685738=" + a3
                + "&entry.1725600=" + "0"
                + "&entry.1819805617=" + "0"
                + "&entry.1637951943=" + a5 //reference code
                + "&entry.478303025=" + a6 // name
                + "&entry.2075742875=" + a7 // email
                + "&entry.292814853=" + a8 // division 
                + "&entry.1555563534=" + a9 //date of request
                + "&entry.1650701328=" + a10 // date accomplished
                + "&entry.910998812=" + a11 // describe the problem that needed support || client note
                + "&entry.1859630267=" + a12 // actions taken 
                + "&entry.1734376917=" + a13 // nature of support
                + "&entry.9829575=" + a14 // attended by 
                + "&entry.943510939=" + a16 // assisted by 
                + "&entry.1753625299=" + a15; // remarks
                // navigator.clipboard.writeText(link_internal);
                

                const textarea = document.createElement('textarea');
                textarea.value = link_internal;
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
            }

            else if (this.internal_external === "External"){
                console.log("this is external");
                let a1 = "Government (Employee or another agency)".replaceAll(" ", "+");
                let a2 = "National Capital Region (NCR)".replaceAll(" ", "+");
                let a3 = "Technical Support Services".replaceAll(" ", "+");
                let a4 = "Gobyerno (Empleyado o Ahensya)".replaceAll(" ", "+");
                let a5 = this.assignedTicketData.reference_code.replaceAll(" ", "+"); //reference code
                let a6 = this.assignedTicketData.externalName.replaceAll(" ", "+"); //client name
                let a7 = this.assignedTicketData.externalAgency.replaceAll(" ", "+"); //external Agency
                let a8 = this.assignedTicketData.date1.replaceAll(" ", "+"); // request date
                let a9 = this.assignedTicketData.date2.replaceAll(" ", "+"); // completed date
                let a10 = this.assignedTicketData.clientNote.replaceAll(" ", "+");
                let a11 = this.assignedTicketData.actions_taken.replaceAll(" ", "+");
                let a12 = this.assignedTicketData.supportType.replaceAll(" ", "+");
                let a13 = this.assignedTicketData.externalOtherType_.replaceAll(" ", "+");
                let a14 = this.assignedTicketData.attended_by.replaceAll(" ", "+");
                let a15 = this.assignedTicketData.remarks.replaceAll(" ", "+");
                let a16 = this.assignedTicketData.assisted_by_1.replaceAll(" ", "+");

                let link_external = "https://docs.google.com/forms/d/e/1FAIpQLSfAsfevS5Lr1vWAFPO9qFCDpR08qSgAgr9RZprShdJpKTAelg/viewform?usp=pp_url"
                + "&entry.613601820=" + a1
                + "&entry.2007236997=" + a2
                + "&entry.474414778=" + a3
                + "&entry.1426259693=" + a4
                + "&entry.1972918236=" + a2
                + "&entry.2008685738=" + a3
                + "&entry.1725600=" + "0"
                + "&entry.1819805617=" + "0" 
                + "&entry.1637951943=" + a5 // reference code
                + "&entry.478303025=" + a6 // client name
                + "&entry.292814853=" + a7 // agency
                + "&entry.1555563534=" + a8 //request date
                + "&entry.1650701328=" + a9 // completed date
                + "&entry.910998812=" + a10 //client note || problem that needed support
                + "&entry.1859630267=" + a11 //actions taken
                + "&entry.1734376917=" + a12 //nature of support
                + "&entry.1517158863=" + a13 //specific request type
                + "&entry.9829575=" + a14 //attended by
                + "&entry.411227260=" + a16 //assisted by
                + "&entry.1753625299=" + a15; //remarks

                

                const textarea = document.createElement('textarea');
                textarea.value = link_external;
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
            }

            
            
            this.flashMessage.success({
                message: 'Link Copied Successfully!'
            });
            // this.$refs.showReferenceCode.show()
        },
		copyReferenceCode(){
			var copyText = document.getElementById("myInput");
			copyText.select();
			copyText.setSelectionRange(0, 99999); 
			navigator.clipboard.writeText(copyText.value);
		},
    }
}

</script>