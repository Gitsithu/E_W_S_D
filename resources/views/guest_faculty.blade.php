@include('layouts.frontend.header')

<!-- ##### Breadcumb Area Start ##### -->
<!-- this is written for the header of the faculty direction home page -->
<div class="breadcumb-area">
        <!-- Breadcumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Faculty</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
    </div>
<!-- this is end for the header of the faculty direction home page -->
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Catagory ##### -->
    <div class="clever-catagory bg-img d-flex align-items-center justify-content-center p-3" style="background-image: url(/frontend/img/bg-img/bg2.jpg);">
        <h3>Faculty &amp; Type</h3>
    </div>

    <!-- ##### Popular Course Area Start ##### -->
    <!-- this is wriiten when coordinator created the faculty and will be displayed here -->
    <section class="popular-courses-area section-padding-100">
        <div class="container">
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
                            <!-- this is end for what kind of faculty is created -->
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
                            <div class="course-fee h-100">
                            <?php
                                                $parameter = $obj->id;
                                            $parameter= Crypt::encrypt($parameter);
                            ?>
                                <a href='/frontend/guest/guest/{{ $parameter }}' class="free">More Result</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
            <!-- this is end for the link that will be shown in detail when user click the more detail -->
        </div>
    </section>
    <!-- this is end for when coordinator created the faculty and will be displayed here -->
    <!-- ##### Popular Course Area End ##### -->
    
@include('layouts.frontend.footer')