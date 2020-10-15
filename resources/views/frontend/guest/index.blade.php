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



<!-- this is written to show the selected submission history of the student -->
<section class="hero-wrap hero-wrap-2 js-fullheight" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="guest">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Selected Report <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Selected Report</h1>
        </div>
      </div>
    </div>
  </section>
<!-- this is end to show the selected submission history of the student -->

<!-- this is wriiten to show data with pie chart -->

<div id="chartContainer" style="height: 370px; width: 100%;">
<?php

$dataPoints = array( 
    array("label"=>"Contributions per faculty", "y"=> $contribution_counts),
    array("label"=>"student count  per faculty ", "y"=> $contribution_countss),
	
)
 
?>
</div>
<!-- this is end to show data with pie chart -->

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
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Academic Year</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Faculty</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Article</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Image</th>
                                        <th class="bg-dark heading" style="color:white;text-align:center;">Comment</th>
                                        
                                    </tr>
                                </thead>
                    <!-- this is written for table of what kind of submission information topic will be shown -->  

                     <!-- this is written for table of that the submission information will be shown -->
                                <tbody>
                
                                    @foreach ($guests as $guest)
                                    <tr>
                                        <td style="text-align:center;">{{ $guest->user_name}}</td>
                                        <td style="text-align:center;">{{ $guest->s_academic_year}}-{{ $guest->e_academic_year}}</td>
                                        <td style="text-align:center;">{{ $guest->faculty_type}}</td>
                                        <td style="text-align:center;">{{ $guest->article}}</td>
                                        <td style="text-align:center;"><img src="{{ $guest->image }}" class="rounded" width="50" /></td>
                                        <?php
                                                $parameter = $guest->id;
                                            $parameter= Crypt::encrypt($parameter);
                                        ?>
                                        <td style="text-align:center;"><a href="/guest/show/{{ $parameter }}" style="color:blue;text-decoration:underline;">View Comment</a></td>      
                
                                                         
                
                                    </tr>
                                    @endforeach
                
                                </tbody>
                     <!-- this is written for table of that the submission information will be shown -->

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

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Report Chart"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"%\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


}
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@include('layouts.frontend.footer')


