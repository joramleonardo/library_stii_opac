<template>
    <div class="container-l p-0">
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

        <div class="about-main-content">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="content">
                    <div class="blur-bg"></div>
                    <h4>The Science and Technology Information Network of the Philippines</h4>
                    <div class="line-dec"></div>
                    <h2>DOST Union Catalog</h2>
                    <p>
                        This contains the union catalog of the 
                    <span style="font-weight: bold; font-style: italic">DOST ScINET-PHIL</span>,
                        a consortium of all the 21 libraries and information centers under the 
                        <span style="font-weight: bold; font-style: italic">Department of Science and Technology (DOST) </span>
                        including its 15 regional offices. The main objective of the catalog 
                        is to facilitate the research work both for professionals and students as well. 
                        The union catalog would save a lot of time and money for our library users. 
                        Any prospective library user need not go from one library to another in search of 
                        information materials. What he has to do is access the union catalog and check 
                        whether the material he needs is available or not, and if so in which library 
                        or information center.
                    </p>
                    <p>
                        The 
                        <span style="font-weight: bold; font-style: italic">SciNet Integrated Libary Management System (SILMS) </span>
                        was customized from several existing ILMS to suit our requirements. 
                        Said system can handle both bibliographic and full-text contents of library 
                        and information materials including multimedia.
                    </p>
                    <div class="main-button">
                        <a href="#/opac">Visit OPAC</a>
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

    .nav-link a:hover{
        color: red !important;
        text-decoration: none !important;
    }
</style>

<script>
  export default {
    data() {
      return {
        slide: 0,
        sliding: null
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
    }
  }
</script>