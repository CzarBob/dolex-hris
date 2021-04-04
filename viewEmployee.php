<?php
include "dbConnection.php";
session_start();

include 'view_employee_load_query.php';
/*if (isset($_GET['id'])) {

    unset($_SESSION['query3']);
    $id = $_GET['id'];

    $query = 'SELECT * FROM tbl_employee_children WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';

    
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
       
      while($row = mysqli_fetch_array($result)){
         
        $sub_array = array();
        $sub_array[] = $row["FULLNAME"];
        $sub_array[] = $row["DOB"];
        $data[] = $sub_array;
      }
      $_SESSION['query3'] = $data;
      
}*/

//include 'adminlogout.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/AEP_icon.png" rel="icon">
    <title>Employee View</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet">



  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="icon" href="img/dolelogogs.png">
  <script type="text/javascript" src = "js/date_time.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admindashboard.php">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
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
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="col-md-12">
                                    </div>
                                     <!-- <div class="col-md-12">
    
                    
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
                                        <input type="text" class="form-control" id="employeeid" placeholder="Ex. CBTZ200116">
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputAddress">Position</label>
                                        <input  type="text" class="form-control" id="position" placeholder="Ex. Labor Employment Officer I">
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputAddress">Date Hired</label>
                                        <input type="date" class="form-control" id="datehired" >
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
                                        <input type="text" name="firstname" id = "firstname"  placeholder="Ex. Enrico" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Middle Name</label>
                                        <input type="text" name="middlename" id = "middlename"  placeholder="Ex. Santos" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Last Name</label>
                                        <input type="text" name="lastname" id = "lastname"  placeholder="Ex. Cruz" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-1">
                                        <label for="inputEmail4">Extension</label>
                                        <input type="text" name="extension" id = "extension"  placeholder="Ex. Jr, II, III" class="form-control validate" required>
                                        </div>
                                      
                                    </div>
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">User Name</label>
                                        <input type="text" name="username" id = "username"  placeholder="Ex. CBTZ200116" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Password</label>
                                        <input type="password" name="password" id = "password"  placeholder="Please provide password" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Confirm Password</label>
                                        <input type="password" name="confirmpassword" id = "confirmpassword"  placeholder="Please provide password" class="form-control validate" required>
                                        </div>       
                                    </div>
                                    <!-- Grid row -->
                                    <div class="form-row">
                                    <input type="hidden" name="profileid" id="profileid" >
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        
                                        <label for="inputCity">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" >
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-8">
                                        <label for="inputZip">Place of Birth</label>
                                        <input type="text" class="form-control"  name="placeofbirth" id="placeofbirth" placeholder="Ex. 1234 Main Street">
                                        </div>
                                    </div>
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        <label for="inputCity">Gender</label>
                                        <select class="custom-select my-1 mr-sm-2" id="gender" name="gender">
                                            <option value='NA' selected >Choose...</option>
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                           
                                        </select>
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                            <label for="inputZip">Civil Status</label>
                                            <select class="custom-select my-1 mr-sm-2" id="civilstatus" name="civilstatus">
                                                <option  value="NA" selected>Choose...</option>
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
                                            <input type="text" class="form-control" id="weight" name="weight" placeholder="Ex. 67">
                                        </div>
                                         <!-- Default input -->
                                         <div class="form-group col-md-2">
                                            <label for="inputZip">Height (cm)</label>
                                            <input type="text" class="form-control" id="height"  name="height" placeholder="Ex. 163">
                                        </div>
                                         <!-- Default input -->
                                         <div class="form-group col-md-1">
                                            <label for="inputZip">Blood Type</label>
                                            <input type="text" class="form-control" id="bloodtype"  name="bloodtype"  placeholder="Ex. B+">
                                        </div>                                   
                                    </div>
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        <label for="inputCity">GSIS ID No.</label>
                                        <input type="text" class="form-control" id="gsisno" name="gsisno">
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        <label for="inputZip">Pagibig No.</label>
                                        <input type="text" class="form-control" id="pagibigno" name="pagibigno" placeholder="Ex. 1234 Main Street">
                                        </div>
                                         <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        <label for="inputZip">Philhealth No.</label>
                                        <input type="text" class="form-control" id="phicno" name="phicno" placeholder="Ex. 1234 Main Street">
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        <label for="inputZip">SSS No.</label>
                                        <input type="text" class="form-control" id="sssno" name="sssno" placeholder="Ex. 1234 Main Street">
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        <label for="inputZip">TIN No.</label>
                                        <input type="text" class="form-control" id="tinno" name="tinno" placeholder="Ex. 1234 Main Street">
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        <label for="inputZip">Agency Employee No.</label>
                                        <input type="text" class="form-control" id="agencyemployeeno" name="agencyemployeeno" placeholder="Ex. 1234 Main Street">
                                        </div>
                                    </div>
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                            <label for="inputCity">Citizenship</label>                                    
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="citizenship" id="filipino" value="filipino" checked>
                                            <label class="form-check-label" for="citizenship1">
                                                Filipino
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="citizenship" id="dual" value="dual">
                                            <label class="form-check-label" for="citizenship2">
                                                Dual Citizenship
                                            </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                        <label for="inputCity"></label>                                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="dualchoice" id="birth" value="birth"  checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    By Birth
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="dualchoice" id="naturalization" value="naturalization">
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
                                        <input type="text" class="form-control" id="residentialaddress" >
                                        </div>
                                    </div>

                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-10">
                                            <label for="inputCity">Permanent Address</label><br>
                                            <input class="form-check-input" type="checkbox" id="addressCheck"  name="addressCheck">
                                            <label class="form-check-label" for="gridCheck1">
                                                Same with Residential Address
                                            </label>
                                            <input type="text" class="form-control" id="permanentaddress" >
                                        </div>
                                    </div>

                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                            <label for="inputCity">Telephone No.</label><br>
                                            <input type="text" class="form-control" id="telephoneno" name="telephoneno" placeholder="Ex. 1234 Main Street">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputZip">Mobile No.</label>
                                            <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="Ex. 1234 Main Street">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputZip">Email Address</label>
                                            <input type="text" class="form-control" id="emailprofile" name="emailprofile" placeholder="Ex. 1234 Main Street">
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
                                        <input type="hidden" name="familyid" id="familyid" >
                                        <label for="inputEmail4">Spouse's Surname</label>
                                        <input type="text" name="spouselastname" id = "spouselastname"  placeholder="Ex. Cruz" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">First Name</label>
                                        <input type="text" name="spousefirstname" id = "spousefirstname"  placeholder="Ex. Enrico" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Middle Name</label>
                                        <input type="text" name="spousemiddlename" id = "spousemiddlename"  placeholder="Ex. Santos" class="form-control validate" required>
                                        </div>
                                        
                                        <div class="form-group col-md-1">
                                        <label for="inputEmail4">Extension</label>
                                        <input type="text" name="spouseextension" id = "spouseextension"  placeholder="Ex. Jr, II, III" class="form-control validate" required>
                                        </div>
                                      
                                    </div>
                                   
                                   <!-- Grid row -->
                                   <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-10">
                                        <label for="inputCity">Occupation</label>
                                        <input type="text" class="form-control" id="occupation" >
                                        </div>
                                        
                                    </div>
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-10">
                                        <label for="inputCity">Employer/Business Name</label>
                                        <input type="text" class="form-control" id="employername" >
                                        </div>
                                        
                                    </div>

                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-10">
                                        <label for="inputCity">Business Address</label>
                                        <input type="text" class="form-control" id="businessaddress" >
                                        </div>
                                        
                                    </div>

                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                        <label for="inputCity">Telephone No.</label>
                                        <input type="text" class="form-control" id="spousetelno" >
                                        </div>
                                        
                                    </div>
                                   
                                   
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Father's Surname</label>
                                        <input type="text" name="fathersurname" id = "fathersurname"  placeholder="Ex. Cruz" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">First Name</label>
                                        <input type="text" name="fatherfirstname" id = "fatherfirstname"  placeholder="Ex. Enrico" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Middle Name</label>
                                        <input type="text" name="fathermiddlename" id = "fathermiddlename"  placeholder="Ex. Santos" class="form-control validate" required>
                                        </div>
                                        
                                        <div class="form-group col-md-1">
                                        <label for="inputEmail4">Extension</label>
                                        <input type="text" name="fatherext" id = "fatherext"  placeholder="Ex. Jr, II, III" class="form-control validate" required>
                                        </div>
                                      
                                    </div>

                                     <!-- Grid row -->
                                     <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Mother's Maiden Name</label>
                                        <input type="text" name="mothermaidenname" id = "mothermaidenname"  placeholder="Ex. Cruz" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Mother's Surname</label>
                                        <input type="text" name="mothersurname" id = "mothersurname"  placeholder="Ex. Cruz" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">First Name</label>
                                        <input type="text" name="motherfirstname" id = "motherfirstname"  placeholder="Ex. Enrico" class="form-control validate" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputEmail4">Middle Name</label>
                                        <input type="text" name="mothermiddlename" id = "mothermiddlename"  placeholder="Ex. Santos" class="form-control validate" required>
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
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Children (if Applicable)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="educ-tab" data-toggle="tab" href="#eductab" role="tab" aria-controls="profile" aria-selected="false">Educational Background</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="civil-tab" data-toggle="tab" href="#civiltab" role="tab" aria-controls="contact" aria-selected="false">Civil Service Eligibility</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="work-tab" data-toggle="tab" href="#worktab" role="tab" aria-controls="contact" aria-selected="false">Work Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="voluntary-tab" data-toggle="tab" href="#voluntarytab" role="tab" aria-controls="contact" aria-selected="false">Voluntary Work</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="lad-tab" data-toggle="tab" href="#ladtab" role="tab" aria-controls="contact" aria-selected="false">Learning and Development</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Other Information</a>
                                </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="container-fluid">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary"></h6> 
                                                    
                                                    <a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalChildrenForm" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Add Employee</a>
                                                    
                                                    <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                                                </div>
                                                <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="children_data" width="100%" cellspacing="0">
                                                                <thead class = "text-primary">
                                                                    <tr>
                                                                        <th data-column-id="fullName">FULL NAME</th>
                                                                        <th data-column-id="dob">DATE OF BIRTH</th>
                                                                        <th >ACTION</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot class = "text-primary">
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
                                                    
                                                    <a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalEducationForm" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Add Educational Background</a>
                                                    
                                                    <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                                                </div>
                                                <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="educ_data" width="100%" cellspacing="0">
                                                                <thead class = "text-primary">
                                                                    <tr>
                                                                        <th data-column-id="educ_level">LEVEL</th>
                                                                        <th data-column-id="school_name">NAME OF SCHOOL</th>
                                                                        <th data-column-id="basic_educ">BASIC EDUCATION/DEGREE/COURSE</th>
                                                                        <th data-column-id="period_from">ATTENDED FROM</th>
                                                                        <th data-column-id="period_to">ATTENDED UNTIL</th>
                                                                        <th data-column-id="highest_level">HIGHEST LEVEL/UNITS EARNED</th>
                                                                        <th data-column-id="year_grad">YEAR GRADUATED</th>
                                                                        <th data-column-id="honor_received">ACADEMIC HONORS RECEIVED</th>
                                                                        <th >ACTION</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot class = "text-primary">
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
                                                    
                                                    <a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalEligibilityForm" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Add Eligibility</a>
                                                    
                                                    <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                                                </div>
                                                <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="civil_data" width="100%" cellspacing="0">
                                                                <thead class = "text-primary">
                                                                    <tr>
                                                                        <th data-column-id="eligibility">ELIGIBILITY</th>
                                                                        <th data-column-id="rating">RATING</th>
                                                                        <th data-column-id="date_of_exam">DATE OF EXAM</th>
                                                                        <th data-column-id="place_of_exam">PLACE OF EXAM</th>
                                                                        <th data-column-id="license_no">LICENSE NUMBER</th>
                                                                        <th data-column-id="license_date">LICENSE DATE OF VALIDITY</th>
                                                                        <th >ACTION</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot class = "text-primary">
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
                                                    
                                                    <a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalWorkForm" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Add Work Experience</a>
                                                    
                                                    <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
                                                </div>
                                                <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="work_data" width="100%" cellspacing="0">
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
                                            </div>
                                        </div>
                                                                          
                                    </div> <!--END OF WORK TAB -->

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
                                            <tr>
                                                <td style="width: 100%;" colspan="2" style = "align: center"><button  style="width: 100%;" class="btn btn-primary" id = "update_employee">     Update Employee Details  </button></td> 
                                                                                       
                                            </tr>  
                                            <tr>
                                           
                                                <td style="width: 100%;"  colspan="2" style = "align: left"><button  style="width: 100%;" class="btn btn-primary" id = "cancel_employee">     Cancel  </button></td>                                               
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
    <div class="modal fade" id="modalChildrenForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              <input type="text" name="fullname" id = "fullname" class="form-control validate" required>
           
            </div>

            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Date of Birth</label>
              <input type="date" name="dob_add" id = "dob_add" class="form-control validate" required>
             
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
         
          <button class="btn btn-primary" id = "add_children">Add data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <!-- EDIT CHILDREN FORM -->
    <div class="modal fade" id="modalEditChildrenForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              <input type="text" name="fullname_update" id = "fullname_update" class="form-control validate" required>
           
            </div>

            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Date of Birth</label>
              <input type="date" name="dob_update" id = "dob_update" class="form-control validate" required>
             
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
          <input type="hidden" name="hidden_id" id="hidden_id" />
          <button class="btn btn-primary" id = "submit_update_children">Update data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  
  

    <!-- UPDATE EDUC FORM -->
    <div class="modal fade" id="modalEditEducationForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <input type="hidden" name="educid" id = "educid" class="form-control validate" required>  
              <label data-error="wrong" data-success="right" for="form34">Level</label>
              <input type="text" name="level_update" id = "level_update" class="form-control validate" required>
           
            </div>

            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Name of School (Write in full)</label>
              <input type="text" name="school_name_update" id = "school_name_update" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Basic Education/Degree/Course</label>
              <input type="text" name="educ_update" id = "educ_update" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Period from </label>
              <input type="text" name="attended_from_update" id = "attended_from_update" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Period to</label>
              <input type="text" name="attended_to_update" id = "attended_to_update" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Highest Level/Units Earned</label>
              <input type="text" name="highest_level_update" id = "highest_level_update" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Year Graduated</label>
              <input type="text" name="year_grad_update" id = "year_grad_update" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Scholarship/Academic Honors Received</label>
              <input type="text" name="honor_received_update" id = "honor_received_update" class="form-control validate" required>
             
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
         
          <button class="btn btn-primary" id = "submit_educ">Update data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>



    <!-- ADD EDUC FORM -->
    <div class="modal fade" id="modalEducationForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            
              <label data-error="wrong" data-success="right" for="form34">Level</label>
              <input type="text" name="level" id = "level" class="form-control validate" required>
           
            </div>

            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Name of School (Write in full)</label>
              <input type="text" name="school_name" id = "school_name" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Basic Education/Degree/Course</label>
              <input type="text" name="educ" id = "educ" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Period from </label>
              <input type="text" name="attended_from" id = "attended_from" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Period to</label>
              <input type="text" name="attended_to" id = "attended_to" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Highest Level/Units Earned</label>
              <input type="text" name="highest_level" id = "highest_level" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Year Graduated</label>
              <input type="text" name="year_grad" id = "year_grad" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Scholarship/Academic Honors Received</label>
              <input type="text" name="honor_received" id = "honor_received" class="form-control validate" required>
             
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
         
          <button class="btn btn-primary" id = "add_educ">Add data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    

    <!-- ADD ELIGIBILITY FORM -->
    <div class="modal fade" id="modalEligibilityForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <input type="hidden" name="eligibilityid" id = "eligibilityid" class="form-control validate" required>  
            <label data-error="wrong" data-success="right" for="form34">Eligibility</label>
            <input type="text" name="eligibility" id = "eligibility" class="form-control validate" required>
         
          </div>

          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">rating</label>
            <input type="text" name="rating" id = "rating" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Date of Exam</label>
            <input type="text" name="date_of_exam" id = "date_of_exam" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Place of Exam</label>
            <input type="text" name="place_of_exam" id = "place_of_exam" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">License Number</label>
            <input type="text" name="license_no" id = "license_no" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">License Date of Validity</label>
            <input type="text" name="license_date" id = "license_date" class="form-control validate" required>
           
          </div>
          
          
 
          </div>
          <div class="modal-footer d-flex justify-content-center">
          <input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" >  
          <button class="btn btn-primary" id = "add_eligibility">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    
    <!-- UPDATE ELIGIBILITY FORM -->
    <div class="modal fade" id="modalUpdateEligibilityForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <input type="hidden" name="eligibilityid" id = "eligibilityid" class="form-control validate" required>  
            <label data-error="wrong" data-success="right" for="form34">Eligibility</label>
            <input type="text" name="eligibility_update" id = "eligibility_update" class="form-control validate" required>
         
          </div>

          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">rating</label>
            <input type="text" name="rating_update" id = "rating_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Date of Exam</label>
            <input type="text" name="date_of_exam_update" id = "date_of_exam_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Place of Exam</label>
            <input type="text" name="place_of_exam_update" id = "place_of_exam_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">License Number</label>
            <input type="text" name="license_no_update" id = "license_no_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">License Date of Validity</label>
            <input type="text" name="license_date_update" id = "license_date_update" class="form-control validate" required>
           
          </div>
          
          </div>
          <div class="modal-footer d-flex justify-content-center">
          <input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" >  
          <button class="btn btn-primary" id = "submit_eligibility">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>



    <!-- ADD WORK FORM -->
    <div class="modal fade" id="modalWorkForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <input type="hidden" name="workid" id = "workid" class="form-control validate" required> -->  
            <label data-error="wrong" data-success="right" for="form34">Inclusive Date</label>
            <input type="date" name="work_date_from" id = "work_date_from" class="form-control validate" required> - 
            <input type="date" name="work_date_to" id = "work_date_to" class="form-control validate" required>
         
          </div>

         
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Positon Title (Write in Full)</label>
            <input type="text" name="work_position" id = "work_position" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Department/Agency/Office/Company</label>
            <input type="text" name="work_company" id = "work_company" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Monthly Salary</label>
            <input type="text" name="work_salary" id = "work_salary" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Salary/Job/Pat Grade (If applicable)</label>
            <input type="text" name="work_salary_grade" id = "work_salary_grade" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Status of Appointment</label>
            <input type="text" name="work_status" id = "work_status" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Government Service</label>
            <input type="text" name="work_govt_service" id = "work_govt_service" class="form-control validate" required>
           
          </div>
          
          
 
          </div>
          <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > --> 
          <button class="btn btn-primary" id = "add_work">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    
    <!-- UPDATE WORK FORM -->
    <div class="modal fade" id="modalUpdateWorkForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <input type="hidden" name="workid" id = "workid" class="form-control validate" required>  
            <label data-error="wrong" data-success="right" for="form34">Inclusive Dates</label>
            <input type="date" name="work_date_from_update" id = "work_date_from_update" class="form-control validate" required> - 
            <input type="date" name="work_date_to_update" id = "work_date_to_update" class="form-control validate" required>
         
          </div>

         
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Positon Title (Write in Full)</label>
            <input type="text" name="work_position_update" id = "work_position_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Department/Agency/Office/Company</label>
            <input type="text" name="work_company_update" id = "work_company_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Monthly Salary</label>
            <input type="text" name="work_salary_update" id = "work_salary_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Salary/Job/Pat Grade (If applicable)</label>
            <input type="text" name="work_salary_grade_update" id = "work_salary_grade_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Status of Appointment</label>
            <input type="text" name="work_status_update" id = "work_status_update" class="form-control validate" required>
           
          </div>
          <div class="md-form mb-5">
     
            <label data-error="wrong" data-success="right" for="form29">Government Service</label>
            <input type="text" name="work_govt_service_update" id = "work_govt_service_update" class="form-control validate" required>
           
          </div>
          
          
 
          </div>
          <div class="modal-footer d-flex justify-content-center">
          <!--<input type="hidden" name="eligibility_action_id" id = "eligibility_action_id" class="form-control validate" > --> 
          <button class="btn btn-primary" id = "submit_work">Submit data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>

  
    

    <!-- Logout Modal-->
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

    <script>
        //FUNCTION FOR READING HTML TABLE ROWS
       /* function myFunction() {
        //alert(document.getElementById("children_data").rows[1].cells[0].innerHTML);
        var children_data = document.getElementById('children_data');
        var employeeiddb = document.getElementById("empID").value;
        var TableData = new Array();

        $('#children_data tr').each(function(row, tr){
            TableData[row]={
                "fullName" : $(tr).find('td:eq(0)').text()
                , "dob" :$(tr).find('td:eq(1)').text()
               
            }
        }); 
        TableData.shift();

        $.ajax({
                url: 'view_employee_action.php',
                type: 'post',
                data: 
                {
                children_data:TableData,
                employeeiddb:employeeiddb, 
                action:'update_children'},

                dataType: 'json',
                success:function(response){

                    var len = response.length;

                    if(len > 0){

                    alert("Exito");

                    }

                }
            });

            return false;

        }*/

            

            $(document).ready(function(){
    
                //fetch_data();
                fetch_single();
                //document.getElementById("update_eligibility").style.visibility='hidden';
                function fetch_children_data(){
                    //alert('pota');
                    
                    var employeeiddb = document.getElementById("empID").value;
                    var dataTable = $('#children_data').DataTable({
                    /* "processing" : true,
                    "serverSide" : true,*/
                    "columnDefs": [{ "orderable": false, "targets":[0,2] }],
                   // "order" : [],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_children'},
                    }
                    });
                }

                function fetch_educ_data(){
                    //alert('pota');
                    var employeeiddb = document.getElementById("empID").value;
                    
                    //alert('s');
                    var dataTable = $('#educ_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1,8] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_educ'},
                    }
                    });
                    //alert(dataTable);
                }

                function fetch_civil_data(){
                    //alert('pota');
                    var employeeiddb = document.getElementById("empID").value;
                    
                    //alert('s');
                    var dataTable = $('#civil_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1,6] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_eligibility'},
                    }
                    });
                    //alert(dataTable);
                } 

                function fetch_civil_data(){
                    //alert('pota');
                    var employeeiddb = document.getElementById("empID").value;
                    
                    //alert('s');
                    var dataTable = $('#work_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1,6] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_work'},
                    }
                    });
                    //alert(dataTable);
                }

                
                function fetch_single() {
                        var employeeiddb = document.getElementById("empID").value;
                        
                        //var email_hidden = $(this).data('email_hidden'); //data id in database
                        //var admin_id = $(this).data('id');
                        //$('#user_form').parsley().reset();

                        $.ajax({
                                url:"view_employee_action.php",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_single'},
                                dataType:'JSON',
                                success:function(data)
                                {
                                    $('#employeeid').val(data.data.employeeid);
                                    $('#firstname').val(data.data.firstname);
                                    $('#middlename').val(data.data.middlename);
                                    $('#lastname').val(data.data.lastname);
                                    $('#extension').val(data.data.extension);
                                    $('#position').val(data.data.position);
                                    $('#datehired').val(data.data.datehired);
                                    $('#username').val(data.data.username);
                                    $('#password').val(data.data.password);
                                    $('#confirmpassword').val(data.data.password);

                                    /*$('#slcredit').val(data.data.slcredit);
                                    $('#vlcredit').val(data.data.vlcredit);*/

                                    var genderValue =  data.data_profile.gender;

                                    if (genderValue == 'MALE'){
                                        $("#gender").val("MALE").change();
                                    } else if (genderValue == "") {
                                        $("#gender").val('NA').change();
                                    }
                                    //var civilStatusValue =  'NA';
                                    var civilStatusValue =  data.data_profile.civilstatus;
                                    
                                    $("#civilstatus").val(civilStatusValue).change();
         
                               
                                    
                                    $('#profileid').val(data.data_profile.id);
                                    $('#dob').val(data.data_profile.dob);
                                    $('#placeofbirth').val(data.data_profile.placeofbirth);
                                    $('#height').val(data.data_profile.height);
                                    $('#weight').val(data.data_profile.weight);
                                    $('#gsisno').val(data.data_profile.gsisno);
                                    $('#pagibigno').val(data.data_profile.pagibigno);
                                    $('#phicno').val(data.data_profile.phicno);
                                    $('#sssno').val(data.data_profile.sssno);
                                    $('#tinno').val(data.data_profile.tinno);
                                    $('#agencyemployeeno').val(data.data_profile.agencyemployeeno);
                                   
                                    //$('#citizenship').prop("dual", true)
                                    var citizenValueDB = data.data_profile.citizenship;
                                    //$('#citizenship').attr('checked','checked');
                                    //alert(citizenValueDB);
                                    if (citizenValueDB == 'dual'){
                                        $('#dual').attr('checked','checked');
                                    } else if (citizenValueDB == 'filipino'){
                                        $('#filipino').attr('checked','checked');
                                    }
                                   
                                    var citizenValue = $('input[name="citizenship"]:checked').val();
                                    if (citizenValue == 'dual'){
                                            
                                            document.getElementById("birth").disabled=false;
                                            document.getElementById("naturalization").disabled=false;
                                            //document.getElementById("dualcountry").disabled=false;
                                        } else {
                                           
                                            document.getElementById("birth").disabled=true;
                                            document.getElementById("naturalization").disabled=true;
                                            //document.getElementById("dualcountry").disabled=true;
                                        }


                                    var dualchoiceDB = data.data_profile.dualcitizen;

                                    if (dualchoiceDB == 'dual'){
                                        $('#birth').attr('checked','checked');
                                    } else if (dualchoiceDB == 'filipino'){
                                        $('#naturalization').attr('checked','checked');
                                    }

                                    $('#residentialaddress').val(data.data_profile.residentialaddress);
                                    $('#permanentaddress').val(data.data_profile.permanentaddress);
                                    $('#telephoneno').val(data.data_profile.telephoneno);
                                    $('#mobileno').val(data.data_profile.mobileno);
                                    $('#emailprofile').val(data.data_profile.email);


                                    $('#familyid').val(data.data_family.id);
                                    $('#spouselastname').val(data.data_family.spouselastname);
                                    $('#spousemiddlename').val(data.data_family.spousemiddlename);
                                    $('#spousefirstname').val(data.data_family.spousefirstname);
                                    $('#spouseextension').val(data.data_family.spouseextension);
                                    $('#occupation').val(data.data_family.occupation);
                                    $('#employername').val(data.data_family.employername);
                                    $('#businessaddress').val(data.data_family.businessaddress);
                                    $('#spousetelno').val(data.data_family.spousetelno);
                                    $('#fathersurname').val(data.data_family.fathersurname);
                                    $('#fatherfirstname').val(data.data_family.fatherfirstname);
                                    $('#fathermiddlename').val(data.data_family.fathermiddlename);
                                    $('#fatherext').val(data.data_family.fatherext);
                                    $('#mothermaidenname').val(data.data_family.mothermaidenname);
                                    $('#mothersurname').val(data.data_family.mothersurname);
                                    $('#motherfirstname').val(data.data_family.motherfirstname);
                                    $('#mothermiddlename').val(data.data_family.mothermiddlename);
                                }
                            });

                            fetch_children_data();
                            fetch_educ_data();
                            fetch_civil_data();

                            $('input[type=radio][name="citizenship"]').change(function() {
                                //alert($(this).val()); // or this.value
                                if ($(this).val() == 'dual'){
                                        document.getElementById("birth").disabled=false;
                                        document.getElementById("naturalization").disabled=false;
                                        document.getElementById("dualcountry").disabled=false;
                                } else {
                                        document.getElementById("birth").disabled=true;
                                        document.getElementById("naturalization").disabled=true;
                                        document.getElementById("dualcountry").disabled=true;
                                }
                               
                            });

                            $("input[type=checkbox][name='addressCheck']").change(function() {
                                
                                var text1 = document.getElementById("residentialaddress").value;
                                var text2 = document.getElementById("permanentaddress").value;
                                if(this.checked) {
                                    document.getElementById("permanentaddress").value = text1;
                                } 
                            });
                }  


                $(document).on('click', '#add_children', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                        //validateData();
                        //var answer = validateData();
                            var fullname = $('#fullname').val();
                            var dob = $('#dob_add').val();              
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    fullname:fullname, 
                                    dob:dob, 
                                    employeeiddb:employeeiddb,
                                    action:'add_children'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#children_data').DataTable().ajax.reload();
                                $('#modalChildrenForm').modal('hide');
                               
                                }     
                            }); 
                });


                $(document).on('click', '#add_educ', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                        //validateData();
                        //var answer = validateData();
                            var level = $('#level').val();
                            var school_name = $('#school_name').val(); 
                            var educ = $('#educ').val();
                            var attended_from = $('#attended_from').val();       
                            var attended_to = $('#attended_to').val();
                            var highest_level = $('#highest_level').val();       
                            var year_grad = $('#year_grad').val();
                            var honor_received = $('#honor_received').val();                    
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    level:level, 
                                    school_name:school_name, 
                                    educ:educ,
                                    attended_from:attended_from,
                                    attended_to:attended_to,
                                    highest_level:highest_level,
                                    year_grad:year_grad,
                                    honor_received:honor_received,
                                    action:'add_educ'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#educ_data').DataTable().ajax.reload();
                                $('#modalEducationForm').modal('hide');
                               
                                }     
                            }); 
                });

                $(document).on('click', '#submit_update_children', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                        //validateData(); submit_update_educ
                        //var answer = validateData();
                            var fullname = $('#fullname_update').val();
                            var hidden_id = $('#hidden_id').val();
                            var dob = $('#dob_update').val();    

          
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    fullname:fullname, 
                                    dob:dob, 
                                    employeeiddb:employeeiddb,
                                    id:hidden_id,
                                    action:'submit_update_children'
                                },
                                success:function(data){
                                alert("Data Updated");

                                $('#children_data').DataTable().ajax.reload();
                                $('#modalEditChildrenForm').modal('hide');
                               
                                }     
                            }); 
                });



                $(document).on('click', '#submit_educ', function(){
                    var educid = $('#educid').val();
                    var level = $('#level_update').val();
                    var school_name = $('#school_name_update').val(); 
                    var educ = $('#educ_update').val();
                    var attended_from = $('#attended_from_update').val();       
                    var attended_to = $('#attended_to_update').val();
                    var highest_level = $('#highest_level_update').val();       
                    var year_grad = $('#year_grad_update').val();
                    var honor_received = $('#honor_received_update').val();
                    var employeeiddb = document.getElementById("empID").value;

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            educid:educid,
                            employeeiddb:employeeiddb,
                            level:level, 
                            school_name:school_name, 
                            educ:educ,
                            attended_from:attended_from,
                            attended_to:attended_to,
                            highest_level:highest_level,
                            year_grad:year_grad,
                            honor_received:honor_received,
                            action:'submit_educ'
                        },
                        success:function(data){
                        alert("Data Updated");

                        $('#educ_data').DataTable().ajax.reload();
                        //$('#modalEducationForm').modal('hide');
                        
                        }     
                    }); 
            
                });

            });

            function refreshPage() {
                    location.reload(true);
                }


            $(document).on('click', '#update_employee', function(){
                    var employeeiddb = document.getElementById("empID").value;

                    var empid                   = $('#employeeid').val();
                    var firstname               = $('#firstname').val();
                    var middlename              = $('#middlename').val();
                    var lastname                = $('#lastname').val();
                    var extension               = $('#extension').val();
                    var position                = $('#position').val();
                    var datehired               = $('#datehired').val();
                    var username                = $('#username').val();
                    var password                = $('#password').val();
                    var gender                  = $('#gender').val();
                    var civilstatus             = $('#civilstatus').val();

                    var profileid               = $('#profileid').val();
                    var dob                     = $('#dob').val();
                    var placeofbirth            = $('#placeofbirth').val();
                    var height                  = $('#height').val();
                    var weight                  = $('#weight').val();
                    var gsisno                  = $('#gsisno').val();
                    var pagibigno               = $('#pagibigno').val();
                    var phicno                  = $('#phicno').val();
                    var sssno                   = $('#sssno').val();
                    var tinno                   = $('#tinno').val();
                    var agencyemployeeno        = $('#agencyemployeeno').val();
                    var dual                    = $('#dual').val();
                    var filipino                = $('#filipino').val();
                    var birth                   = $('#birth').val();
                    var naturalization          = $('#naturalization').val();
                    var residentialaddress      = $('#residentialaddress').val();
                    var permanentaddress        = $('#permanentaddress').val();
                    var telephoneno             = $('#telephoneno').val();
                    var mobileno                = $('#mobileno').val();
                    var emailprofile            = $('#emailprofile').val();

                    var familyid                = $('#familyid').val();
                    var spouselastname          = $('#spouselastname').val();
                    var spousemiddlename        = $('#spousemiddlename').val();
                    var spousefirstname         = $('#spousefirstname').val();
                    var spouseextension         = $('#spouseextension').val();
                    var occupation              = $('#occupation').val();
                    var employername            = $('#employername').val(); 
                    var businessaddress         = $('#businessaddress').val();
                    var spousetelno             = $('#spousetelno').val();
                    var fathersurname           = $('#fathersurname').val();
                    var fatherfirstname         = $('#fatherfirstname').val();
                    var fathermiddlename        = $('#fathermiddlename').val();
                    var fatherext               = $('#fatherext').val();
                    var mothermaidenname        = $('#mothermaidenname').val();
                    var mothersurname           = $('#mothersurname').val();
                    var motherfirstname         = $('#motherfirstname').val(); 
                    var mothermiddlename        = $('#mothermiddlename').val();

                 //if(answer == 'N'){ //COMMENTED, USED FOR VALIDATION
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            employeeiddb:employeeiddb,
                            empid:empid,        
                            firstname:firstname,       
                            middlename:middlename,      
                            lastname:lastname,       
                            extension:extension,       
                            position:position,        
                            datehired:datehired,       
                            username:username,       
                            password:password,        
                            gender:gender,          
                            civilstatus:civilstatus,     
                            profileid:profileid,       
                            dob:dob,             
                            placeofbirth:placeofbirth,    
                            height:height,          
                            weight:weight,          
                            gsisno:gsisno,          
                            pagibigno:pagibigno,       
                            phicno:phicno,          
                            sssno:sssno,          
                            tinno:tinno,           
                            agencyemployeeno:agencyemployeeno,
                            dual:dual,            
                            filipino:filipino,        
                            birth:birth,           
                            naturalization:naturalization,  
                            residentialaddress:residentialaddress,
                            permanentaddress:permanentaddress,
                            telephoneno:telephoneno,     
                            mobileno:mobileno,       
                            emailprofile:emailprofile,    
                            familyid:familyid,        
                            spouselastname:spouselastname,  
                            spousemiddlename:spousemiddlename,
                            spousefirstname:spousefirstname, 
                            spouseextension:spouseextension,
                            occupation:occupation,      
                            employername:employername,    
                            businessaddress:businessaddress, 
                            spousetelno:spousetelno,     
                            fathersurname:fathersurname,   
                            fatherfirstname:fatherfirstname, 
                            fathermiddlename:fathermiddlename,
                            fatherext:fatherext,       
                            mothermaidenname:mothermaidenname,
                            mothersurname:mothersurname,   
                            motherfirstname:motherfirstname, 
                            mothermiddlename:mothermiddlename,
                            action:'update_employee'

                        },
                        success:function(data){
                        // $('#add_employee').modal('hide');
                        
                        //COMMENTED FOR THE MEAN TIME
                        // $('#user_data').DataTable().destroy();
                        //fetch_data();
                        alert("Data Updated");

                        //$('#addEmployeeForm').modal('hide');
                        }     
                    }); 
                    //}
              
            });


            $(document).on('click', '#cancel_employee', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var cancel_employee = "Success";

                    var empid = $('#employeeid').val();


                 //if(answer == 'N'){ //COMMENTED, USED FOR VALIDATION
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            
                            empid:empid, 
                            employeeiddb:employeeiddb,
                            action:'cancel_update'

                        },
                        success:function(data){
                        // $('#add_employee').modal('hide');
                        
                        //COMMENTED FOR THE MEAN TIME
                        // $('#user_data').DataTable().destroy();
                        //fetch_data();
                        //alert("Data Updated");

                        //$('#addEmployeeForm').modal('hide');
                        window.location.href="employee_detail";
                        }     
                    }); 
                    //}
            });



            $(document).on('click', '.delete_children', function(){
                     var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_children'

                        },
                        success:function(data){
                       
                        alert("Data Deleted");
                        $('#children_data').DataTable().ajax.reload();
                        }     
                    }); 

            });


            $(document).on('click', '.delete_educ', function(){
                     var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_education'

                        },
                        success:function(data){
                       
                        alert("Data Deleted");
                        $('#educ_data').DataTable().ajax.reload();
                        }     
                    }); 

            });


            $(document).on('click', '.update_children', function(){
                     var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                    //
                
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                            action:'fetch_single_children'

                        },
                        success:function(data){
                        var values = $.parseJSON(data);
                        //$('#modal_title').text('Edit Children Data');
                        //$('#add_children').text('Update Children Data');
                        //alert(values.fullname);
                       $('#employeeid_update').val(values.employeeid);
                        $('#fullname_update').val(values.fullname);
                        $('#hidden_id').val(values.hidden_id);
                        $('#dob_update').val(values.dob);
                    
                        $('#modalEditChildrenForm').modal('show');

                        //alert("Children Data Updated");
                       

                        
                        }     
                    }); 

            });



            $(document).on('click', '.update_educ', function(){
                    var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                    //
                
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                            action:'fetch_single_educ'

                        },
                        success:function(data){
                            var values = $.parseJSON(data);
                            $('#modal_title').text('Update Educational Background Data');
                            $('#add_education').text('Update Educational Background Children Data');
                            
                            //alert(values.fullname);
                            $('#educid').val(values.educid);
                            $('#level_update').val(values.level);
                            $('#school_name_update').val(values.school_name);
                            $('#educ_update').val(values.educ);
                            $('#attended_from_update').val(values.attended_from);
                            $('#attended_to_update').val(values.attended_to);
                            $('#highest_level_update').val(values.year_grad);
                            $('#year_grad_update').val(values.year_grad);
                            $('#honor_received_update').val(values.honor_received);

                            $('#modalEducationForm').modal('show');
                        
                        }     
                    }); 

            });

            //ELIGIBITILY UPDATE FRORM
            $(document).on('click', '.update_eligibility', function(){
                var id = $(this).data('id');
                var action_val =  document.getElementById('eligibility_action_id').value = 'UPDATE';
                var employeeiddb = document.getElementById("empID").value;
                
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    data:{
                        id:id, 
                        employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                        action:'fetch_single_eligibility'

                    },
                    success:function(data){
                        var values = $.parseJSON(data);
                        //$('#modal_title').text('Update Educational Background Data');
                        //$('#add_education').text('Update Educational Background Children Data');
                        

                        $('#eligibilityid').val(values.eligibilityid);
                        $('#eligibility_update').val(values.eligibility);
                        $('#rating_update').val(values.rating);
                        $('#date_of_exam_update').val(values.date_of_exam);
                        $('#place_of_exam_update').val(values.place_of_exam);
                        $('#license_no_update').val(values.license_no);
                        $('#license_date_update').val(values.license_date);


                        $('#modalUpdateEligibilityForm').modal('show');
                    
                    }     
                }); 

            });

            $(document).on('click', '#add_eligibility', function(){
                    var employeeiddb = document.getElementById("empID").value;

                        //validateData();
                        //var answer = validateData();
                            var eligibility = $('#eligibility').val();
                            var rating = $('#rating').val(); 
                            var date_of_exam = $('#date_of_exam').val();
                            var place_of_exam = $('#place_of_exam').val();       
                            var license_no = $('#license_no').val();
                            var license_date = $('#license_date').val();                        
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    eligibility:eligibility, 
                                    rating:rating, 
                                    date_of_exam:date_of_exam,
                                    place_of_exam:place_of_exam,
                                    license_no:license_no,
                                    license_date:license_date,
                                    action:'add_eligibility'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#civil_data').DataTable().ajax.reload();
                                $('#modalEligibilityForm').modal('hide');
                               
                                }     
                            }); 
                });


                $(document).on('click', '#submit_eligibility', function(){
                    var eligibilityid = $('#eligibilityid').val();
                    var eligibility = $('#eligibility_update').val();
                    var rating = $('#rating_update').val(); 
                    var date_of_exam = $('#date_of_exam_update').val();
                    var place_of_exam = $('#place_of_exam_update').val();       
                    var license_no = $('#license_no_update').val();
                    var license_date = $('#license_date_update').val();   

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            eligibilityid:eligibilityid,
                            employeeiddb:employeeiddb,
                            eligibility:eligibility, 
                            rating:rating, 
                            date_of_exam:date_of_exam,
                            place_of_exam:place_of_exam,
                            license_no:license_no,
                            license_date:license_date,
                            action:'submit_eligibility'
                        },
                        success:function(data){
                        alert("Data Updated");

                        $('#civil_data').DataTable().ajax.reload();
                        //$('#modalEducationForm').modal('hide');
                        
                        }     
                    }); 
            
                });


                // UPDATE WORK FRORM
            $(document).on('click', '.update_work', function(){
                var id = $(this).data('id');
                //var action_val =  document.getElementById('eligibility_action_id').value = 'UPDATE';
                var employeeiddb = document.getElementById("empID").value;
                
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    data:{
                        id:id, 
                        employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                        action:'fetch_single_work'

                    },
                    success:function(data){
                        var values = $.parseJSON(data);


                        $('#workid').val(values.workid);
                        $('#work_date_from_update').val(values.eligibility);
                        $('#work_date_to_update').val(values.rating);
                        $('#work_position_update').val(values.date_of_exam);
                        $('#work_company_update').val(values.place_of_exam);
                        $('#work_salary_update').val(values.license_no);
                        $('#work_salary_grade_update').val(values.license_date);
                        $('#work_status_update').val(values.license_no);
                        $('#work_govt_service_update').val(values.license_date);


                        $('#modalUpdateWorkForm').modal('show');
                    
                    }     
                }); 

            });

            $(document).on('click', '#add_work', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var work_date_from = $('#work_date_from').val();
                    var work_date_to = $('#work_date_to').val();
                    var work_position = $('#work_position').val(); 
                    var work_company = $('#work_company').val();
                    var work_salary = $('#work_salary').val();       
                    var work_salary_grade = $('#work_salary_grade').val();
                    var work_status = $('#work_status').val();  
                    var work_govt_service = $('#work_govt_service').val();                     
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    work_date_from:work_date_from, 
                                    work_date_to:work_date_to, 
                                    work_position:work_position,
                                    work_company:work_company,
                                    work_salary:work_salary,
                                    work_salary_grade:work_salary_grade,
                                    work_status:work_status,
                                    work_govt_service:work_govt_service,
                                    action:'add_work'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#work_data').DataTable().ajax.reload();
                                $('#modalWorkForm').modal('hide');
                               
                                }     
                            }); 
                });


                $(document).on('click', '#submit_work', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var workid = $('#workid').val();
                    var work_date_from = $('#work_date_from_update').val();
                    var work_date_to = $('#work_date_to_update').val();
                    var work_position = $('#work_position_update').val(); 
                    var work_company = $('#work_company_update').val();
                    var work_salary = $('#work_salary_update').val();       
                    var work_salary_grade = $('#work_salary_grade_update').val();
                    var work_status = $('#work_status_update').val();  
                    var work_govt_service = $('#work_govt_service_update').val();   

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            workid:workid,
                            employeeiddb:employeeiddb,
                            work_date_from:work_date_from, 
                            work_date_to:work_date_to, 
                            work_position:work_position,
                            work_company:work_company,
                            work_salary:work_salary,
                            work_salary_grade:work_salary_grade,
                            work_status:work_status,
                            work_govt_service:work_govt_service,
                            action:'submit_work'
                        },
                        success:function(data){
                        alert("Data Updated");

                        $('#work_data').DataTable().ajax.reload();
                        //$('#modalEducationForm').modal('hide');
                        
                        }     
                    }); 
            
                });

    </script>

</body>


</html>