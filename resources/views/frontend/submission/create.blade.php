@include('layouts.frontend.header')

<!-- ##### Breadcumb Area Start ##### -->
<!-- this is written for the header of the Submission direction home page -->
<div class="breadcumb-area">
        <!-- Breadcumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Submission</a></li>
            </ol>
        </nav>
    </div>
<!-- this is end for the header of the Submission direction home page -->
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Single Course Intro Start ##### -->
    <div class="single-course-intro d-flex align-items-center justify-content-center" style="background-image: url(/frontend/img/bg-img/bg3.jpg);">
        <!-- Content -->
        <div class="single-course-intro-content text-center">
            <!-- Ratings -->
            <div class="ratings">
              
            </div>
            <h3>Faculty</h3>
        </div>
    </div>

    <!-- ##### Single Course Intro End ##### -->

    <!-- ##### Courses Content Start ##### -->
    <div class="single-course-content section-padding-100">
        <div class="container">
        <div class="row">
            <!-- this is written for the alert box. The alert box will be displayed when user takes certain action -->
                 @if (session('success'))
                 <div class="flash-message col-md-12 ">
                     <div class="alert alert-success ">
                         {{session('success')}}
                     </div>
                 </div>
                 @elseif(session('fail'))
                 <div class="flash-message col-md-12">
                     <div class="alert alert-danger">
                         {{session('fail')}}
                     </div>
                 </div>
                
                 @endif
                       @if (count($errors) > 0)
                                       <div class="content mt-3">
                                           <!-- div class=row content start -->
                                           <div class="animated fadeIn">
                                               <!-- div class=FadeIn start -->
                                               <div class="card">
                                                   <!-- card start -->
                                   
                                                   <div class="card-body">
                                                       <!-- card-body start -->
                                   
                                   
                                                       <div class="row">
                                                           <!-- div class=row One start -->
                                                           @foreach ($errors->all() as $error)
                                                           <div class="col-md-12">
                                                               <!-- div class=col 12 One start -->
                                                               <p class="text-danger">* {{ $error }}</p>
                                                           </div><!-- div class=col 12 One end -->
                                                           @endforeach
                                                       </div><!-- div class=row One end -->
                                   
                                   
                                                   </div> <!-- card-body end -->
                                   
                                               </div><!-- card end -->
                                           </div><!-- div class=FadeIn start -->
                                       </div><!-- div class=row content end -->
                                       @endif
                                   
    </div>
    <!-- this is end for the alert box. The alert box will be displayed when user takes certain action -->
    
    
    <!-- this is written for the student where thry can submit courseworks -->
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="course--content">

                        <div class="clever-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Submission</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Text -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="clever-description">

                                    <!-- this is wrriten to carry the data to the database -->
                                    <form action="/submission/store" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    
                                    
                                    <!-- About Course -->
                                    <!-- this is written to know the faculty name of the coursework -->
                                    <div class="about-course mb-30">
                                    @foreach($objs as $obj)
                                    <h5>Faculty Name --->><span style="color: red;"> {{$obj->type}} </span></h5>
                                    <input type="hidden" name="faculty_id" value="{{$obj->id}}">
                                    @endforeach
                                    </div>
                                    <!-- this is end to know the faculty name of the coursework -->

                                    <!-- this is written to know the faculty academic year, start date and deadline -->
                                    <div class="about-course mb-30">
                                    @foreach($academic as $objs)
                                    <h5>Academic_Year --->><span style="color: red;"> {{$objs->s_academic_year}}-{{$objs->e_academic_year}}</span></h5><br>
                                    <h5>First Closure Date --->><span style="color: red;"> {{$objs->first_closure_date}}</span></h5><br>
                                    <h5>Final Closure Date --->><span style="color: red;"> {{$objs->final_closure_date}}</span></h5><br>
                                    <input type="hidden" name="academic_year_id" value="{{$objs->id}}">
                                    @endforeach
                                    </div>
                                    <!-- this is end to know the faculty academic year, start date and deadline -->

                                    <!-- this is written upload the student's articles and images -->
                                    <div class="about-course mb-30">
                                                <h4>File Upload</h4>
                                                <input type="file" name="article" class="form-control">
                                            </div>

                                            <div class="about-course mb-30">
                                                <h4>Image Upload</h4>
                                                <input type="file" name="image" class="form-control" >
                                            </div>
                                    <!-- this is end upload the student's articles and images -->

                                    <!-- this is written to alert the students which the school decide principles -->
                                            <div class="about-course mb-30">
                                            <input type="checkbox"  required>    I agree terms and conditions  
                                            </div>
                                    <!-- this is written to alert the students which the school decide principles -->

                                    <!-- this is written to submit the courseworks to the respective marketing coordinators -->
                                            @if(isset($objss))
                                            @foreach($d_date as $date)
                                            @if($date->count_id !== 0)

                                          
                                            @foreach($objss as $objs)
                                            @if($objs->faculty_id==$obj->id)

                                                <button type="submit" onclick="return myFunction();" class="btn clever-btn mb-30 w-100">Submit</button>
                                            @else
                                            @endif
                                            @endforeach

                                            @else
                                            @endif
                                            @endforeach

                                            @else
                                            @endif
                                    <!-- this is end to submit the courseworks to the respective marketing coordinators -->
                                           
                                            </form>
                                            <!-- this is end to carry the data to the database -->
                                        

                                        
                                    </div>
                                </div>


                                

                                <!-- Tab Text -->
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="course-sidebar">
                        <!-- Buy Course -->

                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <u><h4>Terms and conditions</h4></u>
                            <ul class="features-list">
                                <li>
                                    <h6>According to submition rule.</h6>
                                    
                                </li>
                                <li>
                                    <h6>Students need to submit within</h6>
                                    
                                </li>
                                <li>
                                    <h6>dead line.</h6>
                                    
                                </li>
                                <li>
                                    <h6>After dead line, you can't sumit</h6>
                                    
                                </li>
                                <li>
                                    <h6>any files.</h6>
                                    
                                </li>
                                <li>
                                    <h6>Then, you can do only updating for</h6>
                                    
                                </li>
                                <li>
                                    <h6>your's submitted files.</h6>
                                    
                                </li>
                                <li>
                                    <h6>With respect UOG.</h6>
                                    
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- this is end for the student where thry can submit courseworks -->
        </div>
    </div>
    <!-- ##### Courses Content End ##### -->

    <!-- this is written for the alert box. The alert box will be displayed when user takes certain action -->
    <script>
    function myFunction() {
    if(!confirm("Are You Sure to do this ?"))
    event.preventDefault();
    }
    </script>
    @include('layouts.frontend.footer')
    <!-- this is end for the alert box. The alert box will be displayed when user takes certain action -->