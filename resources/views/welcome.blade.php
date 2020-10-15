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
    <!-- This is the end for the div written for number of faculty that has created   -->
    
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
    <!-- This is the end for the div written for number of marketing coordinator that has created   -->         


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
    <!-- This is the end for the div written for number of students that has created   --> 



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
    <!-- This is the end for the div written for number of students that has created   --> 
            </div>
        </div>
    </section>
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Popular Courses Start ##### -->
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">

        <!-- this is wriiten when admin created the faculty and will be displayed here -->
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Popular Online Faculty</h3>
                    </div>
                </div>
            </div>
        <!-- this is the end for the div that show faculty -->


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
                            <!-- this is the end for what kind of faculty is created -->
                            
                        </div>
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
                            <!-- this is written if the user have login in or not, if login he can further go into the detail page -->
                            @if(Auth::check())
                            <div class="course-fee h-100">
                            <?php
                                                $parameter = $obj->id;
                                            $parameter= Crypt::encrypt($parameter);
                            ?>
                                <a href="/frontend/faculty/detail/{{ $parameter }}" class="free">More Detail</a>
                                
                            </div>
                            @else
                            <!-- this is written for the condition of if users haven't login, user will be indirected to login page -->
                            <div class="course-fee h-100">
                                <a href="{{ route('login') }}" onclick="return myFunction();" class="free">More Detail</a>  
                            </div>
                            <!-- this is the end for the condition of if users haven't login, user will be indirected to login page -->
                           @endif
                           <!-- this is end of if the user have login in or not, if login he can further go into the detail page -->
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
    
    <!-- this is written about the introduction of the developers for this website-->
    <!-- ##### Best Tutors Start ##### -->
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
    <!-- ##### Best Tutors End ##### -->
    <!-- this is end about the introduction of the developers for this website-->




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
    <script>
        function myFunction() {
        if(!confirm("Dear User! you have no account login. Plx login to enter this"))
        event.preventDefault();
    }
    
    </script>
    @include('layouts.frontend.footer')