@include('layouts.frontend.header')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(/frontend/img/bg-img/bg1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">
                        <h2>Let's Study Together</h2>
                        <a href="#" class="btn clever-btn">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- This is written to count for number of faculty that has created  -->
    <!-- ##### Cool Facts Area Start ##### -->
    <section class="cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">
               <!-- Single Cool Facts Area -->
               <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="icon">
                            <img src="/frontend/img/core-img/docs.png" alt="">
                        </div>
                        <h2><span class="counter">{{$faculty_count}}</span></h2>
                        <h5>Total Faculties</h5>
                    </div>
                </div>
    <!-- This is end for to count for number of faculty that has created  -->

    <!-- This is written to count for number of marketing coordinator that has created  -->
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="icon">
                            <img src="/frontend/img/core-img/star.png" alt="">
                        </div>
                        <h2><span class="counter">{{$user_counts}}</span></h2>
                        <h5>Total Coordinators</h5>
                    </div>
                </div>
    <!-- This is end for to count for number of marketing coordinator that has created  -->


    <!-- This is written to count for number of students that has created  -->
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="750ms">
                        <div class="icon">
                            <img src="/frontend/img/core-img/events.png" alt="">
                        </div>
                        <h2><span class="counter">{{$user_counts}}</span></h2>
                        <h5>Total Students</h5>
                    </div>
                </div>
    <!-- This is end for to count for number of students that has created  -->


    <!-- This is written to count for number of selected contibutions that has created  -->
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="1000ms">
                        <div class="icon">
                            <img src="/frontend/img/core-img/earth.png" alt="">
                        </div>
                        <h2><span class="counter">{{$submission_counts}}</span></h2>
                        <h5>Total selected contributions</h5>
                    </div>
                </div>
    <!-- This is end for to count for number of selected contibutions that has created  -->
            </div>
        </div>
    </section>
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Popular Courses Start ##### -->
    <!-- this is wriiten when coordinator created the faculty and will be displayed here -->
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Popular Online Faculty</h3>
                    </div>
                </div>
            </div>
    <!-- this is end for when coordinator created the faculty and will be displayed here -->


    <!-- this is witten for the link that will be shown in detail when user click the more detail -->
            <div class="row">
            @foreach($objs as $obj)
                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="https://www.logo-designer.co/wp-content/uploads/2016/12/2016-rbl-logo-design-university-of-greenwich.png" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <!-- this is written for what kind of faculty is created -->
                            <h6>{{$obj->type}}</h6>
                            <div class="meta d-flex align-items-center">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Coordinator</a>
                            </div>
                        </div>
                            <!-- this is end for what kind of faculty is created -->
                        <!-- Seat Rating Fee -->


                        <div class="seat-rating-fee d-flex justify-content-between">
                            <div class="seat-rating h-100 d-flex align-items-center">
                                <div class="seat">
                                    <i class="fa fa-user" aria-hidden="true"></i> 10
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                </div>
                            </div>
                            <div class="course-fee h-100">
                            <?php
                                                $parameter = $obj->id;
                                            $parameter= Crypt::encrypt($parameter);
                            ?>
                                <a href="/frontend/guest/guest/{{ $parameter }}" class="free">More Result</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    <!-- this is end for the link that will be shown in detail when user click the more detail -->

                
            </div>
        </div>
    </section>
    <!-- ##### Popular Courses End ##### -->

    <!-- ##### Best Tutors Start ##### -->
    <!-- this is written about the introduction of the developers for this website-->
    <section class="best-tutors-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>THE DEVELOPERS</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel wow fadeInUp" data-wow-delay="250ms">

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="/frontend/images/2.jpg" alt="">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Si Thu</h5>
                                <span>Student</span>
                                <p>A student of KMD who attending the final year of BIT(Content Management System).</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                            <img src="/frontend/images/1.jpg" alt="">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Solomon</h5>
                                <span>Student</span>
                                <p>A student of KMD who attending the final year of BIT(Content Management System).</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                            <img src="/frontend/images/2.jpg" alt="">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Si Thu</h5>
                                <span>Student</span>
                                <p>A student of KMD who attending the final year of BIT(Content Management System).</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                            <img src="/frontend/images/1.jpg" alt="">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Solomon</h5>
                                <span>Student</span>
                                <p>A student of KMD who attending the final year of BIT(Content Management System).</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                            <img src="/frontend/images/2.jpg" alt="">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Sithu</h5>
                                <span>Student</span>
                                <p>A student of KMD who attending the final year of BIT(Content Management System).</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- this is end about the introduction of the developers for this website-->
    <!-- ##### Best Tutors End ##### -->

    <!-- ##### Register Now Start ##### -->
    <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(/frontend/img/bg-img/bg2.jpg);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="forms">
                            <h4>Courses For Free</h4>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="site" placeholder="Site">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Now Countdown -->
        <div class="register-now-countdown mb-100 wow fadeInUp" data-wow-delay="500ms">
            <h3>Register Now</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae. Donec bibendum tortor sed mi faucibus vehicula. Sed erat lorem</p>
            <!-- Register Countdown -->
            <div class="register-countdown">
                <div class="events-cd d-flex flex-wrap" data-countdown="2019/03/01"></div>
            </div>
        </div>
    </section>
    <!-- ##### Register Now End ##### -->



    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>From Our Blog</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="/frontend/img/blog-img/1.jpg" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4>Enterprise Web Design</h4>
                            </a>
                            <div class="meta d-flex align-items-center">
                                <a href="#">U Moe Thaint</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Lecturer</a>
                            </div>
                            <p>A teacher of KMD who teaching student about enterprise web design.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="/frontend/img/blog-img/2.jpg" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4>Requirement Management</h4>
                            </a>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Mr.Murphy</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Lecturer</a>
                            </div>
                            <p>A teacher of KMD who teaching student about requirement management.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->
    @include('layouts.frontend.footer')