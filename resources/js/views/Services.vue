<template>
    <div class="container-l bg-white p-0">
        <!-- Navbar Start -->

        
        <!-- Category Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        List of Services
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
                                <h6 class="mb-3">Library Material Request Service</h6>
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
                                <h6 class="mb-3">Library Circulation Service</h6>
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
                                <h6 class="mb-3">Library Tour and Orientation</h6>
                            </a>
                        </div>
                        <div
                            class="col-lg-4 col-sm-6 wow fadeInUp"
                            data-wow-delay="0.7s"
                        >
                            <a class="cat-item rounded p-4" href="">
                                <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                                <h6 class="mb-3">Online Library Literacy Program</h6>
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
                                <h6 class="mb-3">Library Benchmarking</h6>
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
                                <h6 class="mb-3">Library Training/Webinars</h6>
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
                                    Library Internship
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Category End -->

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