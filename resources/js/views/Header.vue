<template>
    <header class="header-area header-sticky">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <b-navbar toggleable="lg" type="dark" style="background-color: #3b719d !important">
                        <b-navbar-brand href="#">
                            <img src="images/aa1.png" class="d-inline-block align-top" alt="Kitten">
                        </b-navbar-brand>

                        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                        <b-collapse id="nav-collapse" is-nav>

                        <b-navbar-nav class="ml-auto">
                            <b-nav-item href="/#/">Home</b-nav-item>
                            <b-nav-item href="/#/opac">Online Public Access Catalog</b-nav-item>
                            
                            <b-nav-item href="/#/faqs">FAQs</b-nav-item>
                            <b-nav-item-dropdown text="About" right>
                                <b-dropdown-item href="/#/about">About Us</b-dropdown-item>
                                <b-dropdown-item href="/#/missionvision">Mission/Vision</b-dropdown-item>
                                <!-- <b-dropdown-item href="/#/organizationl-structure">ORGANIZATIONAL STRUCTURE</b-dropdown-item> -->
                                <b-dropdown-item href="/#/member-agencies">Member Agencies</b-dropdown-item>
                                <!-- <b-dropdown-item href="/#/member-benefits">Member Benefits</b-dropdown-item> -->
                            </b-nav-item-dropdown>
                        </b-navbar-nav>
                        </b-collapse>
                    </b-navbar>
                </div>
            </div>
        </div>
    </header>
</template>

<style>
   .navbar-dark .navbar-nav .nav-link {
        color: white !important;
    }    
   .navbar-dark .navbar-nav .nav-link:hover {
        color: #FFA471 !important;
    } 
</style>