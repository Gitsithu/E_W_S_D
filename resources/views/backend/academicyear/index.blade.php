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
                            <h2 class="pageheader-title">Academic Year List</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Academic Year</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this is written for the header of the academic year direction home page -->

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
                                @if(Auth::user()->role_id==1)
                                <div class="col-md-12">
                                    <a href="/backend/academicyear/create" class="form-control btn btn-primary" type="button" id="btn_new" name="btn_new"> <i class="fas fa-plus">New Academic Year</i></a>
                                </div>
                                @else
                                @endif
                </div>
                        <!-- this is end for alert the message box when user take action -->
                        
                        <!-- this is written for table of what kind of academic year information topic will be shown -->   
                        <div class="card"><!-- .card start -->
                        <!-- this is written for table of what kind of user information topic will be shown according to the role_id --> 
                        <div class="card-body">
                        <div class="row"><!-- .row start -->
                        <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Start_Academic_Year</th>
                                                <th>End_Academic_Year</th>
                                                <th>First_Closure_Date</th>
                                                <th>Final_Closure_Date</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                        <!-- this is end for table of what kind of academic year information topic will be shown -->

                        <!-- this is written for table of what kind of academic year information will be shown -->
                                        <tbody>
                                        @foreach ($objs as $obj)
                                            <tr>
                                                <td>{{ $obj->s_academic_year }}</td>
                                                <td>{{ $obj->e_academic_year }}</td>
                                                <td>{{ $obj->first_closure_date }}</td>
                                                <td>{{ $obj->final_closure_date }}</td>
                                                <td>
                                                @if($obj->status == 1)
                                                <p class="text-success">Active</p>
                                                @else
                                                <p class="text-danger">In-Active</p>
                                                @endif
                                                </td>
                                                <td>{{ $obj->created_at}}</td>
                                                <td>{{ $obj->updated_at}}</td>
                                                <!-- this is written with the condition only with role id 1 can enter  -->
                                                @if(Auth::user()->role_id == 1)
                                                <?php
                                                $parameter = $obj->id;
                                                    $parameter= Crypt::encrypt($parameter);
                                                    ?>
                                                <td><a class="btn btn-info" onclick="return myFunction();" href='/backend/academicyear/{{ $parameter }}/edit'> <i class="fas fa-edit"></i> Edit</a></td>
                                                <td>
                                                <form action="{{ url('/backend/academicyear', ['id' => $obj->id]) }}" method="post">
                                                <button type="submit" onclick="return myFunction1();"  class="btn btn btn-danger" > <i class="fas fa-times-circle"></i> Delete</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="delete" />
                                                </form>
                                                </td>
                                                @endif
                                                <!-- this is end with the condition only with role id 1 can enter  -->
                                                </tr>       
                                                @endforeach
                                        </tbody>
                                    <!-- this is end for table of what kind of academic year information topic will be shown -->

                                        <tfoot>
                                            <tr>
                                                <th>Start_Academic_Year</th>
                                                <th>End_Academic_Year</th>
                                                <th>First_Closure_Date</th>
                                                <th>Final_Closure_Date</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                               
                        
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
            
<!-- this is written for alert the message box when user take action -->
<script>
    function myFunction() {
        if(!confirm("Are You Sure to update this ?"))
        event.preventDefault();
    }
    
    function myFunction1() {
        if(!confirm("Are You Sure to delete this ?"))
        event.preventDefault();
    }
</script>       
<!-- this is end for alert the message box when user take action -->

@include('layouts.partial.footer')