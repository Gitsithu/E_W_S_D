@if(Auth::user()->role_id == 4)
@include('layouts.frontend.header')

<!-- this is written for responsive for container -->
<style>
 #off-set{
    margin-bottom:100px;
 }

 @media only screen and (max-width: 400px) {
    #off-set{
    width:100%; 
    margin-left:0;
 }
}

 @media only screen and (max-width: 600px) {
    #off-set{
    width:100%; 
    margin-left:0;
 }
}
@media only screen and (max-width: 800px) {
    #off-set{
        width:100%; 
        margin-left:0;
 }
}
@media only screen and (max-width: 1000px) {
    #off-set{
        width:100%; 
        margin-left:0;
 }
}
</style>
<!-- this is end for responsive for container -->

<!-- this is written for the header pf the profile home page -->
<section class="hero-wrap hero-wrap-2 js-fullheight" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">User Profile</h1>
        </div>
      </div>
    </div>
  </section>
<!-- this is end for the header pf the profile home page -->

<div class="container" id="off-set">
  <div class="row">
        <div class="col-md-12">
            
                

                @if (session('success'))
                <div class="flash-message col-md-12">
                    <div class="alert alert-success ">
                        {{session('success')}}
                    </div>
                </div>
                @endif
                
                <!-- Main content -->
                
                        <!-- this is written for table of what kind of user information topic will be shown -->
                        <div class="table-responsive">
                        <table class='table' style="margin-top:20px;margin-bottom:20px;">
                
                                <thead class="thead">
                                    <tr>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Name</th> 
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Email</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Image</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Phone</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Faculty</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Status</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Registered at</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Updated at</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Action</th>
                                        
                                    </tr>
                                </thead>
                        <!-- this is end for table of what kind of user information topic will be shown -->

                        <!-- this is written for table of that the user information will be shown -->
                                <tbody>
                
                                    @foreach ($objs as $obj)
                                    <tr>
                                        <td style="text-align:center;">{{ $obj->name}}</td>
                                        <td style="text-align:center;">{{ $obj->email}}</td>
                                        <td style="text-align:center;"><img src="{{ $obj->image }}" class="rounded" width="50" /></td>
                                        
                                        <td style="text-align:center;">{{ $obj->phone }}</td>
                                        <td style="text-align:center;">{{ $obj->faculty_type}}</td>            
                
                                        <td style="text-align:center;">
                                            <b>
                                                @if($obj->status == 1)
                                                <p class="text-success">Active</p>
                                                @else
                                                <p class="text-danger">In-Active</p>
                                                @endif
                                            </b>
                                        </td>
                
                                        <td style="text-align:center;">{{ $obj->created_at }}</td>
                                        <td style="text-align:center;" >{{ $obj->updated_at }}</td>
                                        <?php
                                                $parameter = $obj->id;
                                            $parameter= Crypt::encrypt($parameter);
                                        ?>
                                        <td style="text-align:center;"><a class="btn btn-success" onclick="return myFunction();" href='/home/edit/{{ $parameter }}'> Edit</a></td>
                                       
                                     
                
                                    </tr>
                                    @endforeach
                        
                                </tbody>
                        <!-- this is end for table of that the user information will be shown -->
                        </table>
                        </div>
                
                 
        </div>
    </div>
</div>

<!-- this is written for the alert box. The alert box will be displayed when user takes certain action -->
<script>
        function myFunction() {
            if(!confirm("Are You Sure to update this ?"))
            event.preventDefault();
        }
        
        //  function myFunction1() {
        //      if(!confirm("Are You Sure to delete this ?"))
        //      event.preventDefault();
        //  }
        //</script>
<!-- this is end for the alert box. The alert box will be displayed when user takes certain action -->


@include('layouts.frontend.footer')
@elseif(Auth::user()->role_id == 5)
@include('layouts.frontend.header')

<!-- this is written for the header pf the profile home page -->
<section class="hero-wrap hero-wrap-2 js-fullheight" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">User Profile</h1>
        </div>
      </div>
    </div>
  </section>
<!-- this is end for the header pf the profile home page -->


<div class="card">
<div class="card-body">
  <div class="row">
        <div class="col-md-12">
            
                

                @if (session('success'))
                <div class="flash-message col-md-12">
                    <div class="alert alert-success ">
                        {{session('success')}}
                    </div>
                </div>
                @endif
                
                <!-- Main content -->
                
                    <!-- this is written for table of what kind of user information topic will be shown -->           
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                
                                <thead class="thead">
                                    <tr>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Name</th> 
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Email</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Image</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Phone</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Status</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Registered at</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Updated at</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Action</th>
                                        
                                    </tr>
                                </thead>
                    <!-- this is end for table of what kind of user information topic will be shown -->
                        
                                <tbody>
                    <!-- this is written for table of that the user information will be shown -->
                                    @foreach ($objs as $obj)
                                    <tr>
                                        <td style="text-align:center;">{{ $obj->name}}</td>
                                        <td style="text-align:center;">{{ $obj->email}}</td>
                                        <td style="text-align:center;"><img src="{{ $obj->image }}" class="rounded" width="50" /></td>
                                        
                                        <td style="text-align:center;">{{ $obj->phone }}</td>
                
                                        <td style="text-align:center;">
                                            <b>
                                                @if($obj->status == 1)
                                                <p class="text-success">Active</p>
                                                @else
                                                <p class="text-danger">In-Active</p>
                                                @endif
                                            </b>
                                        </td>
                
                                        <td style="text-align:center;">{{ $obj->created_at }}</td>
                                        <td style="text-align:center;" >{{ $obj->updated_at }}</td>
                                        <?php
                                        $parameter = $obj->id;
                                        $parameter= Crypt::encrypt($parameter);
                                        ?>
                                        <td style="text-align:center;"><a class="btn btn-success" onclick="return myFunction();" href='/home/edit/{{ $parameter }}'> Edit</a></td>
                                       
                                     
                
                                    </tr>
                                    @endforeach
                
                                </tbody>
                    <!-- this is end for table of that the user information will be shown -->
                        </table>
                        </div>
                
                 
        </div>
    </div>
</div>
</div>

<!-- this is written for the alert box. The alert box will be displayed when user takes certain action -->
<script>
        function myFunction() {
            if(!confirm("Are You Sure to update this ?"))
            event.preventDefault();
        }
        
        //  function myFunction1() {
        //      if(!confirm("Are You Sure to delete this ?"))
        //      event.preventDefault();
        //  }
        //</script>
<!-- this is end for the alert box. The alert box will be displayed when user takes certain action -->


@include('layouts.frontend.footer')
@else
@include('layouts.partial.header')

<!-- this is written for the header pf the profile home page -->
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">User List</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
<!-- this is end for the header pf the profile home page -->
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->


                <!-- this is written for the alert box whether to show it is fail or not -->
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
                 <!-- this is end for the alert box whether to show it is fail or not -->

                 <!-- this is written for the alert box whether to show it is fail or not -->
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
                <!-- this is end for the alert box whether to show it is fail or not -->

                <!-- this is written for the conditions of the user that is seperated by the role_id whether it has permission or not -->

                <!-- this is written for the user with role_id '1' -->
                
                    
                                @if(Auth::user()->role_id==1)
                                <div class="col-md-12">
                                <a href="/backend/user/create" class="form-control btn btn-info" type="button" id="btn_new" name="btn_new"> <i class="fas fa-plus">New User</i></a>
                                </div>
                
                                @else
                <!-- this is end for the user with role_id '1' -->

                <!-- this is written for the user with role_id '2' or '3' -->
                                @endif
        </div>

                    <div class="card"><!-- .card start -->
                        <!-- this is written for table of what kind of user information topic will be shown according to the role_id --> 
                        <div class="card-body">
                        <div class="row"><!-- .row start -->
                        <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Phone</th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Role</th>
                                                @endif
                                                @if(Auth::user()->role_id==2)
                                                @else
                                                <th>Faculty</th>
                                                @endif
                                                <th>Status</th>
                                                <th>Registered at</th>
                                                <th>Updated at</th>
                                                <th>Action</th>  
                                            </tr>
                                        </thead>
                        <!-- this is written for table of what kind of user information topic will be shown according to the role_id -->

                        <!-- this is written for table of that the user information will be shown according to the role_id -->
                                        <tbody>
                                        @foreach ($objs as $obj)
                            <tr>
                                <td>{{ $obj->name}}</td>
                                <td>{{ $obj->email}}</td>
                                <td><img src="{{ $obj->image }}" class="rounded" width="50" /></td>
                                
                                <td>{{ $obj->phone }}</td>

                                @if(Auth::user()->role_id==1)
                                <td>
                                    <b>
                                        @if($obj->role_id == 2)
                                        <p class="text-primary">Marketing Manager</p>
                                        @elseif($obj->role_id == 3)
                                        <p class="text-primary">Marketing Coordinator</p>
                                        @elseif($obj->role_id == 4)
                                        <p class="text-primary">Student</p>
                                        @elseif($obj->role_id == 5)
                                        <p class="text-primary">Guest</p>
                                        @else
                                        <p class="text-danger">Admin</p>
                                        @endif
                                    </b>
                                </td>
                                @endif
                                @if(Auth::user()->role_id==2)
                                @else
                                <td>{{ $obj->faculty_type}}</td>
                                @endif
                                <td>
                                    <b>
                                        @if($obj->status == 1)
                                        <p class="text-success">Active</p>
                                        @else
                                        <p class="text-danger">In-Active</p>
                                        @endif
                                    </b>
                                </td>
                                <td>{{ $obj->created_at }}</td>
                                <td>{{ $obj->updated_at }}</td>
                                <?php
                                                $parameter = $obj->id;
                                            $parameter= Crypt::encrypt($parameter);
                                ?>
                                <td><a class="btn btn-success" onclick="return myFunction();" href='/home/edit/{{ $parameter }}'><i class="tim-icons icon-pencil"></i> Edit</a></td>
                            </tr>
                            @endforeach
                                        </tbody>
                            <!-- this is written for table of that the user information will be shown according to the role_id -->

                            <!-- this is written for table of what kind of user information topic will be shown --> 
                                        <tfoot>
                                        <tr>
                                                <th>Name</th>  
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Phone</th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Role</th>
                                                @endif
                                                <th>Faculty</th>
                                                <th>Status</th>
                                                <th>Registered at</th>
                                                <th>Updated at</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                            <!-- this is written for table of what kind of user information topic will be shown --> 
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
            <!-- this is written for the conditions of the user that is seperated by the role_id whether it has permission or not -->

<!-- this is written for the alert box. The alert box will be displayed when user takes certain action -->
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
@include('layouts.partial.footer')
@endif
<!-- this is end for the alert box. The alert box will be displayed when user takes certain action -->