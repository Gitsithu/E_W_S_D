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

<!-- this is written to show the submission history of the student -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/frontend/images/31.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Submission<i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Submission History</h1>
        </div>
      </div>
    </div>
  </section>

<div class="container" id="off-set">
  <div class="row">
      
        <div class="col-md-12">
 <!-- this is written for the alert box. The alert box will be displayed when user takes certain action -->
                @if (session('success'))
                <div class="flash-message col-md-12">
                    <div class="alert alert-success ">
                        {{session('success')}}
                    </div>
                </div>
                @endif
<!-- this is end for the alert box. The alert box will be displayed when user takes certain action -->
                
                <!-- Main content -->
                
                         <!-- this is written for table of what kind of submission information topic will be shown -->           
                        <div class="table-responsive">
                        <table class='table' style="margin-top:20px;margin-bottom:20px;">
                
                                <thead class="thead">
                                    <tr>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Name</th> 
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Faculty_Type</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Aticle</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Image</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Academic Year</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Submitted_date</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Comment</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Updated at</th>
                                        @foreach($closure as $final)
                                        @if($final->academic_id !== 0)

                                        <th class="bg-dark heading" style="color:white;text-align:center;">Action</th>
  
                                        @else
                                        @endif
                                        @endforeach
                                    </tr>
                                </thead>
                             <!-- this is end for table of what kind of submission information topic will be shown --> 

                             <!-- this is written for table of that the submission information will be shown -->
                                <tbody>
                
                                    @foreach ($submissions as $submission)
                                    <tr>
                                        <td style="text-align:center;">{{ $submission->user_name}}</td>
                                        <td style="text-align:center;">{{ $submission->faculty_type}}</td>
                                        <td style="text-align:center;">{{ $submission->article}}</td>
                                        <td style="text-align:center;"><img src="{{ $submission->image }}" class="rounded" width="50" /></td>
                                        <td style="text-align:center;">{{ $submission->s_academic_year}}-{{ $submission->e_academic_year}}</td>
                                        <td style="text-align:center;">{{ $submission->submission_date }}</td>
                                        <?php
                                                $parameter = $submission->id;
                                            $parameter= Crypt::encrypt($parameter);
                                        ?>
                                        
                                        <td style="text-align:center;"><a href="/submission/show/{{ $parameter }}" style="color:blue;text-decoration:underline;">View Comment</a></td>
                                        <td style="text-align:center;">{{ $submission->updated_at }}</td>
                                        @foreach($closure as $final)
                                        @if($final->academic_id !== 0)                  
                                        
                                        
                                        <td>
                                        <a onclick="return myFunction();" href="/submission/edit/{{ $parameter }}" class="btn btn-info">Update</a>
                                        </td>
                                        
                                        @else
                                        @endif
                                        @endforeach 

                                    </tr>
                                    @endforeach
                
                                </tbody>
                        <!-- this is end for table of that the submission information will be shown -->
                        </table>
                        </div>
                
                 
        </div>
    </div>
</div>
<!-- this is written to show the submission history of the student -->

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
</script>
        <!-- this is end for the alert box. The alert box will be displayed when user takes certain action -->

@include('layouts.frontend.footer')