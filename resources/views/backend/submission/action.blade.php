@include('layouts.partial.header')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->

                <!-- this is end for the header of the submission direction home page -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Contributions List</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Contributions</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this is end for the header of the submission direction home page -->

                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- data table  -->
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
                 <!-- this is end for alert the message box when user take action -->


                 <!-- this is written for alert the message box when user take action -->
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

                                <!-- this written to download the articles and images -->
                               @if(Auth::user()->role_id==2)
                               <div class="card-body">
                                       <a class="btn btn-success" href="{{ route('create-zip1') }}"><i class="fas fa-download"></i> Download Articles</a>
                                       <a class="btn btn-info" href="{{ route('create-zip') }}"><i class="fas fa-download"></i> Download Images</a>
                               
                                @else
                                @endif
                                <!-- this end to download the articles and images -->

                                 <!-- this is written for table of what kind of submission topic information will be shown -->
                                       <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:50px">
                                        <thead>
                                            <tr>
                                           
                                                <th>Name</th>
                                           
                                                <th>Faculty</th>  
                                                <th>Article</th>
                                                <th>View Article</th>
                                                <th>Image</th>
                                                <th>Comment</th>
                                                <th>Academic Year</th>
                                                <th>Status</th>
                                                <th>Submission_Date</th>
                                                <th>Updated at</th>
                                                @if(Auth::user()->role_id==3)
                                                <th>Action</th>
                                                <th>Action</th>    
                                                @else
                                                
                                                @endif
                                            </tr>
                                        </thead>
                                     <!-- this is end for table of what kind of submission topicinformation will be shown -->

                                    
                                     <!-- this is written for table of what kind of submission information will be shown -->
                                        <tbody>
                                        @foreach ($actions as $action)
                                <tr>
                                   
                                <td>{{ $action->user_name}}</td>
                                    
                                <td>{{ $action->faculty_type}}</td>
                                <td>{{ $action->article}}</td>

                                <!-- this is written to download the individual articels and images -->
                                <td><a class="btn btn-info" onclick="return myFunction2();" href="{{$action->article}}"><i class="tim-icons icon-pencil"></i>View Article</a></td>
                                <td><img src="{{ $action->image }}" class="rounded" width="50" /></td>
                                <!-- this is end to download the individual articels and images -->
                                <?php
                                                $parameter = $action->id;
                                            $parameter= Crypt::encrypt($parameter);
                                ?>
                                <td><a href="/backend/submission/show/{{ $parameter }}" style="color:blue;text-decoration:underline;">View Comment</a></td>
                                <td>{{ $action->s_academic_year }}-{{ $action->e_academic_year }}</td>
                                 <td>
                                    <b>
                                        @if($action->status == 1)
                                        <p class="text-success">Selected</p>
                                        @else
                                        <p class="text-danger">Pending</p>
                                        @endif
                                    </b>
                                </td>
        
        
                                <td>{{ $action->submission_date }}</td>
                                <td>{{ $action->updated_at }}</td>
                                <!-- this is written for permission of role_id 3 -->
                                @if(Auth::user()->role_id==3)
                                @foreach($comments as $comment)
                                @if($comment->addition==0)
                                
                                <td><a class="btn btn-success" onclick="return myFunction();" href="/backend/submission/{{ $parameter }}/edit"><i class="tim-icons icon-pencil"></i>Give Comment</a></td>
                                @else
                                @endif
                                @endforeach
                                
                               @if($action->status==0)
                               <form action="/backend/submission/{{ isset($action)? $action->id:0 }}" method="post"  enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                               
                                <td><button class="btn btn-success" name="status" value="1" onclick="return myFunction1();" type="submit"><i class="tim-icons icon-pencil"></i>Select</button></td>
                               </form>
                                @else
                               @endif
                               
                               @else
                               @endif
                              
                               <!-- this is written for permission of role_id 3 -->
        
                            </tr>
                            @endforeach
                                        </tbody>
                                        <!-- this is written for table of what kind of submission information will be shown -->
                                        
                                        <tfoot>
                                        <tr>
                                        @if(Auth::user()->role_id==3)
                                            @else
                                                <th>Name</th>
                                            @endif 
                                                <th>Faculty</th>  
                                                <th>Article</th>
                                                <th>View Article</th>
                                                <th>Image</th>
                                                <th>Comment</th>
                                                <th>Academic Year</th>
                                                <th>Status</th>
                                                <th>Submission_Date</th>
                                                <th>Updated at</th>
                                                @if(Auth::user()->role_id==3)
                                                <th>Action</th>
                                                <th>Action</th>    
                                                @else
                                                
                                                @endif
                                                
                                               
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
            

<script>
    function myFunction() {
        if(!confirm("Are You Sure to update this ?"))
        event.preventDefault();
    }
    
    function myFunction1() {
        if(!confirm("Are You Sure to select this ?"))
        event.preventDefault();
    }
    function myFunction2() {
        if(!confirm("Are You Sure to view this ?"))
        event.preventDefault();
    }
</script>       
@include('layouts.partial.footer')