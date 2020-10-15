@include('layouts.partial.header')  
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->

                <!-- this is written for the header of the faculty direction home page -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Faculty Create</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Faculty</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this is end for the header of the faculty direction home page -->

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
                                   <!-- this is end for alert the message box when user take action -->
                                    

                                    <!-- this is written to create the new faculty data -->
                                   <div class="col-md-12">
                                   <div class="card">
                                     <div class="card-header">
                                       <h5 class="title">Faculty Create</h5>
                                     </div>
                                     <div class="card-body">
                                     <!-- this is wriiten to carry the data to the certain route -->
                                       <form action="/backend/faculty" method="post" enctype="multipart/form-data">
                                           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                           <div class="row">
                                           <div class="col-md-12 pr-md-1">
                                             <div class="form-group">
                                               <label>Faculty Type</label>
                                               <input type="text" value="{{ old('type') }}" class="form-control" name="type" placeholder="Faculty Type">
                                             </div>
                                           </div>
                                          
                                         </div>
                                         <div class="row">
                                           <div class="col-md-8 pr-md-1">
                                             <div class="form-group">
                                               <label>Academic_Year</label>
                                               <select class="form-control"value="{{ old('academic_year_id') }}" name="academic_year_id" id="academic_year_id">                    
                                              @foreach($academics as $academic)
                                              <option value="{{$academic->id}}" style="color:black;">{{$academic->s_academic_year}}-{{$academic->e_academic_year}}</option>
                                               @endforeach
                                              </select>
            
                                             </div>
                                           </div>
                                           
                                           <div class="col-md-4 pl-md-1">
                                             <div class="form-group">
                                               <label>Status</label>
                                               <select class="form-control" value="{{ old('status') }}" name="status" id="status">
                                                           
                                                   <option value="1" selected>Active</option>
                                                   
                                           </select>
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
                                  <!-- this is end to create the new faculty data -->
                               </div>
                            
@include('layouts.partial.footer')