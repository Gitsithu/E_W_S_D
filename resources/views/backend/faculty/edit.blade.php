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
                            <h2 class="pageheader-title">Faculty Edit</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Faculty</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                   <!-- this is written for alert the message box when user take action -->
                                    
                                    <!-- this is wriiten to create the new faculty data -->
                                   <div class="col-md-12">
                                   <div class="card">
                                     <div class="card-header">
                                       <h5 class="title">Faculty Edit</h5>
                                     </div>
                                     <div class="card-body">
                                     <!-- this is wriiten to carry the data to the certain route -->
                                     <form action="/backend/faculty/{{ isset($obj)? $obj->id:0 }}" method="post" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}    
                                        <div class="row">
                                         </div>
                                         <div class="row">
                                           <div class="col-md-6 pr-md-1">
                                             <div class="form-group">
                                               <label>Faculty Type</label>
                                               <input type="text" class="form-control" value="{{ isset($obj)? $obj->type:Request::old(' type') }}" name="type">
                                             </div>
                                           </div>

                                          
                                           <div class="col-md-6 pl-md-1">
                                             <div class="form-group">
                                               <label>Status</label>
                                               <!-- this is written to show that the status is equal to 1, it show the active, if 2, it show inactive -->
                                               <select class="form-control" name="status" id="status">
                                                              
                                               <?php
                                                if(isset($obj)){
                                                ?>
                                                    
                                                    <option value="1" <?php if ($obj->status == 1){ echo 'selected'; } ?>>Active</option>
                                                    <option value="0" <?php if ($obj->status == 0){ echo 'selected'; } ?>>In-Active</option>

                                                <?php
                                                }
                                                else{
                                                ?>
                                                    
                                                    <option value="1"style="color:black;">Active</option>
                                                    <option value="0"style="color:black;">Inactive</option>
                                                <?php 
                                                }
                                                ?>
                                                                    
                                           </select>
                                           <!-- this is end to show that the status is equal to 1, it show the active, if 2, it show inactive -->
                                             </div>
                                           </div>
                                           
                                        </div>
                                    
                                         <div class="card-footer">
                                               <button type="submit" class="btn btn-fill btn-primary"> <i class="tim-icons icon-send"></i>Update</button>
                                             </div>
                       
                                       </form>
                                       <!-- this is wriiten to carry the data to the certain route -->
                                     </div>
                                   </div>
                                 </div>
                                 <!-- this is end to create the new faculty data -->
                               </div>
                            
@include('layouts.partial.footer')

