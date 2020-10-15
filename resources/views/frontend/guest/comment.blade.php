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
            <h3>Display Comment</h3>
        </div>
    </div>

    <!-- ##### Single Course Intro End ##### -->

    <!-- ##### Courses Content Start ##### -->
    <div class="single-course-content section-padding-100">
        <div class="container">
            <!-- this is written for the alert box. The alert box will be displayed when user takes certain action -->
        <div class="row">
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
    
     <!-- this is written for the comment page that will be shown what had marketing coordintor commented --> 
    <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="course--content">

                        <div class="clever-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Comment</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Text -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="clever-description">
                                    <div class="about-course mb-30">
                                    @foreach($submissions as $comment)
                                    <p>{!! nl2br(e($comment->comment)) !!}</p>
                                    @endforeach
                                    </div>
                                    </div>
                                </div>


                                

                                <!-- Tab Text -->
                                
                            </div>
                        </div>
                    </div>
                </div>

    </div>
         <!-- this is end for the comment page that will be shown what had marketing coordintor commented -->                
                    </div>
                    </div>

            
        
    
    <!-- ##### Courses Content End ##### -->
    @include('layouts.frontend.footer')