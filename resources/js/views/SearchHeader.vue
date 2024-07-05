<template>
<div>
    <!-- Navbar Start -->
    <!-- <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">DOST-STII Library</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0 px-lg-3">
                    <a class="nav-item nav-link ">
                        <router-link to="/home">
                        Home
                        </router-link>
                    </a>
                    <a class="nav-item nav-link ">
                        <router-link to="/opac">
                        OPAC
                        </router-link>
                    </a>
                    <a class="nav-item nav-link">
                        <router-link to="/materials">
                        Materials
                        </router-link>
                    </a>
                    <a class="nav-item nav-link">
                        <router-link to="/services">
                        Services
                        </router-link>
                    </a>
                    <a class="nav-item nav-link">
                        <router-link to="/faqs">
                        FAQs
                        </router-link>
                    </a>
                    <a class="nav-item nav-link">
                        <router-link to="/about">
                        About
                        </router-link>
                    </a>
                    <a class="nav-item nav-link">
                        <router-link to="/about">
                        Contact Us
                        </router-link>
                    </a>
                </div>
                <a
                    href="https://www.facebook.com/STIILibrary"
                    class="visit-btn btn btn-primary rounded-0 py-4 px-lg-3 d-none d-lg-block"
                    target="_blank"
                    >Visit us on Facebook<i class="fa fa-arrow-right ms-3"></i
                ></a>
            </div>

    </nav> -->

    <b-navbar toggleable="lg" type="dark" sticky style="background-color:#004A98 !important">
        <b-navbar-brand href="#">
            <img src="images/logo-library.png" class="d-inline-block align-top" alt="Kitten" style="margin-left: 50px; width: 8%; height: 8%;">
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse">
        </b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav style="color: white !important">
            <b-navbar-nav >
                <b-nav-item to="/home" exact exact-active-class="">Home</b-nav-item>
                <b-nav-item to="/opac" exact exact-active-class="">OPAC</b-nav-item>
                <b-nav-item to="/services" exact exact-active-class="">Services</b-nav-item>
                <b-nav-item to="/faqs" exact exact-active-class="">FAQs</b-nav-item>
                <b-nav-item to="/linkages" exact exact-active-class="">Linkages</b-nav-item>
                <b-nav-item to="/about" exact exact-active-class="">About</b-nav-item>
                <b-nav-item to="/contact" exact exact-active-class="">Contact</b-nav-item>
            </b-navbar-nav>

            <!-- Right aligned nav items -->
            <!-- <b-navbar-nav class="ml-auto">
                <b-nav-item-dropdown text="Lang" right>
                    <b-dropdown-item href="#">EN</b-dropdown-item>
                    <b-dropdown-item href="#">ES</b-dropdown-item>
                    <b-dropdown-item href="#">RU</b-dropdown-item>
                    <b-dropdown-item href="#">FA</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav> -->
        </b-collapse>
    </b-navbar>
    <!-- Navbar End -->
    <div class="container-l py-0">
        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
            <div class="carousel-indicators">
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
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/opac-banner.png" class="d-block w-100" alt="Sunset Over the City"/>
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
</div>

</template>

<style>
    
    .nav-link a:hover{
        color: red !important;
        text-decoration: none !important;
    }

    .wrapper {
        position: sticky;
        top: 0;
    }

    .navbar-dark .navbar-nav .nav-link{
        color: white !important;
        font-weight: 900;
    }

    .navbar-dark .navbar-nav .nav-link:hover{
        color: red !important;
        font-weight: 900;
    }
</style>