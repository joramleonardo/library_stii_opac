<template>
    <div class="container-l p-0">
        <b-navbar toggleable="lg" type="dark" variant="info" sticky  style="background-color:#3B719D !important">

            <b-navbar-toggle target="nav-collapse">
            </b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <!-- <img src="images/logo.png" class="d-inline-block align-top" alt="scinet-logo" style="width: 50px; height: 50px; margin-left:10px;"> -->
                    <span style="color: #ffffff; font-weight: bold">
                        DOST SciNET-PHIL
                    </span>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <b-nav-item to="/opac" exact exact-active-class="">OPAC</b-nav-item>
                    <b-nav-item-dropdown text="About Us" right>
                        <b-dropdown-item to="/about">About Us</b-dropdown-item>
                        <b-dropdown-item to="/missionvision">Mission/Vision</b-dropdown-item>
                        <b-dropdown-item to="/organizationl-structure">Organizational Structure</b-dropdown-item>
                        <b-dropdown-item to="/member-benefits">Member Benefits</b-dropdown-item>
                    </b-nav-item-dropdown>
                    <b-nav-item to="/how-to-use-opac" exact exact-active-class="">How to use OPAC</b-nav-item>
                    <b-nav-item to="/faqs" exact exact-active-class="">FAQS</b-nav-item>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
        <!-- Navbar End -->
    <div class="container-l py-0">
        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
            <!-- <div class="carousel-indicators">
                <button
                type="button"
                data-mdb-target="#carouselBasicExample"
                data-mdb-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
                ></button>
                <button
                type="button"
                data-mdb-target="#carouselBasicExample"
                data-mdb-slide-to="1"
                aria-label="Slide 2"
                ></button>
                <button
                type="button"
                data-mdb-target="#carouselBasicExample"
                data-mdb-slide-to="2"
                aria-label="Slide 3"
                ></button>
            </div> -->
            <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/bg_CO3.png" class="d-block w-100" alt="Sunset Over the City"/>
                    </div>
                <!-- <div class="carousel-item">
                    <img src="images/poster-2.jpg" class="d-block w-100" alt="Canyon at Nigh"/>
                </div>
                <div class="carousel-item">
                    <img src="images/poster-3.jpg" class="d-block w-100" alt="Cliff Above a Stormy Sea"/>
                </div> -->
            </div>
        </div>
    </div>

        <!-- <div class="container-fluid text-white-50 footer mt-0 wow fadeIn" data-wow-delay="0.1s" style="background-color: #004a98">
            <div class="container py-5">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-primary" data-mdb-ripple-init>search</button>
                </div>
            </div>
        </div> -->
        
        <!-- <div class="container-l bg-white p-0 mt-5 mb-5" id="union-catalog">
            <div class="container-xxl ">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                            <h1 class="mb-4">
                                DOST Union Catalog
                            </h1>
                            <p class="mb-4">
                                This contains the union catalog of the 
                                <span style="font-weight: bold; font-style: italic">DOST ScINET-PHIL</span>,
                                a consortium of all the 21 libraries and information centers under the 
                                <span style="font-weight: bold; font-style: italic">Department of Science and Technology (DOST) </span>
                                including its 15 regional offices. The main objective of the catalog is to facilitate the research work 
                                both for professionals and students as well. The union catalog would save a lot of time and money for our 
                                library users. Any prospective library user need not go from one library to another in search of information 
                                materials. What he has to do is access the union catalog and check whether the material he needs is available 
                                or not, and if so in which library or information center.
                            </p>
                            <p class="mb-4">
                                The 
                                <span style="font-weight: bold; font-style: italic">SciNet Integrated Libary Management System (SILMS) </span>
                                was customized from several existing ILMS to suit our requirements. Said system can handle both 
                                bibliographic and full-text contents of library and information materials including multimedia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container-l p-0 mt-5 mb-5" id="union-catalog">
            <div class="container-xxl ">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-12">
                            <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.5s">
                                DOST Union Catalog
                            </h1>
                            <p class="mb-4">
                                This contains the union catalog of the 
                                <span style="font-weight: bold; font-style: italic">DOST ScINET-PHIL</span>,
                                a consortium of all the 21 libraries and information centers under the 
                                <span style="font-weight: bold; font-style: italic">Department of Science and Technology (DOST) </span>
                                including its 15 regional offices. The main objective of the catalog is to facilitate the research work 
                                both for professionals and students as well. The union catalog would save a lot of time and money for our 
                                library users. Any prospective library user need not go from one library to another in search of information 
                                materials. What he has to do is access the union catalog and check whether the material he needs is available 
                                or not, and if so in which library or information center.
                            </p>
                            <p class="mb-4">
                                The 
                                <span style="font-weight: bold; font-style: italic">SciNet Integrated Libary Management System (SILMS) </span>
                                was customized from several existing ILMS to suit our requirements. Said system can handle both 
                                bibliographic and full-text contents of library and information materials including multimedia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- About End -->

        <!-- Footer Start -->
        <!-- <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-0 wow fadeIn" data-wow-delay="0.1s" >
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href=""
                            >About Us</a
                        >
                        <a class="btn btn-link text-white-50" href=""
                            >Contact Us</a
                        >
                        <a class="btn btn-link text-white-50" href=""
                            >Our Services</a
                        >
                        <a class="btn btn-link text-white-50" href=""
                            >Privacy Policy</a
                        >
                        <a class="btn btn-link text-white-50" href=""
                            >Terms & Condition</a
                        >
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href=""
                            >About Us</a
                        >
                        <a class="btn btn-link text-white-50" href=""
                            >Contact Us</a
                        >
                        <a class="btn btn-link text-white-50" href=""
                            >Our Services</a
                        >
                        <a class="btn btn-link text-white-50" href=""
                            >Privacy Policy</a
                        >
                        <a class="btn btn-link text-white-50" href=""
                            >Terms & Condition</a
                        >
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2">
                            <i class="fa fa-map-marker-alt me-3"></i>DOST
                            Compound, General Santos Avenue, Bicutan 1631,
                            Taguig, Metro Manila
                        </p>
                        <p class="mb-2">
                            <i class="fa fa-phone-alt me-3"></i>837-21-91
                        </p>
                        <p class="mb-2">
                            <i class="fa fa-envelope me-3"></i
                            >dost-stii-library@stii.dost.gov.ph
                        </p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""
                                ><i class="fab fa-twitter"></i
                            ></a>
                            <a class="btn btn-outline-light btn-social" href=""
                                ><i class="fab fa-facebook-f"></i
                            ></a>
                            <a class="btn btn-outline-light btn-social" href=""
                                ><i class="fab fa-youtube"></i
                            ></a>
                            <a class="btn btn-outline-light btn-social" href=""
                                ><i class="fab fa-linkedin-in"></i
                            ></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>
                            Dolor amet sit justo amet elitr clita ipsum elitr
                            est.
                        </p>
                        <div
                            class="position-relative mx-auto"
                            style="max-width: 400px;"
                        >
                            <input
                                class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                                type="text"
                                placeholder="Your email"
                            />
                            <button
                                type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
                            >
                                SignUp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div
                            class="col-md-6 text-center text-md-start mb-3 mb-md-0"
                        >
                            &copy;
                            <a class="border-bottom" href="#"
                                >DOST-STII Library</a
                            >, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Footer End -->

        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
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