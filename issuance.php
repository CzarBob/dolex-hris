<?php
include "dbConnection.php";
session_start();
if ($_SESSION['username'] == ""){
  header("Location: admin");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/AEP_icon.png" rel="icon">
    <title>Reports</title>

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
                <div class="sidebar-brand-text mx-3">DOLE-X HRIS</div>
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
                <!--<a class="nav-link collapsed" href="main" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw 	fas fa-home"></i>
                    <span>Return OLD</span>
                </a>-->
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

                        <!-- Pending Requests Card Example -->

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                        <span id="message"></span>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                  <h6 class="m-0 font-weight-bold text-primary">REGIONAL ISSUANCE</h6>
                                  
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    
                                <div class="col-md-12">
                                  </div>
                                    <div class="col-md-12">
      
                                      <table class=" table">
                                          <tr>
                                                <td style="width: 100%;" colspan="2" style = "align: center"><button  style="width: 100%;" class="btn btn-primary" id = "generate_leave_balance">    Generate Report </button></td> 
                                                                                      
                                            </tr>  
                                            
                                      </table>  
                                    </div>  
                                                                       
                                </div>
                            </div>
                        </div>
                         
                            
                           <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                               
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                  <h6 class="m-0 font-weight-bold text-primary">Generate Employee Data</h6>
                                  <!--<button class="btn btn-info update_family_background" class="update_family_background"> Update Family Background </button>-->
                                </div>
                                
                                <div class="card-body">
                                  <div class="col-md-12">
                                  </div>

                                  
                                  <div class="form-row">
                                   
                                  <div class="form-group col-md-2">
                                      <label for="inputCity">Office</label>
                                      <select class="custom-select my-1 mr-sm-2" id="office" name="office" >
                                        <option value='NA' selected>Choose...</option>
                                        <option value="RO">REGIONAL OFFICE</option>
                                        <option value="CDOFO">CAGAYAN DE ORO FIELD OFFICE</option>
                                        <option value="BFO">BUKIDNON FIELD OFFICE</option>
                                        <option value="CFO">CAMIGUIN FIELD OFFICE</option>
                                        <option value="LDNFO">LANAO DEL NORTE FIELD OFFICE</option>
                                        <option value="MISOCCFO">MISAMIS OCCIDENTAL FIELD OFFICE</option>
                                        <option value="MISORFO">MISAMIS ORIENTAL FIELD OFFICE</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label for="inputZip">Division</label>
                                      <select class="custom-select my-1 mr-sm-2" id="division" name="division" >
                                        <option value="NA" selected>Choose...</option>
                                        <option value="TSSD">TSSD</option>
                                        <option value="IMSD">IMSD</option>
                                        <option value="MALSU">MALSU</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-row"> 
                                  <div class="form-group col-md-2">
                                      <label for="inputCity">Gender</label>
                                      <select class="custom-select my-1 mr-sm-2" id="gender" name="gender">
                                        <option value='NA' selected>Choose...</option>
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>

                                      </select>
                                    </div>
                                  </div>
                                  
                                    <div class="col-md-12">
     
                                       <table class=" table">
                                           <tr>
                                                <td style="width: 100%;" colspan="2" style = "align: center"><button  style="width: 100%;" class="btn btn-primary" id = "generate_employee_record">    Generate Report </button></td> 
                                                                                       
                                            </tr>  
                                            
                                      </table>  
                                    </div>         
                         

                                   

                                  </div>
                                </div>
                            </div>
                        </div> 
                    <!-- END OF FAMILY BACKGROUND FORM -->

            
                                <!-- END OF TAB CONTENT -->
                            </div>
                        </div>
                        <!-- UPDATE OR CANCEL SECTION -->
                        
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">                                
                                <!-- Card Body -->                               
                                    <div class="col-md-12">
     <!--
                                       <table class=" table">
                                           <tr>
                                                <td style="width: 100%;" colspan="2" style = "align: center"><button  style="width: 100%;" class="btn btn-primary" id = "update_employee">     Update Employee Details  </button></td> 
                                                                                       
                                            </tr>  
                                            <tr>
                                           
                                                <td style="width: 100%;"  colspan="2" style = "align: left"><button  style="width: 100%;" class="btn btn-primary" id = "cancel_employee">     Cancel  </button></td>                                               
                                            </tr> 
                                      </table>  -->
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



    <!-- GENERATE DATA FORM -->
    <div class="modal fade" id="reportForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold" id="modal_title">Generate Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form34">Office</label>
              <label for="inputCity">Office</label>
                <select class="custom-select my-1 mr-sm-2" id="office" name="office" disabled>
                  <option value='NA' selected>Choose...</option>
                  <option value="RO">REGIONAL OFFICE</option>
                  <option value="CDOFO">CAGAYAN DE ORO FIELD OFFICE</option>
                  <option value="BFO">BUKIDNON FIELD OFFICE</option>
                  <option value="CFO">CAMIGUIN FIELD OFFICE</option>
                  <option value="LDNFO">LANAO DEL NORTE FIELD OFFICE</option>
                  <option value="MISOCCFO">MISAMIS OCCIDENTAL FIELD OFFICE</option>
                  <option value="MISORFO">MISAMIS ORIENTAL FIELD OFFICE</option>
                </select>
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Division</label>
              <select class="custom-select my-1 mr-sm-2" id="division" name="division" disabled>
                <option value="NA" selected>Choose...</option>
                <option value="TSSD">TSSD</option>
                <option value="IMSD">IMSD</option>
                <option value="MALSU">MALSU</option>
              </select>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-primary" id = "add_children">Generate Data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
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


  
    <!-- DATA SUBMITTED  Modal-->
    <div class="modal fade" style= "z-index: 2001;" id="dataSubmittedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Submitted</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!--<a class="btn btn-primary" href="logout.php">Logout</a> -->
        <div class="modal-body">Data Submitted Successfully</div>
        <div class="modal-footer">
          <!--<button class="btn btn-primary" id="submit_personal_details">Confirm</button>-->
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Confirm Personal details Modal-->
  <div class="modal fade" style= "z-index: 2000;" id="confirmPersonalDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Update Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!--<a class="btn btn-primary" href="logout.php">Logout</a> -->
        <div class="modal-body">Would you like to proceed with the submission of data?</div>
        <div class="modal-footer">
          <!--<a class="btn btn-primary" href="logout">Confirm</a>-->
          <button class="btn btn-primary" id="submit_personal_details" data-dismiss="modal">Confirm</button>
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
    <script type="text/javascript" src="report_main.js"></script>

    

</body>


</html>