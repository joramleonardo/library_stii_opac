<template>
    <div class="container-l bg-white p-0">
        <!-- Carousel Start -->
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
                        <img src="images/banner-2.png" class="d-block w-100" alt="Sunset Over the City"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        <div class="container-xxl py-5">
            <div class="container">     
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    What's New on our Shelves! 
                </h1>    
                <b-card-group deck>
                    <b-card title="Medical and Veterinary Entomology" 
                            sub-title="Spencer Rhodes" 
                            img-src="images/book-1.jpg" img-alt="Image" class="wow fadeInUp" img-top data-wow-delay="0.1s">
                        <!-- <b-card-text style="color: black !important">
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                        </b-card-text> -->
                        <!-- <b-card-text class="text-muted" style="font-size: 60%">
                            Wheter you are a naturalist, student, educator, farmer, researcher, or industrialist, this book stands as an indispensable resource. It not
                            only offers profound insights into the latest agricultural technology, but also confronts the global digital divide in farming,
                            providing a roadmap for modernization. "agricultural Technology and Land Development Machinery" serves as a professional
                            guide for those seeking to navigate and advance agriculture withing the digital era.
                        </b-card-text> -->
                        <template #footer>
                            <!-- <small class="text-muted">View</small> -->
                            <b-button size="sm" class="btn btn-primary" style="">
                                    <router-link to="/result">
                                        View
                                    </router-link>
                            </b-button>
                        </template>
                    </b-card>

                    <b-card title="Basic Nutrition" 
                            sub-title="3G E-Learning" 
                            img-src="images/book-2.jpg" img-alt="Image" class="wow fadeInUp" img-top data-wow-delay="0.1s">
                        <!-- <b-card-text style="color: black !important">
                        This card has supporting text below as a natural lead-in to additional content.
                        </b-card-text> -->
                        <!-- <template #footer>
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </template> -->
                        <template #footer>
                            <!-- <small class="text-muted">View</small> -->
                            <b-button size="sm" class="btn btn-primary" style="">
                                    <router-link to="/result">
                                        View
                                    </router-link>
                            </b-button>
                        </template>
                    </b-card>

                    <b-card title="Agricultural Technology and Land Development Machinery" 
                            sub-title="Dr. Mahesh Kumar" 
                            img-src="images/book-3.jpg" img-alt="Image" class="wow fadeInUp" img-top data-wow-delay="0.1s">
                        <!-- <b-card-text style="color: black !important">
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                        This card has even longer content than the first to show that equal height action.
                        </b-card-text> -->
                        <!-- <template #footer>
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </template> -->
                        <template #footer>
                            <!-- <small class="text-muted">View</small> -->
                            <b-button size="sm" class="btn btn-primary" style="">
                                    <router-link to="/result">
                                        View
                                    </router-link>
                            </b-button>
                        </template>
                    </b-card>
                </b-card-group>
            </div>
        </div>

        <!-- Category Start -->
        
            <div class="container-xxl py-5" style="background-color: #f4f4f4;">
                <div class="container">
                    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        List of Materials
                    </h1>
                    <div class="row g-4">
                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.1s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i
                                    class="fa fa-3x fa-mail-bulk text-primary mb-4"
                                ></i>
                                <h6 class="mb-3">Articles</h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>
                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.3s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i
                                    class="fa fa-3x fa-headset text-primary mb-4"
                                ></i>
                                <h6 class="mb-3">Books</h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>
                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.5s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i
                                    class="fa fa-3x fa-user-tie text-primary mb-4"
                                ></i>
                                <h6 class="mb-3">Theses/Dissertations</h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>
                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.7s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                                <h6 class="mb-3">Technical Reports</h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>

                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.1s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i
                                    class="fa fa-3x fa-chart-line text-primary mb-4"
                                ></i>
                                <h6 class="mb-3">Investigatory Projects</h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>
                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.3s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i
                                    class="fa fa-3x fa-hands-helping text-primary mb-4"
                                ></i>
                                <h6 class="mb-3">Reprints</h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>
                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.5s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i
                                    class="fa fa-3x fa-book-reader text-primary mb-4"
                                ></i>
                                <h6 class="mb-3">
                                    Non-Prints
                                </h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>
                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.7s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i
                                    class="fa fa-3x fa-drafting-compass text-primary mb-4"
                                ></i>
                                <h6 class="mb-3">Serials</h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>

                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.1s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i
                                    class="fa fa-3x fa-chart-line text-primary mb-4"
                                ></i>
                                <h6 class="mb-3">
                                    Vertical Files
                                </h6>
                                <p class="mb-0" style="color: black !important">123</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
       
        <!-- Category End -->

        <!-- About Start -->
        
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img
                                    class="img-fluid w-100"
                                    src="images/img-1.jpg"
                                />
                            </div>
                            <div class="col-6 text-start">
                                <img
                                    class="img-fluid"
                                    src="images/img-2.jpg"
                                    style="width: 85%; margin-top: 15%;"
                                />
                            </div>
                            <div class="col-6 text-end">
                                <img
                                    class="img-fluid"
                                    src="images/img-3.jpg"
                                    style="width: 85%;"
                                />
                            </div>
                            <div class="col-6 text-end">
                                <img
                                    class="img-fluid w-100"
                                    src="images/img-4.jpg"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.
                        </h1>
                        <p class="mb-4">
                            Pellentesque et ultricies metus. Quisque ullamcorper
                            sem ac erat venenatis auctor. Phasellus suscipit est
                            eget facilisis egestas. Nulla ornare mauris magna,
                            ultrices egestas neque commodo nec.
                        </p>
                        <p>
                            <i class="fa fa-check text-primary me-3"></i>Tempor
                            erat elitr rebum at clita
                        </p>
                        <p>
                            <i class="fa fa-check text-primary me-3"></i>Aliqu
                            diam amet diam et eos
                        </p>
                        <p>
                            <i class="fa fa-check text-primary me-3"></i>Clita
                            duo justo magna dolore erat amet
                        </p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href=""
                            >Read More</a
                        >
                    </div>
                </div>
            </div>
        </div> 
       
        <!-- About End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-0 wow fadeIn" data-wow-delay="0.1s" >
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
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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