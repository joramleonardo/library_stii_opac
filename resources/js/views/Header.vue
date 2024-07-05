<template>
    <header class="header-area header-sticky">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <b-navbar toggleable="lg" type="dark" style="background-color: #3b719d !important">
                        <b-navbar-brand href="#">
                            <!-- DOST SciNET-PHILss -->
                            <img src="images/aa1.png" class="d-inline-block align-top" alt="Kitten">
                        </b-navbar-brand>

                        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                        <b-collapse id="nav-collapse" is-nav>
                        <!-- <b-navbar-nav>
                            <b-nav-item href="#">Link</b-nav-item>a
                            <b-nav-item href="#" disabled>Disabled</b-nav-item>
                        </b-navbar-nav> -->

                        <!-- Right aligned nav items -->
                        <b-navbar-nav class="ml-auto">
                            <!-- <b-nav-form>
                                <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
                                <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
                            </b-nav-form> -->
                            <b-nav-item href="/#/">HOME</b-nav-item>
                            <b-nav-item href="/#/opac">OPAC</b-nav-item>
                            <b-nav-item-dropdown text="ABOUT" right>
                                <b-dropdown-item href="/#/about">ABOUT US</b-dropdown-item>
                                <b-dropdown-item href="/#/missionvision">MISSION/VISION</b-dropdown-item>
                                <b-dropdown-item href="/#/organizationl-structure">ORGANIZATIONAL STRUCTURE</b-dropdown-item>
                                <b-dropdown-item href="/#/member-benefits">MEMBER BENEFITS</b-dropdown-item>
                            </b-nav-item-dropdown>
                            <!-- <b-nav-item href="#">FAQs</b-nav-item>
                            <b-nav-item href="#">How to use OPAC</b-nav-item> -->

                            <b-nav-item-dropdown text="FAQs" right>
                                <b-dropdown-item href="/#/faqs">FAQs</b-dropdown-item>
                                <b-dropdown-item href="/#/how-to-use-opac">How to use OPAC</b-dropdown-item>
                            </b-nav-item-dropdown>

                            
                        </b-navbar-nav>
                        </b-collapse>
                    </b-navbar>

                    <!-- <nav class="main-nav">
                        <a href="index.html" class="logo">
                            <img src="images/logo.png" alt="">
                        </a>
                        <ul class="nav">
                            <li><a href="index.html" class="active">Home</a></li>
                            <li><a href="about.html">OPAC</a></li>
                            <li><a href="deals.html">About</a></li>
                            <li><a href="reservation.html">FAQs</a></li>
                            <li><a href="reservation.html">How to use OPAC</a></li>
                        </ul>   
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav> -->
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