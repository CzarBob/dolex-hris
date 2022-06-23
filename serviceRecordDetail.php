<?php
include "dbConnection.php";
session_start();
if ($_SESSION['username'] == ""){
  header("Location: admin");
  exit;
}

include 'serviceRecordDetail_load_query.php';
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
    <title>Employee's Service Record Details</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main">
                <div class="sidebar-brand-icon">
                    <img src="assets/img/AEP_icon.png" alt="" width="35px" height="35px">
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

                    <!-- Page Heading -->


                    <!-- Content Row -->
                    <div class="row">
                        <!-- Employee ID database-->
                        <input type="hidden" name="empID" id="empID" value="<?php echo $_GET['id']; ?>">
                        <input type="hidden" name="loginID" id="loginID" value="<?php echo $_SESSION['usernameid']; ?>">
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
                                                <label for="inputAddress">Employee ID</label>
                                                <input type="text" class="form-control" id="employeeid" placeholder="Ex. CBTZ200116" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputAddress">Position</label>
                                                <input  type="text" class="form-control" id="position" placeholder="Ex. Labor Employment Officer I" disabled>
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
                                        </div>
                                    </div>
                                </div>


                                <!-- Area Chart -->
                                <div class="col-xl-12 col-lg-7">
                                    <div class="card shadow mb-4">
                                    <span id="message"></span>
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Service Record</h6>
                                           
                                            <div>
                                              <button class="btn btn-info generateReport" name='generateReport' id= "generateReport" > Generate Excel File </button>
                                              <a data-toggle="modal" data-target="#modalServiceRecordForm" > Add Service Record</a>
                                             
                                            </div>
                                        </div>

                                        <!-- Card Body -->
                                        <div class="card-body">
                                          <div class="table-responsive">
                                              <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="service_record_data" width="100%" cellspacing="0">
                                                  <thead class = "text-primary">
                                                      <tr>
                                                          <th data-column-id="service_from">SERVICE FROM</th>
                                                          <th data-column-id="service_to">SERVICE TO</th>
                                                          <th data-column-id="designation">DESIGNATION</th>
                                                          <th data-column-id="status">STATUS</th>
                                                          <th data-column-id="salary">SALARY</th>
                                                          <th data-column-id="office">OFFICE</th>
                                                          <th data-column-id="branch">BRANCH</th>
                                                          <th data-column-id="abs">ABS</th>
                                                          <th data-column-id="separation_date">SEPARATION DATE</th>
                                                          <th data-column-id="amount">AMOUNT RECEIVED</th>
                                                          <th data-column-id="details">DETAILS</th>

                                                          <th >ACTION</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tfoot class = "text-primary">
                                                      <tr>
                                                      <th data-column-id="fullName">SERVICE FROM</th>
                                                          <th>SERVICE TO</th>
                                                          <th>DESIGNATION</th>
                                                          <th>STATUS</th>
                                                          <th>SALARY</th>
                                                          <th>OFFICE</th>
                                                          <th>BRANCH</th>
                                                          <th>ABS</th>
                                                          <th>SEPARATION DATE</th>
                                                          <th>AMOUNT RECEIVED</th>
                                                          <th>DETAILS</th>
                                                          <th>ACTION</th>
                                                        
                                                      </tr>
                                                  </tfoot>
                                              </table>
                                          </div>               
                                        </div>
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
                                           
                                                <td style="width: 100%;"  colspan="2" style = "align: left"><button  style="width: 100%;" class="btn btn-primary" id = "cancel_sr">     Close  </button></td>                                               
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


    <!-- UPDATE SERVICE RECORD FORM -->
    <div class="modal fade" id="modalUpdateServiceRecordForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Update Service Record</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">


            <div class="md-form mb-5">
              <input type="hidden" name="srid" id = "srid" class="form-control validate" required> 
              <label data-error="wrong" data-success="right" for="form34">Service From</label>
              <input type="date" name="service_from_update" id = "service_from_update" class="form-control validate" required>
           
            </div>
            <div class="md-form mb-5">
            
              <label data-error="wrong" data-success="right" for="form34">Service To</label>
              <input type="date" name="service_to_update" id = "service_to_update" class="form-control validate" required>
           
            </div>

            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Designation</label>
              <input type="text" style="text-transform: uppercase;" name="designation_update" id = "designation_update" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Status</label>
              <input type="text" style="text-transform: uppercase;" name="status_update" id = "status_update" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Salary</label>
              <input type="text" style="text-transform: uppercase;" name="salary_update" id = "salary_update" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Office</label>
              <input type="text" style="text-transform: uppercase;" name="office_update" id = "office_update" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Branch</label>
              <input type="text" style="text-transform: uppercase;" name="branch_update" id = "branch_update" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">ABS</label>
              <input type="text" style="text-transform: uppercase;" name="abs_update" id = "abs_update" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Separation Date</label>
              <input type="date" name="separation_date_update" id = "separation_date_update" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Amount Received</label>
              <input type="text" style="text-transform: uppercase;" name="amount_received_update" id = "amount_received_update" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Details</label>
              <!--<input type="text" name="details_update" id = "details_update" class="form-control validate" required>-->
              <textarea style="text-transform: uppercase;" class="form-control" id="details_update" name="details_update">Please input details
              </textarea>
            </div>

            <div class="modal-footer d-flex justify-content-center">
          
              <button class="btn btn-primary" id = "submit_update_service_record">Update data</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- ADD SERVICE RECORD FORM -->
    <div class="modal fade" id="modalServiceRecordForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Add Service Record</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">


            <div class="md-form mb-5">
           
              <label data-error="wrong" data-success="right" for="form34">Service From</label>
              <input type="date" name="service_from" id = "service_from" class="form-control validate" required>
           
            </div>
            <div class="md-form mb-5">
            
              <label data-error="wrong" data-success="right" for="form34">Service To</label>
              <input type="date" name="service_to" id = "service_to" class="form-control validate" required>
           
            </div>

            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Designation</label>
              <input type="text" style="text-transform: uppercase;" name="designation" id = "designation" class="form-control validate"  required>
             
            </div>
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">Status</label>
              <input type="text" style="text-transform: uppercase;" name="status" id = "status" class="form-control validate" required>
             
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Salary</label>
              <input type="text" style="text-transform: uppercase;" name="salary" id = "salary" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Office</label>
              <input type="text" style="text-transform: uppercase;" name="office" id = "office" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Branch</label>
              <input type="text" style="text-transform: uppercase;" name="branch" id = "branch" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">ABS</label>
              <input type="text" style="text-transform: uppercase;" name="abs" id = "abs" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Separation Date</label>
              <input type="date" name="separation_date" id = "separation_date" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Amount Received</label>
              <input type="text" style="text-transform: uppercase;" name="amount_received" id = "amount_received" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form29">Details</label>
              <!--<input type="text" name="details" id = "details" class="form-control validate" required>-->
              <textarea class="form-control" style="text-transform: uppercase;" placeholder="Provide Details.." id="details" name="details"  >
              </textarea>
            </div>

            <div class="modal-footer d-flex justify-content-center">
          
            <button class="btn btn-primary" id = "add_service_record">Add data</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>

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
          <a class="btn btn-primary" href="logout">Logout</a> 
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
    <script type="text/javascript" src="serviceRecordDetail.js"></script>

    

</body>


</html>