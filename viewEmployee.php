<?php
include "dbConnection.php";
session_start();
if ($_SESSION['username'] == ""){
  header("Location: admin");
  exit;
}

include 'view_employee_load_query.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/img/AEP_icon.png" rel="icon">
  <title>Employee Details</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet">



  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="icon" href="img/dolelogogs.png">
  <script type="text/javascript" src="js/date_time.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main">
        <div class="sidebar-brand-icon">
          <img src="assets/img/AEP_icon.png" alt="" width="35px" height="35px">
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN</div>
      </a>

      <!-- Divider -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        MY DASHBOARD
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="main" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw 	fas fa-home"></i>
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
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                      aria-label="Search" aria-describedby="basic-addon2">
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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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

          <!-- Page Heading -->


          <!-- Content Row -->
          <div class="row">
            <!-- Employee ID database-->
            <input type="hidden" name="empID" id="empID" value="<?php echo $_GET['id']; ?>">



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
                  <button class="btn btn-info update_personal_details" name='update_personal_details' > Update Personal Details </button>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="col-md-12">
                  </div>
                  <!-- data-target="#modalEditPersonalDetailsForm"<div class="col-md-12">
      
                      
                                      </div> -->

                  <!--<div class="form-group">
                                          <label for="inputAddress">Employee ID</label>
                                          <input style="width: 25%;" type="text" class="form-control" id="employeeid" placeholder="Ex. CBTZ200116">
                                          <label for="inputAddress">Position</label>
                                          <input style="width: 25%;" type="text" class="form-control" id="position" placeholder="Ex. Labor Employment Officer I">
                                          <label for="inputAddress">Date Hired</label>
                                          <input style="width: 25%;" type="date" class="form-control" id="datehired" >
                                          
                                      </div> -->

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-4">
                      <label for="inputAddress">Employee ID</label>
                      <input type="text" class="form-control" id="employeeid" placeholder="Ex. CBTZ200116" disabled>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputAddress">Position</label>
                      <input type="text" class="form-control" id="position"
                        placeholder="Ex. Labor Employment Officer I" disabled>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputAddress">Date Hired</label>
                      <input type="date" class="form-control" id="datehired" disabled>
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
                      <input type="text" name="firstname" id="firstname" placeholder="Ex. Enrico"
                        class="form-control validate"  disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Middle Name</label>
                      <input type="text" name="middlename" id="middlename" placeholder="Ex. Santos"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Last Name</label>
                      <input type="text" name="lastname" id="lastname" placeholder="Ex. Cruz"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-1">
                      <label for="inputEmail4">Extension</label>
                      <input type="text" name="extension" id="extension" placeholder="Ex. Jr, II, III"
                        class="form-control validate" disabled>
                    </div>

                  </div>
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">User Name</label>
                      <input type="text" name="username" id="username" placeholder="Ex. CBTZ200116"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Password</label>
                      <input type="password" name="password" id="password" placeholder="Please provide password"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Confirm Password</label>
                      <input type="password" name="confirmpassword" id="confirmpassword"
                        placeholder="Please provide password" class="form-control validate" disabled>
                    </div>
                  </div>
                  <!-- Grid row -->
                  <div class="form-row">
                    <input type="hidden" name="profileid" id="profileid">
                    <!-- Default input -->
                    <div class="form-group col-md-2">

                      <label for="inputCity">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" disabled>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-8">
                      <label for="inputZip">Place of Birth</label>
                      <input type="text" class="form-control" name="placeofbirth" id="placeofbirth"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                  </div>
                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputCity">Gender</label>
                      <select class="custom-select my-1 mr-sm-2" id="gender" name="gender" disabled>
                        <option value='NA' selected>Choose...</option>
                        <option value="MALE">Male</option>
                        <option value="FEMALE">Female</option>

                      </select>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputZip">Civil Status</label>
                      <select class="custom-select my-1 mr-sm-2" id="civilstatus" name="civilstatus" disabled>
                        <option value="NA" selected>Choose...</option>
                        <option value="SINGLE">Single</option>
                        <option value="MARRIED">Married</option>
                        <option value="WIDOWED">Widowed</option>
                        <option value="SEPARATED">Separated</option>
                        <option value="OTHERS">Others</option>

                      </select>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-1">
                      <label for="inputZip">Weight (Kg)</label>
                      <input type="text" class="form-control" id="weight" name="weight" disabled >
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputZip">Height (cm)</label>
                      <input type="text" class="form-control" id="height" name="height" disabled>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-1">
                      <label for="inputZip">Blood Type</label>
                      <input type="text" class="form-control" id="bloodtype" name="bloodtype" disabled>
                    </div>
                  </div>
                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputCity">GSIS ID No.</label>
                      <input type="text" class="form-control" id="gsisno" name="gsisno" disabled>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputZip">Pagibig No.</label>
                      <input type="text" class="form-control" id="pagibigno" name="pagibigno"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputZip">Philhealth No.</label>
                      <input type="text" class="form-control" id="phicno" name="phicno"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputZip">SSS No.</label>
                      <input type="text" class="form-control" id="sssno" name="sssno"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputZip">TIN No.</label>
                      <input type="text" class="form-control" id="tinno" name="tinno"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputZip">Agency Employee No.</label>
                      <input type="text" class="form-control" id="agencyemployeeno" name="agencyemployeeno"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                  </div>
                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputCity">Citizenship</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="citizenship" id="filipino" value="filipino"
                          checked disabled>
                        <label class="form-check-label" for="citizenship1">
                          Filipino
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="citizenship" id="dual" value="dual" disabled>
                        <label class="form-check-label" for="citizenship2">
                          Dual Citizenship
                        </label>
                      </div>
                    </div>

                    <div class="form-group col-md-2">
                      <label for="inputCity"></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="dualchoice" id="birth" value="birth" checked disabled>
                        <label class="form-check-label" for="gridRadios1">
                          By Birth
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="dualchoice" id="naturalization"
                          value="naturalization" disabled>
                        <label class="form-check-label" for="gridRadios2">
                          By Naturalization
                        </label>
                      </div> <br>
                      <!-- <div class="form-group col-md-10">
                                                  <label for="inputZip">Please Indicate Country</label>
                                                  <input type="text" class="form-control" id="dualcountry" placeholder="Ex. China">
                                              </div> -->
                    </div>

                  </div>


                  <!-- Grid row -->
                  <div class="form-row">

                    <!-- Default input -->
                    <div class="form-group col-md-10">
                      <label for="inputCity">Residential Address</label>
                      <input type="text" class="form-control" id="residentialaddress" disabled>
                    </div>
                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-10">
                      <label for="inputCity">Permanent Address</label><br>
                      <input type="text" class="form-control" id="permanentaddress" disabled>
                    </div>
                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputCity">Telephone No.</label><br>
                      <input type="text" class="form-control" id="telephoneno" name="telephoneno"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Mobile No.</label>
                      <input type="text" class="form-control" id="mobileno" name="mobileno"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Email Address</label>
                      <input type="text" class="form-control" id="emailprofile" name="emailprofile"
                        placeholder="Ex. 1234 Main Street" disabled>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">II. Family Background</h6>
                  <button class="btn btn-info update_family_background" class="update_family_background"> Update Family Background </button>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="col-md-12">
                  </div>
                  <!-- <div class="col-md-12">                  
                                      </div> -->

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-3">
                      <input type="hidden" name="familyid" id="familyid">
                      <label for="inputEmail4">Spouse's Surname</label>
                      <input type="text" name="spouselastname" id="spouselastname" placeholder="Ex. Cruz"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" name="spousefirstname" id="spousefirstname" placeholder="Ex. Enrico"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Middle Name</label>
                      <input type="text" name="spousemiddlename" id="spousemiddlename" placeholder="Ex. Santos"
                        class="form-control validate" disabled>
                    </div>

                    <div class="form-group col-md-1">
                      <label for="inputEmail4">Extension</label>
                      <input type="text" name="spouseextension" id="spouseextension" placeholder="Ex. Jr, II, III"
                        class="form-control validate" disabled>
                    </div>

                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-10">
                      <label for="inputCity">Occupation</label>
                      <input type="text" class="form-control" id="occupation" disabled>
                    </div>

                  </div>
                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-10">
                      <label for="inputCity">Employer/Business Name</label>
                      <input type="text" class="form-control" id="employername" disabled>
                    </div>

                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-10">
                      <label for="inputCity">Business Address</label>
                      <input type="text" class="form-control" id="businessaddress" disabled >
                    </div>

                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputCity">Telephone No.</label>
                      <input type="text" class="form-control" id="spousetelno" disabled>
                    </div>

                  </div>


                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Father's Surname</label>
                      <input type="text" name="fathersurname" id="fathersurname" placeholder="Ex. Cruz"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" name="fatherfirstname" id="fatherfirstname" placeholder="Ex. Enrico"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Middle Name</label>
                      <input type="text" name="fathermiddlename" id="fathermiddlename" placeholder="Ex. Santos"
                        class="form-control validate" disabled>
                    </div>

                    <div class="form-group col-md-1">
                      <label for="inputEmail4">Extension</label>
                      <input type="text" name="fatherext" id="fatherext" placeholder="Ex. Jr, II, III"
                        class="form-control validate" disabled>
                    </div>

                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Mother's Maiden Name</label>
                      <input type="text" name="mothermaidenname" id="mothermaidenname" placeholder="Ex. Cruz"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Mother's Surname</label>
                      <input type="text" name="mothersurname" id="mothersurname" placeholder="Ex. Cruz"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" name="motherfirstname" id="motherfirstname" placeholder="Ex. Enrico"
                        class="form-control validate" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Middle Name</label>
                      <input type="text" name="mothermiddlename" id="mothermiddlename" placeholder="Ex. Santos"
                        class="form-control validate" disabled>
                    </div>



                  </div>
                </div>
              </div>
            </div>
            <!-- END OF FAMILY BACKGROUND FORM -->

            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Additional Details</h6>

                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                      aria-controls="home" aria-selected="true">Children (if Applicable)</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="educ-tab" data-toggle="tab" href="#eductab" role="tab"
                      aria-controls="profile" aria-selected="false">Educational Background</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="civil-tab" data-toggle="tab" href="#civiltab" role="tab"
                      aria-controls="contact" aria-selected="false">Civil Service Eligibility</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="work-tab" data-toggle="tab" href="#worktab" role="tab"
                      aria-controls="contact" aria-selected="false">Work Experience</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="voluntary-tab" data-toggle="tab" href="#volworktab" role="tab"
                      aria-controls="contact" aria-selected="false">Voluntary Work</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="landd-tab" data-toggle="tab" href="#landdtab" role="tab"
                      aria-controls="contact" aria-selected="false">Learning and Development</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="others-tab" data-toggle="tab" href="#otherstab" role="tab"
                      aria-controls="contact" aria-selected="false">Other Information</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container-fluid">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary"></h6>

                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalChildrenForm"
                            aria-expanded="false">Add Children</button>

                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables"
                              id="children_data" width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="fullName">FULL NAME</th>
                                  <th data-column-id="dob">DATE OF BIRTH</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>FULL NAME</th>
                                  <th>DATE OF BIRTH</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>

                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="tab-pane fade" id="eductab" role="tabpanel" aria-labelledby="educ-tab">
                    <div class="container-fluid">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary"></h6>

                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEducationForm"
                            aria-expanded="false"> Add Educational Background</button>

                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="educ_data"
                              width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="educ_level">LEVEL</th>
                                  <th data-column-id="school_name">NAME OF SCHOOL</th>
                                  <th data-column-id="basic_educ">BASIC EDUCATION/DEGREE/COURSE</th>
                                  <th data-column-id="period_from">ATTENDED FROM</th>
                                  <th data-column-id="period_to">ATTENDED UNTIL</th>
                                  <th data-column-id="highest_level">HIGHEST LEVEL/UNITS EARNED</th>
                                  <th data-column-id="year_grad">YEAR GRADUATED</th>
                                  <th data-column-id="honor_received">ACADEMIC HONORS RECEIVED</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>LEVEL</th>
                                  <th>NAME OF SCHOOL</th>
                                  <th>BASIC EDUCATION/DEGREE/COURSE</th>
                                  <th>ATTEND FROM</th>
                                  <th>ATTENDED UNTIL</th>
                                  <th>HIGHEST LEVEL/UNITS EARNED</th>
                                  <th>YEAR GRADUATED</th>
                                  <th>ACADEMIC HONORS RECEIVED</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>

                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="civiltab" role="tabpanel" aria-labelledby="civil-tab">
                    <div class="container-fluid">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary"></h6>

                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEligibilityForm"
                            aria-expanded="false"> Add Eligibility</button>

                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="civil_data"
                              width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="eligibility">ELIGIBILITY</th>
                                  <th data-column-id="rating">RATING</th>
                                  <th data-column-id="date_of_exam">DATE OF EXAM</th>
                                  <th data-column-id="place_of_exam">PLACE OF EXAM</th>
                                  <th data-column-id="license_no">LICENSE NUMBER</th>
                                  <th data-column-id="license_date">LICENSE DATE OF VALIDITY</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>ELIGIBILITY</th>
                                  <th>RATING</th>
                                  <th>DATE OF EXAM</th>
                                  <th>PLACE OF EXAM</th>
                                  <th>LICENSE NUMBER</th>
                                  <th>LICENSE DATE OF VALIDITY</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <!-- WORK TAB-->
                  <div class="tab-pane fade" id="worktab" role="tabpanel" aria-labelledby="work-tab">
                    <div class="container-fluid">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary"></h6>

                          <button class="btn btn-success btn-sm" data-toggle="modal" data-toggle="modal"
                            data-target="#modalWorkForm" aria-expanded="false"> Add Work Experience</button>

                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="work_data"
                              width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="work_date_from">DATE FROM</th>
                                  <th data-column-id="work_date_to">DATE TO</th>
                                  <th data-column-id="work_positon">POSTION</th>
                                  <th data-column-id="work_company">COMPANY</th>
                                  <th data-column-id="work_salary">MONTHLY SALARY</th>
                                  <th data-column-id="work_salary_grade">SALARY GRADE (If Applicable)</th>
                                  <th data-column-id="work_appointment_status">STATUS OF APPOINTMENT</th>
                                  <th data-column-id="work_govt">GOV'T SERVICE</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>DATE FROM</th>
                                  <th>DATE TO</th>
                                  <th>POSTION</th>
                                  <th>COMPANY</th>
                                  <th>MONTHLY SALARY</th>
                                  <th>SALARY GRADE (If Applicable)</th>
                                  <th>STATUS OF APPOINTMENT</th>
                                  <th>GOV'T SERVICE</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--END OF WORK TAB -->


                  <!-- VOLUNTARY WORK TAB-->
                  <div class="tab-pane fade" id="volworktab" role="tabpanel" aria-labelledby="work-tab">
                    <div class="container-fluid">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary"></h6>

                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalVolWorkForm"
                            aria-expanded="false">Add Voluntary work</button>

                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="volwork_data"
                              width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="volwork_organization">COMPANY</th>
                                  <th data-column-id="volwork_date_from">DATE FROM</th>
                                  <th data-column-id="volwork_date_to">DATE TO</th>
                                  <th data-column-id="volwork_nohours">NUMBER OF HOURS</th>
                                  <th data-column-id="volwork_positon">POSTION</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>COMPANY</th>
                                  <th>DATE FROM</th>
                                  <th>DATE TO</th>
                                  <th>NUMBER OF HOURS</th>
                                  <th>POSTION</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!--END OFVOLUNTARY WORK TAB -->


                  <!-- LEARNING AND DEVELOPMENT TAB-->
                  <div class="tab-pane fade" id="landdtab" role="tabpanel" aria-labelledby="work-tab">
                    <div class="container-fluid">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary"></h6>
                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalLanddForm"> Add
                            Learning and Development </button>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="landd_data"
                              width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="landd_program">COMPANY</th>
                                  <th data-column-id="landd_date_from">DATE FROM</th>
                                  <th data-column-id="landd_date_to">DATE TO</th>
                                  <th data-column-id="landd_nohours">NUMBER OF HOURS</th>
                                  <th data-column-id="landd_type">TYPE</th>
                                  <th data-column-id="landd_type">SPONSORED BY</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>COMPANY</th>
                                  <th>DATE FROM</th>
                                  <th>DATE TO</th>
                                  <th>NUMBER OF HOURS</th>
                                  <th>TYPE</th>
                                  <th>SPONSORED BY</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!--END OF LEARNING AND DEVELOPMENT TAB -->

                  <!-- OTHERS TAB-->
                  <div class="tab-pane fade" id="otherstab" role="tabpanel" aria-labelledby="work-tab">
                    <div class="container-fluid">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary"></h6>
                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>
                        <div class="card-body">
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#otherSkillForm">Add
                              Skill or Hobby</button>
                          </div>
                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#otherSkillForm" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Add Skill or Hobby</a>-->
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables"
                              id="other_skill_data" width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="other_special_skill">SPECIAL SKILLS/HOBBIES</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>SPECIAL SKILLS/HOBBIES</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6><button class="btn btn-success btn-sm"
                              data-toggle="modal" data-target="#otherRecognitionForm"> Add Recognition</button>
                          </div>
                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#otherRecognitionForm" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Add Recognition</a>-->
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables"
                              id="other_recognition_data" width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="other_recognition">NON-ACADEMIC RECOGNITIONS</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>RECOGNITIONS</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6><button class="btn btn-success btn-sm"
                              data-toggle="modal" data-target="#otherMembershipForm"> Add Membership in
                              Organization</button>
                          </div>
                          <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#otherMembershipForm" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-1"></i> Add Membership in Organization</a>-->
                          <div class="table-responsive">
                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables"
                              id="other_membership_data" width="100%" cellspacing="0">
                              <thead class="text-primary">
                                <tr>
                                  <th data-column-id="other_membership">MEMBERSHIP IN ORGANIZATION</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tfoot class="text-primary">
                                <tr>
                                  <th>MEMBERSHIP</th>
                                  <th>ACTION</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!--END OF OTHERS TAB -->


                </div>
              </div>
              <!-- END OF TAB CONTENT -->
            </div>
          </div>




          <!-- UPDATE OR CANCEL SECTION -->

          <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Body -->
              <div class="col-md-12">

                <table class=" table">
                  <!--<tr>
                                                  <td style="width: 100%;" colspan="2" style = "align: center"><button  style="width: 100%;" class="btn btn-primary" id = "update_employee">     Update Employee Details  </button></td> 
                                                                                        
                                              </tr>  -->
                  <tr>

                    <td style="width: 100%;" colspan="2" style="align: left"><button style="width: 100%;"
                        class="btn btn-primary" id="cancel_employee"> Close </button></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>



      </div>
      <!-- /.container-fluid -->
    </div>
  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2020</span>
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

  <!-- Modal -->



  <!-- ADD CHILDREN FORM -->
  <div class="modal fade" id="modalChildrenForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Children</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">


          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form34">Full name</label>
            <input type="text" name="fullname" id="fullname" class="form-control validate" required>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Date of Birth</label>
            <input type="date" name="dob_add" id="dob_add" class="form-control validate" required>

          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">

          <button class="btn btn-primary" id="add_children">Add data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- EDIT CHILDREN FORM -->
  <div class="modal fade" id="modalEditChildrenForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Update Children Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">


          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form34">Full name</label>
            <input type="text" name="fullname_update" id="fullname_update" class="form-control validate" required>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Date of Birth</label>
            <input type="date" name="dob_update" id="dob_update" class="form-control validate" required>

          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <input type="hidden" name="hidden_id" id="hidden_id" />
          <button class="btn btn-primary" id="submit_update_children">Update data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>



  <!-- UPDATE EDUC FORM -->
  <div class="modal fade" id="modalEditEducationForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Update Educational Background</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">


          <div class="md-form mb-5">
            <input type="hidden" name="educid" id="educid" class="form-control validate" required>
            <!--<label data-error="wrong" data-success="right" for="form34">Level</label>
                <input type="text" name="level_update" id = "level_update" class="form-control validate" required>-->

            <label for="inputZip">Level</label>
            <select class="custom-select my-1 mr-sm-2" id="level_update" name="level_update">
              <option value="NA" selected>Choose...</option>
              <option value="ELEM">ELEMENTARY</option>
              <option value="SEC">SECONDARY</option>
              <option value="VOC">VOCATIONAL/TRADE COURSE</option>
              <option value="COLLEGE">COLLEGE</option>
              <option value="GRADSTUD">GRADUATE STUDIES</option>

            </select>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Name of School (Write in full)</label>
            <input type="text" name="school_name_update" id="school_name_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Basic Education/Degree/Course</label>
            <input type="text" name="educ_update" id="educ_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Period from (YYYY) </label>
            <input type="number" min="1900" max="2099" step="1" value="2016" name="attended_from_update"
              id="attended_from_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Period to (YYYY)</label>
            <input type="number" min="1900" max="2099" step="1" value="2016" name="attended_to_update"
              id="attended_to_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Highest Level/Units Earned</label>
            <input type="text" name="highest_level_update" id="highest_level_update" class="form-control validate"
              required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Year Graduated (YYYY)</label>
            <input type="number" min="1900" max="2099" step="1" value="2016" name="year_grad_update"
              id="year_grad_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Scholarship/Academic Honors Received</label>
            <input type="text" name="honor_received_update" id="honor_received_update" class="form-control validate"
              required>

          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">

          <button class="btn btn-primary" id="submit_educ">Update data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>



  <!-- ADD EDUC FORM -->
  <div class="modal fade" id="modalEducationForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Educational Background</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">


          <div class="md-form mb-5">

            <!--<label data-error="wrong" data-success="right" for="form34">Level</label>
                <input type="text" name="level" id = "level" class="form-control validate" required>-->
            <label for="inputZip">Level</label>
            <select class="custom-select my-1 mr-sm-2" id="level" name="level">
              <option value="NA" selected>Choose...</option>
              <option value="ELEM">ELEMENTARY</option>
              <option value="SEC">SECONDARY</option>
              <option value="VOC">VOCATIONAL/TRADE COURSE</option>
              <option value="COLLEGE">COLLEGE</option>
              <option value="GRADSTUD">GRADUATE STUDIES</option>

            </select>
          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Name of School (Write in full)</label>
            <input type="text" name="school_name" id="school_name" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Basic Education/Degree/Course</label>
            <input type="text" name="educ" id="educ" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Period from </label>
            <input type="text" name="attended_from" id="attended_from" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Period to</label>
            <input type="text" name="attended_to" id="attended_to" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Highest Level/Units Earned</label>
            <input type="text" name="highest_level" id="highest_level" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Year Graduated</label>
            <input type="text" name="year_grad" id="year_grad" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Scholarship/Academic Honors Received</label>
            <input type="text" name="honor_received" id="honor_received" class="form-control validate" required>

          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">

          <button class="btn btn-primary" id="add_educ">Add data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ADD ELIGIBILITY FORM -->
  <div class="modal fade" id="modalEligibilityForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Eligibility</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <input type="hidden" name="eligibilityid" id="eligibilityid" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="form34">Eligibility</label>
            <input type="text" name="eligibility" id="eligibility" class="form-control validate" required>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">rating</label>
            <input type="text" name="rating" id="rating" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Date of Exam</label>
            <input type="data" name="date_of_exam" id="date_of_exam" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Place of Exam</label>
            <input type="text" name="place_of_exam" id="place_of_exam" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">License Number</label>
            <input type="text" name="license_no" id="license_no" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">License Date of Validity</label>
            <input type="date" name="license_date" id="license_date" class="form-control validate" required>

          </div>



        </div>
        <div class="modal-footer d-flex justify-content-center">
          <input type="hidden" name="eligibility_action_id" id="eligibility_action_id" class="form-control validate">
          <button class="btn btn-primary" id="add_eligibility">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>


  <!-- UPDATE ELIGIBILITY FORM -->
  <div class="modal fade" id="modalUpdateEligibilityForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Update Eligibility</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <input type="hidden" name="eligibilityid" id="eligibilityid" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="form34">Eligibility</label>
            <input type="text" name="eligibility_update" id="eligibility_update" class="form-control validate" required>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Rating</label>
            <input type="text" name="rating_update" id="rating_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Date of Exam</label>
            <input type="date" name="date_of_exam_update" id="date_of_exam_update" class="form-control validate"
              required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Place of Exam</label>
            <input type="text" name="place_of_exam_update" id="place_of_exam_update" class="form-control validate"
              required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">License Number</label>
            <input type="text" name="license_no_update" id="license_no_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">License Date of Validity</label>
            <input type="date" name="license_date_update" id="license_date_update" class="form-control validate"
              required>

          </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
          <input type="hidden" name="eligibility_action_id" id="eligibility_action_id" class="form-control validate">
          <button class="btn btn-primary" id="submit_eligibility">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>



  <!-- ADD WORK FORM -->
  <div class="modal fade" id="modalWorkForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Work Experience</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <input type="hidden" name="workid" id="workid" class="form-control validate" required> -->
            <label data-error="wrong" data-success="right" for="form34">Inclusive Date</label>
            <input type="date" name="work_date_from" id="work_date_from" class="form-control validate" required> -
            <input type="date" name="work_date_to" id="work_date_to" class="form-control validate" required>

          </div>


          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Positon Title (Write in Full)</label>
            <input type="text" name="work_position" id="work_position" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Department/Agency/Office/Company</label>
            <input type="text" name="work_company" id="work_company" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Monthly Salary</label>
            <input type="text" name="work_salary" id="work_salary" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Salary/Job/Pat Grade (If applicable)</label>
            <input type="text" name="work_salary_grade" id="work_salary_grade" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Status of Appointment</label>
            <input type="text" name="work_status" id="work_status" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Government Service (Y/N)</label>
            <!--<input type="text" name="work_govt_service_update" id = "work_govt_service_update" class="form-control validate" required> -->
            <select class="custom-select my-1 mr-sm-2" id="work_govt_service_update" name="work_govt_service_update">
              <option value="NA" selected>Please Select</option>
              <option value="Y">YES</option>
              <option value="N">No</option>

            </select>
          </div>



        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="add_work">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>


  <!-- UPDATE WORK FORM -->
  <div class="modal fade" id="modalUpdateWorkForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Work Experience</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <input type="hidden" name="workid" id="workid" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="form34">Inclusive Dates</label>
            <input type="date" name="work_date_from_update" id="work_date_from_update" class="form-control validate"
              required> -
            <input type="date" name="work_date_to_update" id="work_date_to_update" class="form-control validate"
              required>

          </div>


          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Positon Title (Write in Full)</label>
            <input type="text" name="work_position_update" id="work_position_update" class="form-control validate"
              required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Department/Agency/Office/Company</label>
            <input type="text" name="work_company_update" id="work_company_update" class="form-control validate"
              required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Monthly Salary</label>
            <input type="text" name="work_salary_update" id="work_salary_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Salary/Job/Pat Grade (If applicable)</label>
            <input type="text" name="work_salary_grade_update" id="work_salary_grade_update"
              class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Status of Appointment</label>
            <input type="text" name="work_status_update" id="work_status_update" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Government Service</label>
            <!--<input type="text" name="work_govt_service_update" id = "work_govt_service_update" class="form-control validate" required> -->

            <select class="custom-select my-1 mr-sm-2" id="work_govt_service_update" name="work_govt_service_update">
              <option value="NA" selected>Please Select</option>
              <option value="Y">YES</option>
              <option value="N">No</option>

            </select>
          </div>



        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="submit_work">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ADD VOLUNTARY WORK FORM -->
  <div class="modal fade" id="modalVolWorkForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Voluntary Work</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <!--<input type="hidden" name="volWorkid" id = "volWorkid" class="form-control validate" required> -->
            <label data-error="wrong" data-success="right" for="form34">Organization</label>
            <input type="text" name="volwork_organization" id="volwork_organization" class="form-control validate"
              required>
          </div>

          <div class="md-form mb-5">
            <input type="hidden" name="workid" id="workid" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="form34">Inclusive Dates</label>
            <input type="date" name="volwork_date_from" id="volwork_date_from" class="form-control validate" required> -
            <input type="date" name="volwork_date_to" id="volwork_date_to" class="form-control validate" required>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Number of Hours</label>
            <input type="text" name="volwork_nohours" id="volwork_nohours" class="form-control validate" required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Position</label>
            <input type="text" name="volwork_position" id="volwork_position" class="form-control validate" required>

          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="add_volwork">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- UPDATE VOLUNTARY WORK FORM -->
  <div class="modal fade" id="modalUpdateVolWorkForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Update Voluntary Work</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <input type="hidden" name="volWorkid" id="volWorkid" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="form34">Organization</label>
            <input type="text" name="volwork_organization_update" id="volwork_organization_update"
              class="form-control validate" required> -
          </div>

          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form34">Inclusive Dates</label>
            <input type="date" name="volwork_date_from_update" id="volwork_date_from_update"
              class="form-control validate" required> -
            <input type="date" name="volwork_date_to_update" id="volwork_date_to_update" class="form-control validate"
              required>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Number of Hours</label>
            <input type="text" name="volwork_nohours_update" id="volwork_nohours_update" class="form-control validate"
              required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Position</label>
            <input type="text" name="volwork_position_update" id="volwork_position_update" class="form-control validate"
              required>

          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="add_volwork">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>



  <!-- ADD L & D FORM -->
  <div class="modal fade" id="modalLanddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Learning and Development</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form34">Program</label>
            <input type="text" name="landd_program" id="landd_program" class="form-control validate" required>
          </div>

          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form34">Inclusive Dates</label>
            <input type="date" name="landd_date_from" id="landd_date_from" class="form-control validate" required> -
            <input type="date" name="landd_date_to" id="landd_date_to" class="form-control validate" required>
          </div>

          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form29">Number of Hours</label>
            <input type="text" name="landd_nohours" id="landd_nohours" class="form-control validate" required>
          </div>
          <div class="md-form mb-5">

            <!-- <label data-error="wrong" data-success="right" for="form29">Type</label>
              <input type="text" name="landd_type" id = "landd_type" class="form-control validate" required>
            -->

            <label data-error="wrong" data-success="right" for="form29">Type</label>
            <!--<input type="text" name="work_govt_service_update" id = "work_govt_service_update" class="form-control validate" required> -->

            <select class="custom-select my-1 mr-sm-2" id="landd_type" name="landd_type">
              <option value="NA" selected>Please Select</option>
              <option value="MANAGERIAL">MANAGERIAL</option>
              <option value="SUPERVISORY">SUPERVISORY</option>
              <option value="TECHNICAL">TECHNICAL</option>
              <option value="OTHERS">OTHERS</option>

            </select>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Sponsored By</label>
            <input type="text" name="landd_sponsoredby" id="landd_sponsoredby" class="form-control validate" required>

          </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="add_landd">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- UPDATE L & D FORM -->
  <div class="modal fade" id="modalUpdateLanddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Update Learning and Development</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <input type="hidden" name="landdid" id="landdid" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="form34">Program</label>
            <input type="text" name="landd_program_update" id="landd_program_update" class="form-control validate"
              required> -
          </div>

          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form34">Inclusive Dates</label>
            <input type="date" name="landd_date_from_update" id="landd_date_from_update" class="form-control validate"
              required> -
            <input type="date" name="landd_date_to_update" id="landd_date_to_update" class="form-control validate"
              required>

          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Number of Hours</label>
            <input type="text" name="landd_nohours_update" id="landd_nohours_update" class="form-control validate"
              required>

          </div>
          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Type</label>
            <!--<input type="text" name="landd_type_update" id = "landd_type_update" class="form-control validate" required>-->

            <select class="custom-select my-1 mr-sm-2" id="landd_type_update" name="landd_type_update">
              <option value="NA" selected>Please Select</option>
              <option value="MANAGERIAL">MANAGERIAL</option>
              <option value="SUPERVISORY">SUPERVISORY</option>
              <option value="TECHNICAL">TECHNICAL</option>
              <option value="OTHERS">OTHERS</option>

            </select>
          </div>

          <div class="md-form mb-5">

            <label data-error="wrong" data-success="right" for="form29">Sponsored By</label>
            <input type="text" name="landd_sponsoredby_update" id="landd_sponsoredby_update"
              class="form-control validate" required>

          </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="update_landd">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ADD OTHER SKILL FORM -->
  <div class="modal fade" id="otherSkillForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Skill or Hobby</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form34">Special Skill or Hobby</label>
            <input type="text" name="other_skill" id="other_skill" class="form-control validate" required>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="add_other_skill">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ADD OTHER RECOGNITION FORM -->
  <div class="modal fade" id="otherRecognitionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Recognition</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form34">Non-Academic Distinction/Recognition</label>
            <input type="text" name="other_recognition" id="other_recognition" class="form-control validate" required>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="add_other_recognition">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ADD OTHER MEMBERSHIP FORM -->
  <div class="modal fade" id="otherMembershipForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Membership</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="form34">Membership in Association/Organization</label>
            <input type="text" name="other_membership" id="other_membership" class="form-control validate" required>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > -->
          <button class="btn btn-primary" id="add_other_membership">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Modal
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <form action="admindashboard.php" method="post">
                      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <input type="submit" class="btn btn-primary" value="Logout" name="signout">
                      </div>
                  </form>
              </div>
          </div>
      </div>-->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
          <a class="btn btn-primary" href="logout">Logout</a>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>





    <!-- UPDATE PERSONAL DETAILS FORM -->
    <div class="modal fade" id="modalEditPersonalDetailsForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" style="max-width: 80%;" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Update Personal Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputAddress">Employee ID</label>
                <input type="text" class="form-control" id="employeeid_update" placeholder="Ex. CBTZ200116">
              </div>
              <div class="form-group col-md-4">
                <label for="inputAddress">Position</label>
                <input type="text" class="form-control" id="position_update" placeholder="Ex. Labor Employment Officer I">
              </div>
              <div class="form-group col-md-4">
                <label for="inputAddress">Date Hired</label>
                <input type="date" class="form-control" id="datehired_update">
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
                <input type="text" name="firstname_update" id="firstname_update" placeholder="Ex. Enrico" class="form-control validate"
                  required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputEmail4">Middle Name</label>
                <input type="text" name="middlename_update" id="middlename_update" placeholder="Ex. Santos"
                  class="form-control validate" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputEmail4">Last Name</label>
                <input type="text" name="lastname_update" id="lastname_update" placeholder="Ex. Cruz" class="form-control validate"
                  required>
              </div>
              <div class="form-group col-md-1">
                <label for="inputEmail4">Extension</label>
                <input type="text" name="extension_update" id="extension_update" placeholder="Ex. Jr, II, III"
                  class="form-control validate" required>
              </div>
            </div>

            <div class="form-row">
              <!-- Default input -->
              <div class="form-group col-md-3">
                <label for="inputEmail4">User Name</label>
                <input type="text" name="username_update" id="username_update" placeholder="Ex. CBTZ200116"
                  class="form-control validate" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputEmail4">Password</label>
                <input type="password" name="password_update" id="password_update" placeholder="Please provide password"
                  class="form-control validate" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputEmail4">Confirm Password</label>
                <input type="password" name="confirmpassword_update" id="confirmpassword_update"
                  placeholder="Please provide password" class="form-control validate" required>
              </div>
            </div>
            <!-- Grid row -->
            <div class="form-row">
              <!--<input type="hidden" name="profileid" id="profileid">-->
              <!-- Default input -->
              <div class="form-group col-md-2">

                <label for="inputCity">Date of Birth</label>
                <input type="date" class="form-control" id="dob_update">
              </div>
              <!-- Default input -->
              <div class="form-group col-md-8">
                <label for="inputZip">Place of Birth</label>
                <input type="text" class="form-control" name="placeofbirth_update" id="placeofbirth_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
            </div>
            <!-- Grid row -->

            <div class="form-row">
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputCity">Gender</label>
                <select class="custom-select my-1 mr-sm-2" id="gender_update" name="gender_update">
                  <option value='NA' selected>Choose...</option>
                  <option value="MALE">Male</option>
                  <option value="FEMALE">Female</option>

                </select>
              </div>
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputZip">Civil Status</label>
                <select class="custom-select my-1 mr-sm-2" id="civilstatus_update" name="civilstatus_update">
                  <option value="NA" selected>Choose...</option>
                  <option value="SINGLE">Single</option>
                  <option value="MARRIED">Married</option>
                  <option value="WIDOWED">Widowed</option>
                  <option value="SEPARATED">Separated</option>
                  <option value="OTHERS">Others</option>

                </select>
              </div>
              <!-- Default input -->
              <div class="form-group col-md-1">
                <label for="inputZip">Weight (Kg)</label>
                <input type="text" class="form-control" id="weight_update" name="weight_update" placeholder="Ex. 67">
              </div>
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputZip">Height (cm)</label>
                <input type="text" class="form-control" id="height_update" name="height_update" placeholder="Ex. 163">
              </div>
              <!-- Default input -->
              <div class="form-group col-md-1">
                <label for="inputZip">Blood Type</label>
                <input type="text" class="form-control" id="bloodtype_update" name="bloodtype_update" placeholder="Ex. B+">
              </div>
            </div>
            <!-- Grid row -->
            <div class="form-row">
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputCity">GSIS ID No.</label>
                <input type="text" class="form-control" id="gsisno_update" name="gsisno_update">
              </div>
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputZip">Pagibig No.</label>
                <input type="text" class="form-control" id="pagibigno_update" name="pagibigno_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputZip">Philhealth No.</label>
                <input type="text" class="form-control" id="phicno_update" name="phicno_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputZip">SSS No.</label>
                <input type="text" class="form-control" id="sssno_update" name="sssno_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputZip">TIN No.</label>
                <input type="text" class="form-control" id="tinno_update" name="tinno_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputZip">Agency Employee No.</label>
                <input type="text" class="form-control" id="agencyemployeeno_update" name="agencyemployeeno_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
            </div>
            <!-- Grid row -->
            <div class="form-row">
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputCity">Citizenship</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="citizenship_update" id="filipino_update" value="filipino"
                    checked>
                  <label class="form-check-label" for="citizenship1">
                    Filipino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="citizenship_update" id="dual_update" value="dual">
                  <label class="form-check-label" for="citizenship2">
                    Dual Citizenship
                  </label>
                </div>
              </div>

              <div class="form-group col-md-2">
                <label for="inputCity"></label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="dualchoice" id="birth_update" value="birth" checked>
                  <label class="form-check-label" for="gridRadios1">
                    By Birth
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="dualchoice_update" id="naturalization_update"
                    value="naturalization">
                  <label class="form-check-label" for="gridRadios2">
                    By Naturalization
                  </label>
                </div> <br>
                <!-- <div class="form-group col-md-10">
                                            <label for="inputZip">Please Indicate Country</label>
                                            <input type="text" class="form-control" id="dualcountry" placeholder="Ex. China">
                                        </div> -->
              </div>
            </div>
            <!-- Grid row -->
            <div class="form-row">

              <!-- Default input -->
              <div class="form-group col-md-10">
                <label for="inputCity">Residential Address</label>
                <input type="text" class="form-control" id="residentialaddress_update">
              </div>
            </div>

            <!-- Grid row -->
            <div class="form-row">
              <!-- Default input -->
              <div class="form-group col-md-10">
                <label for="inputCity">Permanent Address</label><br>
                <input class="form-check-input" type="checkbox" id="addressCheck_update" name="addressCheck_update">
                <label class="form-check-label" for="gridCheck1">
                  Same with Residential Address
                </label>
                <input type="text" class="form-control" id="permanentaddress">
              </div>
            </div>

            <!-- Grid row -->
            <div class="form-row">
              <!-- Default input -->
              <div class="form-group col-md-2">
                <label for="inputCity">Telephone No.</label><br>
                <input type="text" class="form-control" id="telephoneno_update" name="telephoneno_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Mobile No.</label>
                <input type="text" class="form-control" id="mobileno_update" name="mobileno_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Email Address</label>
                <input type="text" class="form-control" id="emailprofile_update" name="emailprofile_update"
                  placeholder="Ex. 1234 Main Street">
              </div>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">

            <button class="btn btn-primary" id="submit_personal_details">Update data</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>


    <!-- UPDATE FAMILY BACKGROUND FORM -->
    <div class="modal fade" id="modalEditFamilyBackgroundForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" style="max-width: 80%;" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Update Family Background</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">

          <div class="col-md-12">
                  </div>
                  <!-- <div class="col-md-12">                  
                                      </div> -->

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-3">
                      <!--<input type="hidden" name="familyid" id="familyid">-->
                      <label for="inputEmail4">Spouse's Surname</label>
                      <input type="text" name="spouselastname_update" id="spouselastname_update" placeholder="Ex. Cruz"
                        class="form-control validate">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" name="spousefirstname_update" id="spousefirstname_update" placeholder="Ex. Enrico"
                        class="form-control validate">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Middle Name</label>
                      <input type="text" name="spousemiddlename_update" id="spousemiddlename_update" placeholder="Ex. Santos"
                        class="form-control validate">
                    </div>

                    <div class="form-group col-md-1">
                      <label for="inputEmail4">Extension</label>
                      <input type="text" name="spouseextension_update" id="spouseextension_update" placeholder="Ex. Jr, II, III"
                        class="form-control validate">
                    </div>

                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-10">
                      <label for="inputCity">Occupation</label>
                      <input type="text" class="form-control" id="occupation_update">
                    </div>

                  </div>
                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-10">
                      <label for="inputCity">Employer/Business Name</label>
                      <input type="text" class="form-control" id="employername_update">
                    </div>

                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-10">
                      <label for="inputCity">Business Address</label>
                      <input type="text" class="form-control" id="businessaddress_update">
                    </div>

                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-2">
                      <label for="inputCity">Telephone No.</label>
                      <input type="text" class="form-control" id="spousetelno_update">
                    </div>

                  </div>


                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Father's Surname</label>
                      <input type="text" name="fathersurname_update" id="fathersurname_update" placeholder="Ex. Cruz"
                        class="form-control validate" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" name="fatherfirstname_update" id="fatherfirstname_update" placeholder="Ex. Enrico"
                        class="form-control validate" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Middle Name</label>
                      <input type="text" name="fathermiddlename_update" id="fathermiddlename_update" placeholder="Ex. Santos"
                        class="form-control validate" required>
                    </div>

                    <div class="form-group col-md-1">
                      <label for="inputEmail4">Extension</label>
                      <input type="text" name="fatherext_update" id="fatherext_update" placeholder="Ex. Jr, II, III"
                        class="form-control validate" required>
                    </div>

                  </div>

                  <!-- Grid row -->
                  <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Mother's Maiden Name</label>
                      <input type="text" name="mothermaidenname_update" id="mothermaidenname_update" placeholder="Ex. Cruz"
                        class="form-control validate" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Mother's Surname</label>
                      <input type="text" name="mothersurname_update" id="mothersurname_update" placeholder="Ex. Cruz"
                        class="form-control validate" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" name="motherfirstname_update" id="motherfirstname_update" placeholder="Ex. Enrico"
                        class="form-control validate" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Middle Name</label>
                      <input type="text" name="mothermiddlename_update" id="mothermiddlename_update" placeholder="Ex. Santos"
                        class="form-control validate" required>
                    </div>



                  </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">

            <button class="btn btn-primary" id="submit_family_background">Update data</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>


  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>

  <!--JS FOR EMPLOYEE ACTIONS -->
  <script type="text/javascript" src="js/action/viewEmployee.js"></script>
</body>


</html>