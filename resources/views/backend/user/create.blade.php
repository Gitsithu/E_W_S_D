@include('layouts.partial.header')  
              


<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                 <!-- this is written for the header of the user direction home page -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Account Create</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Account</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- this is end for the header of the user direction home page -->

                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

      
  <div class="row">

              <!-- this is written for alert the message box when user take action -->
              <!-- div class=row one start -->
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
           
        <!-- this is written to create the new user data -->
        <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">User Create</h5>
          </div>
         
          <div class="card-body">
          <!-- this is wriiten to carry the data to the certain route -->
            <form method="POST" action="/backend/user">
                @csrf
                 <div class="row">
                <div class="col-md-4 pr-md-1">
                    <div class="form-group">
                    <label>Name</label>
                    <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                  </div>
                </div>
                <div class="col-md-4 px-md-1">
                    <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            
                  </div>
                </div>
                <div class="col-md-4 pl-md-1">
                  <div class="form-group">
                    <label>Phone</label>
                    <input id="phone" type="text" class="form-control" name="phone" min="8" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">
                  </div>
                </div>
                 </div>
              <div class="row">

              <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                        <label>Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                      </div>
            
                </div>
              
                <div class="col-md-6 pl-md-1">
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                  </div>
                </div>
                

              </div>
              <div class="row">
                <div class="col-md-6 pr-md-1">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{ old('address') }}" name="address" required autocomplete="address">
                  </div>
                </div>
              
                <!-- this is written the identify the role_id of users by name -->              
                  <div class="col-md-6 pl-md-1">                 
                   <div class="form-group">                   
                    <label>Role_list</label>                    
                    <select class="form-control" name="role_id" id="role_id" value="{{ old('role_id') }}">      
                                      <option value="" disabled >Select role</option> 
                                      <option value="2" style="color:black;">Marketing Manager</option> 
                                    <option value="3" style="color:black;">Marketing Coordinator</option>
                                    <option value="4" style="color:black;">Student</option>                   
                                     </select>                
                                       </div>               
                                        </div>            
                                         </div>             
                                          <!-- this is end the identify the role_id of users by name -->   
                                      <div class="row">              
                                      <div class="col-md-6 pr-md-1">                  
                                      <div class="form-group">                    
                                      <label>Faulty_type</label>                    
                                      <!-- this is written to call the nanme of faculty from faculty table -->  
                    <select class="form-control"value="{{ old('faculty_id') }}" name="faculty_id" id="faculty_id">
                      <option value="0" style="color:black;">All Faculty(*For Manager Only*)</option>
                        @foreach($faculty as $faculty)                          
                        <option value="{{$faculty->id}}" style="color:black;">{{$faculty->type}}</option> 
                          @endforeach                  
                          </select>                 
                          <!-- this is end to call the nanme of faculty from faculty table -->    
                          </div>                
                          </div>                              
                          <!-- this is written the identify the id of status by name -->               
                           <div class="col-md-6 pl-md-1">                  
                           <div class="form-group">                    
                           <label>Status</label>                
                           <select class="form-control" value="{{ old('status') }}" name="status" id="status"> 
                          <option value="" disabled>Select status</option>                           
                           <option value="1" style="color:black;">Active</option>                    
                           <option value="0" style="color:black;">In-Active</option>               
                           </select>                  
                           </div>                
                           </div>              
                           <!-- this is end the identify the id of status by name -->                             
                            </div>
                
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
            
                  </div>

            </form>
            <!-- this is end to carry the data to the certain route -->
          </div>
        </div>
      </div>
      <!-- this is end to create the new user data -->
    </div>
</div>

         
@include('layouts.partial.footer')