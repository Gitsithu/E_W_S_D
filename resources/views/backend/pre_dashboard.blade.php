@include('layouts.partial.header')

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">All count </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">All</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Count</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row" style="margin-bottom: 30px; margin-top:30px;">
                </div>

                @if(Auth::user()->role_id == 1)

                

                <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-book"></i> &nbsp; &nbsp;<span style="color:blue;">Faculty</span></h5>
                                <div class="card-body">
                                    <h4><b>This System Currently have ' {{ $faculty_count }} ' Faculty</b></h4>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-address-book"></i> &nbsp; &nbsp;<span style="color:blue;">Total User</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $total_count }} ' User</b></h4>
                                </div>
                            </div>
                        </div>
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-user-secret"></i> &nbsp; &nbsp; <span style="color:blue;">Marketing Manager</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $user_count }} ' Manager</b></h4>
                                </div>
                            </div>
                            </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-user-secret"></i> &nbsp; &nbsp; <span style="color:blue;">Marketing Coordinator</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $user_counts }} ' Coordinator</b></h4>
                                </div>
                            </div>
                            </div>   
                 <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                 <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-user"></i> &nbsp; &nbsp; <span style="color:blue;">Student</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $user_countss }} ' Student</b></h4>
                                </div>
                            </div>
                            </div>   
                 <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                 <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-users"></i> &nbsp; &nbsp; <span style="color:blue;">Guest</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $user_countsss }} ' Guest</b></h4>
                                </div>
                            </div>
                            </div>          
                
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-file-alt"></i> &nbsp; &nbsp; <span style="color:blue;">Contribution</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $submission_count }} ' Contribution</b></h4>
                                </div>
                            </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-file-alt"></i> &nbsp; &nbsp; <span style="color:blue;">Selected Contribution</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $submission_counts }} ' Selected Contribution</b></h4>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                @elseif (Auth::user()->role_id == 2)
                <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-user-secret"></i> &nbsp; &nbsp; <span style="color:blue;">Marketing Coordinator</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $user_counts }} ' Coordinator</b></h4>
                                </div>
                            </div>
                            </div>   
                 <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                 <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-user"></i> &nbsp; &nbsp; <span style="color:blue;">Student</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $user_countss }} ' Student</b></h4>
                                </div>
                            </div>
                            </div>   
                 <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                 <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-file-alt"></i> &nbsp; &nbsp; <span style="color:blue;">Contribution</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $submission_count }} ' Contribution</b></h4>
                                </div>
                            </div>
                            </div> 
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-file-alt"></i> &nbsp; &nbsp; <span style="color:blue;">Selected Contribution</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $submission_counts }} ' Selected Contribution</b></h4>
                                </div>
                            </div>
                            </div>         
                </div>
                @else
                <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-file-alt"></i> &nbsp; &nbsp;<span style="color:blue;">Contribution</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $submission_count }} ' Contribution</b></h4>
                                </div>
                            </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);">
                                <h5 class="card-header"><i class="fas fa-file-alt"></i> &nbsp; &nbsp;<span style="color:blue;">Selected Contribution</span></h5>
                                <div class="card-body">
                                    <div id="sparkline6" class="icon-user"></div>
                                    <h4><b>This System Currently have ' {{ $submission_counts }} ' Selected Contribution</b></h4>
                                </div>
                            </div>
                </div>
                </div>
                </div>
                
                @endif
            
                <script>
function report_search_with_type() {
        var type = $("#faculty_id").val();
        var form_action = "/backend/dashboard/search/" + type;
        window.location = form_action;
    }
</script>



@include('layouts.partial.footer')
dashboard.txt
Displaying dashboard.txt.