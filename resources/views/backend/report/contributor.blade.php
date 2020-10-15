
@include('layouts.partial.header')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->

                 <!-- this is written for the header of the contributor direction home page -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Report List</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Report</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- this is written for the header of the contributor direction home page -->

                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->

<!-- this is written for alert the message box when user take action -->
@if (count($errors) > 0)
<div class="content mt-3"><!-- div class=row content start -->
    <div class="animated fadeIn"><!-- div class=FadeIn start -->
        <div class="card"><!-- card start -->
    
            <div class="card-body">  <!-- card-body start -->

                
                    <div class="row"><!-- div class=row One start -->
                        @foreach ($errors->all() as $error)
                            <div class="col-md-12"><!-- div class=col 12 One start -->
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

<div class="content mt-3">
<!-- this is written to show the contributors -->
    <div class="animated fadeIn">
            <div class="card"><!-- .card start -->
                <div class="card-header">
                    <div class="col-md-12">
                        <strong class="card-title">Contributors Report</strong>
                    </div>
                </div>

               
            </div><!-- .card end -->
            <!-- this is wriiten for chart report -->
            <div class="row" style="margin-bottom: 30px; margin-top:30px;">
                    <div id="chartContainer" style="height: 370px; width: 100%;">
                    <?php
                    
                    
                    foreach($registrations_count_raw as $registrations_count)
                    
                    {
                    $dataPoints [] =array("y" => $registrations_count->counting, "label" => $registrations_count->faculty_type );
                 
                    }
                    ?>
                    </div>
                </div>



            <div class="card"><!-- .card start -->
                <div class="card-header">
                    <div class="col-md-12">
                        <strong class="card-title">Result</strong>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row"><!-- .row start -->

                    <!-- this is written for table of what kind of contributor topic information will be shown -->
                        <div class="col-md-12">
                        <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                     <tr>
                                        <th>Student-Name</th>
                                        <th>Faculty-Name</th>
                                        <th>Academic_Year</th>
                                        <th>Article</th>
                                        <th>Images</th>
                                        <th>Submitted at</th>
                                        <th>Updated at</th>
                                    </tr>
                                </thead>
                    <!-- this is end for table of what kind of contributor information will be shown -->

                    <!-- this is written for table of what kind of contributor information will be shown -->
                                <tbody>

                                    @foreach ($registrations as $registration)
                                    <tr>
                                        <td>{{ $registration->user_name }}</td>
                                        <td>{{ $registration->faculty_type }}</td>
                                        <td>{{ $registration->s_academic_year }}-{{ $registration->e_academic_year }}</td>
                                        <td>{{ $registration->article }}</td>
                                        <td><img src="{{ $registration->image }}" class="rounded" width="50" /></td>
                                        <td>{{ $registration->submission_date }}</td>
                                        <td>{{ $registration->update_date }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                    <!-- this is written for table of what kind of contributor information will be shown -->
                    
                                <tfoot>
                                        <th>Student-Name</th>
                                        <th>Faculty-Name</th>
                                        <th>Academic_Year</th>
                                        <th>Article</th>
                                        <th>Images</th>
                                        <th>Submitted at</th>
                                        <th>Updated at</th>
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- .row end -->

                </div><!-- .card end -->
            
            
        </div><!-- .animated -->
    </div>
    </div><!-- .content -->
<!-- this is end to show the contributors-->

<!-- this is end to show the contributions -->

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Statistics Report"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## student ",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
        
        
	}]
});
chart.render();
 
}
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- this is written for alert the message box when user take action -->


<!-- this is written for alert the message box when user take action -->
<script>
    function report_search_1_with_type() {
        var type = $("#user_id").val();
        var form_action = "/backend/report/search_1/" + type;
        window.location = form_action;
    }
   
   </script>
<!-- this is end for alert the message box when user take action -->

@include('layouts.partial.footer')
