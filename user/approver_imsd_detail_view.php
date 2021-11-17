<?php
include "../dbConnection.php";
session_start();
if (($_SESSION['username'] == "") && ($_SESSION['type']!='IMSD_APPROVER')){
  header("Location: ../admin");
  exit;
}

//include 'serviceRecordDetail_load_query.php';




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/AEP_icon.png" rel="icon">
    <title>Employee Leave Application</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet">



  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="icon" href="../img/dolelogogs.png">
  <script type="text/javascript" src = "../js/date_time.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../main">
                <div class="sidebar-brand-icon">
                    <img src="../assets/img/AEP_icon.png" alt="" width="35px" height="35px">
                </div>
                <div class="sidebar-brand-text mx-3">DOLEX-HRIS</div>
            </a>

            <!-- Divider -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MY DASHBOARD
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!--<li class="nav-item">
                <a class="nav-link collapsed" href="main" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw 	fas fa-home"></i>
                    <span>Return</span>
                </a>
            </li> -->

            <li class="nav-item active">
              <a class="nav-link" href="main">
                <i class="fas fa-fw fa-lg fa-check-square"></i>
                <span>Return</span>
              </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, User</span>
                                <img class="img-profile rounded-circle" src="assets/img/lglogo.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  <!--<form method="post" id="add_name">
                    <div >
                      <h4 class="modal-title">Add Details</h4>
                    </div>
                    <div >
                          <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" />
                          </div>
                          <div class="table-responsive">
                            <table class="table" id="dynamic_field">

                            </table>
                          </div>
                    </div>
                    <div >
                      <input type="hidden" name="hidden_id" id="hidden_id" />
                      <input type="hidden" name="empID" id="empID" value="<?php echo $_GET['id']; ?>">
                      <input type="hidden" name="action" id="action" value="add_leave" />
                      <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                    </div>
                  </form>-->



                    <!-- Content Row -->
                    <form method="post" id="add_name">
                      <div class="row">
                          <!-- Employee ID database-->
                          <input type="hidden" name="leaveID" id="leaveID" value="<?php echo $_GET['id']; ?>">
                          <input type="hidden" name="loginID" id="loginID" value="<?php echo $_SESSION['usernameid']; ?>">
                          <input type="hidden" name="action" id="action" value="add_leave" />
                          <!-- Pending Requests Card Example -->
                      </div>

                       <!-- Content Row -->

                      <div class="row">
                          <!-- Area Chart -->
                          <div class="col-xl-12 col-lg-7">
                              <div class="card shadow mb-4">
                              
                                  <!-- Card Header - Dropdown -->
                                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                      <h6 class="m-0 font-weight-bold text-primary">I. Personal Data</h6>
                                  </div>
                                  <!-- Card Body -->
                                  <div class="card-body">
                                      <div class="col-md-12">
                                      </div>
                                      <!-- Grid row -->
                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-4">
                                          <label for="inputAddress">Office</label>
                                          <input type="text" class="form-control" id="office" placeholder="Ex. CBTZ200116" disabled>
                                          </div>
                                          <div class="form-group col-md-4">
                                          <label for="inputAddress">Division</label>
                                          <input  type="text" class="form-control" id="division" placeholder="Ex. Labor Employment Officer I" disabled>
                                          </div>
                                          <div class="form-group col-md-4">
                                            <label for="inputAddress">Position</label>
                                            <input  type="text" class="form-control" id="position" placeholder="Ex. Labor Employment Officer I" disabled>
                                          </div>
                                      </div>
                                      <div class="form-row">
                                        <hr>
                                        
                                      </div>
                                      <!-- Grid row -->
                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-3">
                                          <label for="inputEmail4">First Name</label>
                                          <input type="text" name="firstname" id = "firstname"  placeholder="Ex. Enrico" class="form-control validate" disabled>
                                          </div>
                                          <div class="form-group col-md-3">
                                          <label for="inputEmail4">Middle Name</label>
                                          <input type="text" name="middlename" id = "middlename"  placeholder="Ex. Santos" class="form-control validate" disabled>
                                          </div>
                                          <div class="form-group col-md-3">
                                          <label for="inputEmail4">Last Name</label>
                                          <input type="text" name="lastname" id = "lastname"  placeholder="Ex. Cruz" class="form-control validate" disabled>
                                          </div>
                                          <div class="form-group col-md-1">
                                          <label for="inputEmail4">Extension</label>
                                          <input type="text" name="extension" id = "extension"  placeholder="Ex. Jr, II, III" class="form-control validate" disabled>
                                          </div>
                                        
                                      </div>
                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-3">
                                          <label for="inputEmail4">Date of Filing</label>
                                          <input type="date" name="dateoffilling" id = "dateoffilling"   value="<?php echo date("Y-m-d"); ?>" class="form-control validate" disabled>  
                                        </div>                                  
                                      </div>
                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-3">
                                          <label for="inputEmail4">Salary</label>
                                          <input type="text" name="salary" id = "salary" class="form-control validate" disabled>
                                          </div>                                  
                                      </div>
                                  </div>
                              </div>
                          </div>



                          <div class="col-xl-12 col-lg-7">
                              <div class="card shadow mb-4">
                                <span id="message"></span>
                                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                      <!--<h6 class="m-0 font-weight-bold text-primary">Service Record</h6> -->
                                    
                                      <!--<div>
                                        <button class="btn btn-info generateReport" name='generateReport' id= "generateReport" > Generate Excel File </button>
                                        <a data-toggle="modal" data-target="#modalServiceRecordForm" ><button class="btn btn-success"  > Add Service Record </button></a>
                                      
                                      </div> -->
                                  </div>

                                  <!-- Card Body -->
                                  <div class="card-body">


                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-4">
                                          <label for="inputAddress"><strong>Leave Type Application</strong></label>
                                          <select class="custom-select my-1 mr-sm-2" onchange="leaveChange();" id="leave_type" name="leave_type" disabled>
                                              <option value="NA" selected>Please Select</option>
                                              <option value="VACATION">VACATION LEAVE</option>
                                              <option value="FORCED">MANDATORY/FORCED LEAVE</option>
                                              <option value="SICK">SICK LEAVE</option>
                                              <option value="MATERNITY">MATERNITY LEAVE</option>
                                              <option value="SPECIALPRIVILEGE">SPECIAL PRIVILEGE LEAVE</option>
                                              <option value="SOLOPARENT">SOLO PARENT LEAVE</option>
                                              <option value="STUDY">STUDY LEAVE</option>
                                              <option value="VAWC">10-DAY VAWC LEAVE</option>
                                              <option value="REHAB">REHABILITATION PRIVILEGE</option>
                                              <option value="WOMEN">SPECIAL LEAVE BENEFITS FOR WOMEN</option>
                                              <option value="EMERGENCY">SPECIAL EMERGENCY (CALAMITY) LEAVE</option>
                                              <option value="ADOPTION">ADOPTION LEAVE</option>
                                              <option value="MONETIZATION">MONETIZATION OF LEAVE CREDITS</option>
                                              <option value="TERMINAL">TERMINAL LEAVE</option>
                                            <!-- <option disabled>_________</option>
                                              <option value="CTO">COMPENSATORY TIME-OFF</option>
                                              <option value="COMTO">COMPASSIONATE TIME-OFF</option>-->
                                          </select>

                                          </div>

                                      </div>

                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-4">
                                          <label for="inputAddress">Number of Working Days Applied for</label>
                                          <input type="text" class="form-control validate" name="workingdays" id="workingdays"  disabled>
                                          </div>


                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          <label for="inputAddress">Inclusive Dates</label>
                                            <input  type="text" class="form-control" id="inclusivedate"  disabled>
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                      <!--
                                        <div class="form-group col-md-4">
                                       
                                          <table class="table" id="dynamic_field">

                                          </table>
                                        </div>
                                        <div class="table-responsive">
                                          <table class="table" id="dynamic_field">

                                          </table>
                                        </div> -->
                                      </div>

                                      <!-- Grid row -->
                                      <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-10">
                                          <label for="inputCity"><strong>Details of Leave:</strong></label>

                                        </div>
                                      </div>
                                      <!--PART 1-->
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                            <label for="inputAddress">In case of Vacation/Special Privilege Leave:</label>
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="partone" id="partone1" value="PH" disabled>
                                            <label class="form-check-label" for="partone1">
                                              Within the Philippines
                                            </label> 
                                            <!--<input  type="text" class="form-control" id="partone1Details" disabled>-->
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="partone" id="partone2" value="ABROAD"  disabled>
                                            <label class="form-check-label" for="partone2">
                                              Abroad
                                            </label>
                                            <!--<input type="text" class="form-control" id="partone2Details"  disabled>-->
                                          </div>
                                          </div> 

                                      </div>

                                      <!--PART 2-->
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                            <label for="inputAddress">In case of Sick Leave:</label>
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="parttwo" id="parttwo1" value = "IPD" disabled>
                                            <label class="form-check-label" for="parttwo1">
                                              In Hospital 
                                            </label> 
                                            <!--<input  type="text" class="form-control" id="parttwo1details" disabled > -->
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="parttwo" id="parttwo2"  value = "OPD" disabled>
                                            <label class="form-check-label" for="parttwo2">
                                              Out Patient 
                                            </label>
                                            <!--<input  type="text" class="form-control" id="parttwo2details" disabled>-->
                                          </div>
                                          </div> 
                                      </div>

                                      <!--PART 3-->
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                            <label for="inputAddress">In case of Special Leave Benefits for Women:</label>
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          <div class="form-check">
                                            
                                            <input  type="text" class="form-control" id="partthree" disabled>
                                          </div>
                                    
                                          </div> 
                                      </div>


                                      <!--PART 4-->
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                            <label for="inputAddress">In case of Study Leave:</label>
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="partfour" id="partfour1" value="MASTERS" disabled>
                                            <label class="form-check-label" for="partfour1">
                                              Completion of Master's Degree
                                            </label> 
                                          
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="partfour" id="partfour2" value="EXAM" disabled>
                                            <label class="form-check-label" for="partfour2">
                                              BAR/Board Examination Review
                                            </label>
                                          
                                          </div>
                                          </div> 
                                      </div>

                                      <!--PART 5-->
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                            <label for="inputAddress">Other Purpose:</label>
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="partfive" id="partfive1" value="MONETIZATION" disabled>
                                            <label class="form-check-label" for="partfive1">
                                              Monetization of Leave Credits
                                            </label> 
                                          
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="partfive" id="partfive2"  value="TERMINAL"  disabled>
                                            <label class="form-check-label" for="partfive2">
                                              Terminal Leave
                                            </label>
                                          
                                          </div>
                                          </div> 
                                      </div>


                                      <!--PART 6-->
                                      <div class="form-row">
                                        <div class="form-group col-md-4">
                                        </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                            <label for="inputAddress">Commutation:</label>
                                          </div> 
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="partsix" id="partsix1" value="NOTREQUESTED" disabled>
                                            <label class="form-check-label" for="partsix1">
                                              Not Requested
                                            </label> 
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="partsix" id="partsix2" value="REQUESTED" disabled>
                                            <label class="form-check-label" for="partsix2">
                                              Requested
                                            </label>
                                          </div>
                                          </div> 
                                      </div>

                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-10">
                                          <label for="inputEmail4">Google Drive Link Attachment</label>
                                          <input type="text" name="attachment" id = "attachment" class="form-control validate" disabled>
                                          </div>                                  
                                      </div>

                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-10">
                                          <label for="inputAddress">Applicant Remarks</label>
                                          <textarea class="form-control"  id="applicantremarks" name="applicantremarks" rows="4" cols="100" disabled> </textarea>
                                      
                                          </div>
                                      </div>


                                  </div>
                              </div>
                          </div>

                      </div>

                      <div class="row">
                        <div class="col-xl-12 col-lg-12">
                              <div class="card shadow mb-12">
                                <span id="message"></span>
                                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                         <!-- Card Header - Dropdown -->
                                    <h6 class="m-0 font-weight-bold text-primary">III. Approver Remarks</h6>
                                 
                                  </div>

                                  <!-- Card Body -->
                                  <div class="card-body">
                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-10">
                                          <label for="inputAddress">Head of Office/Division Chief remarks</label>
                                          <textarea class="form-control"  id="chiefremarks" name="chiefremarks" rows="4" cols="100" disabled> </textarea>
                                      
                                          </div>
                                      </div>

                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-10">
                                          <label for="inputAddress">IMSD Chief remarks</label>
                                          <textarea class="form-control"  id="imsdremarks" name="imsdremarks" rows="4" cols="100" > </textarea>
                                      
                                          </div>
                                      </div>

                                      <div class="form-row">
                                          <!-- Default input -->
                                          <div class="form-group col-md-10">
                                          <label for="inputAddress">Regional Director remarks</label>
                                          <textarea class="form-control"  id="rdremarks" name="rdremarks" rows="4" cols="100" disabled> </textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>
                      
                      <br>

                      <div class="row">

                          <div class="col-xl-12 col-lg-7">
                              <div class="card shadow mb-6">

                                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                         <!-- Card Header - Dropdown -->
                                    <h6 class="m-0 font-weight-bold text-primary">IV. Leave Balance</h6>
                                 
                                  </div>

                             <!-- Card Body -->
                             <div class="card-body">
                                      <div class="form-group row">
                                        <label for="inputEmail3" class="col-lg-2 col-form-label">Vacation Leave Credits</label>
                                        <div class="col-sm-2">
                                          <input type="text" class="form-control" id="vlcredit" disabled>
                                         
                                        </div>
                                        <label for="inputEmail3" class="col-lg-2 col-form-label">Less this application</label>
                                          <div class="col-sm-2">
                                            <input type="text" class="form-control" id="vlless" disabled>
                                          </div>

                                          <label for="inputEmail3" class="col-lg-2 col-form-label">Balance</label>
                                          <div class="col-sm-2">
                                            <input type="text" class="form-control" id="vlbalance" disabled>
                                          </div>

                                      </div>
                                      <div class="form-group row">
                                        <label for="inputEmail3" class="col-lg-2 col-form-label">Sick Leave Credits</label>
                                        <div class="col-sm-2">
                                          <input type="text" class="form-control" id="slcredit" disabled>
                                         
                                        </div>
                                        <label for="inputEmail3" class="col-lg-2 col-form-label">Less this application</label>
                                          <div class="col-sm-2">
                                            <input type="text" class="form-control" id="slless" disabled>
                                          </div>

                                          <label for="inputEmail3" class="col-lg-2 col-form-label">Balance</label>
                                          <div class="col-sm-2">
                                            <input type="text" class="form-control" id="slbalance" disabled>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          
                      </div>

                      <br>
                      <div class="row">

                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-6">
                              <!--
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                      
                                  <h6 class="m-0 font-weight-bold text-primary">IV. Leave History</h6>
                              
                                </div>

                            
                                <div class="card-body">
                                <div class="card-body">
                                          <div class="table-responsive">
                                              <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="leavehistory_data" width="100%" cellspacing="0">
                                                  <thead class = "text-primary">
                                                      <tr>
                                                          <th data-column-id="work_date_from">DATE FROM</th>
                                                          <th data-column-id="work_date_to">DATE TO</th>
                                                          <th data-column-id="work_positon">POSTION</th>
                                                          <th data-column-id="work_company">COMPANY</th>
                                                          <th data-column-id="work_salary">MONTHLY SALARY</th>
                                                          <th data-column-id="work_salary_grade">SALARY GRADE (If Applicable)</th>
                                                          <th data-column-id="work_appointment_status">STATUS OF APPOINTMENT</th>
                                                          <th data-column-id="work_govt">GOV'T SERVICE</th>
                                                          <th >ACTION</th>
                                                      </tr>
                                                  </thead>
                                                  <tfoot class = "text-primary">
                                                      <tr>
                                                          <th >DATE FROM</th>
                                                          <th >DATE TO</th>
                                                          <th >POSTION</th>
                                                          <th >COMPANY</th>
                                                          <th >MONTHLY SALARY</th>
                                                          <th >SALARY GRADE (If Applicable)</th>
                                                          <th >STATUS OF APPOINTMENT</th>
                                                          <th >GOV'T SERVICE</th>
                                                          <th >ACTION</th>
                                                      </tr>
                                                  </tfoot>
                                              </table>
                                          </div>
                                  </div>
                                </div>-->
                            </div>
                        </div>
                      </div>


                   
                  <br>


                      <!-- UPDATE OR CANCEL SECTION -->
                      <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                          
                        
                          <!--<input type="hidden" name="hidden_id" id="hidden_id" />
                          <input type="hidden" name="empID" id="empID" value="<?php echo $_GET['id']; ?>">
                          <input type="hidden" name="action" id="action" value="add_leave" />
                          <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />-->
                        <!-- Card Body -->    
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="hidden" name="leaveID" id="leaveID" value="<?php echo $_GET['id']; ?>">
                        <input type="hidden" name="action" id="action" value="add_leave" />                 
                            <div class="col-md-12">
                              <table class=" table">  
                                    <tr>
                                        <td style="width: 100%;"  colspan="2" style = "align: left"><button  type="button" name="submit" style="width: 100%;" class="btn btn-success" id = "submit_approve_leave" >     Approve  </button></td>    
                                                                                    
                                    </tr>
                                    <tr>
                                        <td style="width: 100%;"  colspan="2" style = "align: left"><button  type="button" name="submit" style="width: 100%;" class="btn btn-danger" id = "submit_reject_leave" >     Reject  </button></td>                                               
                                    </tr> 
                                    <tr>
                                  
                                        <td style="width: 100%;"  colspan="2" style = "align: left"><button type="button" value="cancel"  style="width: 100%;" class="btn btn-info">     Close  </button></td>                                               
                                    </tr>  
                              </table> 
                            </div>                        
                        </div>
                      </div> <!-- END UPDATE OF CANCEL SECTION -->
                    </form> <!-- END FORM-->
                </div>
                <!-- /.container-fluid -->
              </div>
          </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!--<a class="btn btn-primary" href="logout.php">Logout</a> -->
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="../logout">Logout</a> 
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    
    <!--JS FOR EMPLOYEE ACTIONS -->
    <script type="text/javascript" src="approver_imsd_detail_view.js"></script>

    

</body>


</html>