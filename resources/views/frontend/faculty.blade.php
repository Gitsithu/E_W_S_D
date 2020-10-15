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
<!-- this is written for the header of the faculty direction home page -->
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Catagory ##### -->
    <div class="clever-catagory bg-img d-flex align-items-center justify-content-center p-3" style="background-image: url(/frontend/img/bg-img/bg2.jpg);">
        <h3>Faculty &amp; Type</h3>
    </div>

    <!-- ##### Popular Course Area Start ##### -->
    <section class="popular-courses-area section-padding-100">
        <div class="container">
        <div class="row">
            @foreach($objs as $obj)
                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="https://www.logo-designer.co/wp-content/uploads/2016/12/2016-rbl-logo-design-university-of-greenwich.png" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h6>{{$obj->type}}</h6>
                            <div class="meta d-flex align-items-center">
                               
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Coordinator</a>
                            </div>
                            
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
                            @if(Auth::check())
                            <div class="course-fee h-100">
                            <?php
                                                $parameter = $obj->id;
                                            $parameter= Crypt::encrypt($parameter);
                            ?>
                                <a href="/frontend/faculty/edit/{{ $parameter }}" class="free">More Detail</a>
                                
                            </div>
                            @else
                            <div class="course-fee h-100">
                                <a href="{{ route('login') }}" onclick="return myFunction();" class="free">More Detail</a>  
                            </div>
                           @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </section>
    <!-- ##### Popular Course Area End ##### -->
    <script>
        function myFunction() {
        if(!confirm("Dear User! you have no account login. Plx login to enter this"))
        event.preventDefault();
    }
    
    </script>
    @include('layouts.frontend.footer')