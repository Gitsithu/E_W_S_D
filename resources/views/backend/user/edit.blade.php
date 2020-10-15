@if(Auth::user()->role_id == 4 || Auth::user()->role_id == 5)
@include('layouts.frontend.header')

<section class="ftco-section contact-section"  style="margin-bottom:100px; margin-top: 40px;" >
    
<div class="main">
<div class="container">
    <div class="card" style="box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);">
        <div class="card-header">
    <div class="row justify-content-center">
            @if (count($errors) > 0)
                            <!-- card-body start -->
        
                          <!-- this is written for alert the message box when user take action -->
                            <div class="row">
                                <!-- div class=row One start -->
                                @foreach ($errors->all() as $error)
                                <div class="col-md-12">
                                    <!-- div class=col 12 One start -->
                                    <p class="text-danger">* {{ $error }}</p>
                                </div><!-- div class=col 12 One end -->
                                @endforeach
                            </div>
                            @endif<!-- div class=row One end -->
                          <!-- this is end for alert the message box when user take action -->
        
                    <div class="col-md-12">
            
                    <!-- this is wriiten to carry the data to the certain route -->
                    <form method="POST" action="/home/{{ isset($user2)? $user2->id:0 }}"  enctype="multipart/form-data" style="margin-top:50px;">
                        @csrf   
                        {{ method_field('PATCH') }}

                       
                        <div>
                                <input id="email" type="email" class="form-control " name="email" value="{{ isset($user2)? $user2->email:Request::old('email') }}" required autocomplete="email">
                        </div>

                        <div style="padding-top:25px;">
        
                                <input id="password" type="password" class="form-control"   name="password" required autocomplete="new-password" placeholder="The new password or the old's one">

                        </div>

                        <div style="padding-top:25px;">
                                <input id="password-confirm" type="password" class="form-control " name="password_confirmation"  required autocomplete="new-password" placeholder="Plx confirm your password">
                        </div>
                    
                        <div style="padding-top:25px;">
                                <input id="image" type="file" class="form-control"  value="{{ isset($user2)? $user2->image:Request::old('image') }}" name="image">
                        </div>
                    
                        <div style="padding-top:25px;">

                                <input id="phone" type="text" class="form-control" name="phone" value="{{ isset($user2)? $user2->phone:Request::old('phone') }}" required autocomplete="phone">
                        </div>

                        <div style="padding-top:25px;">
                                <textarea id="address" class="form-control " name="address" required autocomplete="address">{{ isset($user2)? $user2->address:Request::old('address') }}</textarea>
                        </div>

                        <div style="padding-top:25px;">
                            <select class="form-control" value="{{ isset($user2)? $user2->status:Request::old('status') }}" name="status" id="status" placeholder="Status">
                                    <option value="1" selected>Active</option>   
                            </select>
                    </div>
           
                     
                        <div style="padding-top:25px;">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary" style="width:150px;" >
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- this is end to carry the data to the certain route -->
        </div>
    </div>
    </div>
</div>
</div>
    </div></section>
    {{-- <script>
            function myFunction() {
                if(!confirm("Are You Sure to update this ?"))
                event.preventDefault();
            }
            
             function myFunction1() {
                 if(!confirm("Are You Sure to delete this ?"))
                 event.preventDefault();
             }
             </script> --}}
@include('layouts.frontend.footer')
@else
@include('layouts.partial.header')  
<style>
 #off-set{
    width:80%; 
    margin-left:300px;
 }

 @media only screen and (max-width: 400px) {
    #off-set{
    width:100%; 
    margin-left:0px;
 }
}

 @media only screen and (max-width: 600px) {
    #off-set{
    width:100%; 
    margin-left:0px;
 }
}
@media only screen and (max-width: 800px) {
    #off-set{
        width:100%; 
    margin-left:0px;
 }
}
@media only screen and (max-width: 1000px) {
    #off-set{
        width:100%; 
    margin-left:0px;
 }
}
</style>
<div class="container-fluid" id=off-set>
<div class="content">
      
    <div class="row">
  
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
        
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <!-- div class=row one start -->
                        {{-- @if (session('fail'))
                        <div class="flash-message col-md-12">
                            <div class="alert alert-success ">
                                {{session('fail')}}
                            </div>
                        </div>
                        @endif --}}
                    </div>
                </div>
            </div>
    
        <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">User Edit</h5>
          </div>
          <div class="card-body">
                <form method="POST" action="/home/{{ isset($user2)? $user2->id:0 }}"  enctype="multipart/form-data" style="margin-top:50px;">
                    @csrf   
                    {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-md-4 pr-md-1">
                  <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="email" class="form-control " name="email" value="{{ isset($user2)? $user2->email:Request::old('email') }}" required autocomplete="email"> 
                  </div>
                </div>
                <div class="col-md-4 pl-md-1">
                  <div class="form-group">
                    <label>Password</label>
                    <input id="password" type="password" class="form-control"   name="password" required autocomplete="new-password" placeholder="New password or old one">
                 </div>
                </div>
                <div class="col-md-4 pr-md-1">
                        <div class="form-group">
                          <label>Confirm-Password</label>
                          <input id="password-confirm" type="password" class="form-control "  name="password_confirmation"  required autocomplete="new-password" placeholder="Plx confirm your password">
                        </div>
                      </div>
                     
              </div>
              <div class="row">
                <div class="col-md-4 pr-md-1">
                  <div class="form-group">
                    <label>Image <i class="tim-icons icon-simple-add" style="padding-bottom:5px;"></i></label>
                    <input id="image" type="file" value="{{ isset($user2)? $user2->image:Request::old('image') }}" class="form-control" name="image">
                    <p class="description">Plx Cick the upper word Image for updating!</p>
                </div>
                </div>
                <div class="col-md-4 px-md-1">
                  <div class="form-group">
                    <label>Phone</label>
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ isset($user2)? $user2->phone:Request::old('phone') }}" required autocomplete="phone">
                   
                  </div>
                </div>
                @if(Auth::user()->role_id==1)
                <div class="col-md-4 px-md-1">
                        <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" value="{{ isset($user2)? $user2->status:Request::old('status') }}" name="status" id="status">
                                    
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                            </select>
                         
                        </div>
                      </div>
                @else
                <div class="col-md-4 px-md-1">
                        <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" value="{{ isset($user2)? $user2->status:Request::old('status') }}" name="status" id="status">
                                        <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                @endif
             </div>
            
             
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="address"  class="form-control">{{ isset($user2)? $user2->address:Request::old('address') }}</textarea>
                    
                  </div>
                </div>
              </div>
              <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-success">Update</button>
                  </div>

            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="card-body">
            <p class="card-text">
              <div class="author">
                <div class="block block-one"></div>
                <div class="block block-two"></div>
                <div class="block block-three"></div>
                <div class="block block-four"></div>
                <a href="javascript:void(0)">
                <img class="avatar" src="{{$user2->image}}" alt="...">
                <h5 class="title">{{$user2->name}}</h5>
                </a>
                <p class="description">
                  @if($user2->role_id==2)
                  Meketing Manger
                  @elseif($user2->role_id==3)
                  Marketing Coordinator
                  @elseif($user2->role_id==4)
                  Student
                  @elseif($user2->role_id==5)
                  Guest
                  @else
                  Admin
                  @endif
                </p>
              </div>
            </p>
            <div class="card-description">
              Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
            </div>
          </div>
          <div class="card-footer">
            <div class="button-container">
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                <i class="fab fa-facebook"></i>
              </button>
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                <i class="fab fa-twitter"></i>
              </button>
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                <i class="fab fa-google-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  



@include('layouts.partial.footer')
@endif           