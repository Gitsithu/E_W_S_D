@include('layouts.frontend.header')

<!-- this is written for search function for the faculty that one make easier for users -->
<!-- ##### Breadcumb Area Start ##### -->
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
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Catagory ##### -->
    <div class="clever-catagory bg-img d-flex align-items-center justify-content-center p-3" style="background-image: url(/frontend/img/bg-img/bg2.jpg);">
        <h3>Search &amp; Type</h3>
    </div>

    <!-- ##### Popular Course Area Start ##### -->
    <section class="popular-courses-area section-padding-100">
        <div class="container">
    @if(!isset($details))
    <p class="text-danger" style="padding-top:80px;"><b>Sorry, we have nothing to show about your search with our faculty name!</b></p>
    
    @elseif(isset($details))
    <p class="text-primary" style="padding-top:40px;"> The Search results for your query <b> {{ $query }} </b> are :</p>

    <!-- this is witten for the link that will be shown in detail when user click the more detail -->
        <div class="row">
            @foreach($details as $obj)
                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="/frontend/img/bg-img/c1.jpg" alt="">
                        <!-- Course Content -->
                        
                        <!-- this is written for what kind of faculty is created -->
                        <div class="course-content">
                            <h6>{{$obj->type}}</h6>
                            <div class="meta d-flex align-items-center">
                               
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Coordinator</a>
                            </div>
                            <p>{{$obj->start_academic_year}}-{{$obj->end_academic_year}}</p>
                        </div>
                        <!-- this is end for what kind of faculty is created -->
                        <!-- Seat Rating Fee -->

                        <!-- this is written for what kind of faculty is created -->
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
                                <a href='/frontend/faculty/edit/{{ $obj->id }}' class="free">More Detail</a>
                            </div>
                        </div>
                        <!-- this is end for what kind of faculty is created -->
                    </div>
                </div>
                @endforeach
            </div>
             <!-- this is end for the link that will be shown in detail when user click the more detail -->
            @endif
        </div>
    </section>
    <!-- ##### Popular Course Area End ##### -->
    <!-- this is end for search function for the faculty that one make easier for users -->
    @include('layouts.frontend.footer')