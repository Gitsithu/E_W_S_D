@include('layouts.partial.header')  
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                
                <!-- this is written for the header of the academic year direction home page -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Academic Year Create</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Academic Year</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this is end for the header of the academic year direction home page -->

                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
          
          
              <!-- this is written for alert the message box when user take action -->
             <div class="row">
                 @if (session('success'))
                 <div class="flash-message col-md-12">
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
                                  <!-- it end for alert the message box when user take action -->
                                  
                                  <!-- this is written to create the new academic year data -->
                                   <div class="col-md-12">
                                   <div class="card">
                                     <div class="card-header">
                                       <h5 class="title">Academic Year Create</h5>
                                     </div>
                                     <div class="card-body">
                                     <!-- this is wriiten to carry the data to the certain route -->
                                       <form action="/backend/academicyear" method="post" enctype="multipart/form-data">
                                           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                         <div class="row">
                                           <div class="col-md-6 pr-md-1">
                                             <div class="form-group">
                                               <label>Start_Academic_Year</label>
                                               <input type="text" class="form-control" value="{{ old('s_academic_year') }}" name="s_academic_year" placeholder="Eg: 2000">
                                             </div>
                                           </div>

                                           <div class="col-md-6 pl-md-1">
                                             <div class="form-group">
                                               <label>End_Academic_Year</label>
                                               <input type="text" class="form-control" value="{{ old('e_academic_year') }}" name="e_academic_year" placeholder="Eg: 2001">
                                             </div>
                                           </div>
                                         </div>

                                           <div class="row">
                                           <div class="col-md-6 pr-md-1">
                                             <div class="form-group">
                                               <label>First Closure Date</label>
                                               <input type="date" class="form-control" value="{{ old('first_closure_date') }}" name="first_closure_date" placeholder="Eg: 2000-2001">
                                             </div>
                                           </div>
                                         
                                         
                                           <div class="col-md-6 pl-md-1">
                                             <div class="form-group">
                                               <label>Final Closure Date</label>
                                               <input type="date" class="form-control" value="{{ old('final_closure_date') }}" name="final_closure_date" placeholder="Eg: 2000-2001">
                                             </div>
                                           </div>
                                           </div>
                                          
                                          <div class="row">
                                           <div class="col-md-12 pr-md-1">
                                             <div class="form-group">
                                               <label>Status</label>
                                               <select class="form-control" value="{{ old('status') }}" name="status" id="status">
                                                           
                                                   <option value="1" selected>Active</option>
                                                   
                                           </select>
                                             </div>
                                           </div>
                                           </div>
                                           
                                        </div>
                                    
                                         <div class="card-footer">
                                               <button type="submit" class="btn btn-fill btn-primary"> <i class="tim-icons icon-send"></i> Save</button>
                                             </div>
                       
                                       </form>
                                       <!-- this is end to carry the data to the certain route -->
                                     </div>
                                   </div>
                                 </div>
                                 <!-- it end for to create the new academic year data -->
                               </div>
                            
@include('layouts.partial.footer')