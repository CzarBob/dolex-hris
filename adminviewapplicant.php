<?php

session_start();

include 'adminviewapplicant1.php';
if (isset($_POST['view'])) {


    $tin = $_POST['tin'];

    $connect = mysqli_connect("localhost", "root", "", "d0l310_aep");
    $viewquery = "SELECT * FROM `aep_user_details` JOIN aep_user_details_2 ON aep_user_details.tin = aep_user_details_2.tin JOIN aep_user_details_3 ON aep_user_details_2.tin = aep_user_details_3.tin JOIN aep_user_employment on aep_user_details_3.tin = aep_user_employment.tin JOIN aep_user_status ON aep_user_status.tin = aep_user_employment.tin WHERE aep_user_details.tin = '" . $tin . "'";
    $viewresults = mysqli_query($connect, $viewquery);

    while ($row = mysqli_fetch_assoc($viewresults)) {

        $_SESSION["tin"] = $row["tin"];
        $_SESSION["fname"] = $row["fname"];
        $_SESSION["mname"] = $row["mname"];
        $_SESSION["lname"] = $row["lname"];
        $_SESSION["nationality"] = $row["nationality"];
        $_SESSION["gender"] = $row["gender"];
        $_SESSION["marital_status"] = $row["marital_status"];
        $_SESSION["tin"] = $row["tin"];
        $_SESSION["b_date"] = $row["b_date"];
        $_SESSION["place_of_birth"] = $row["place_of_birth"];
        $_SESSION["application_type"] = $row["application_type"];
        $_SESSION["passport_no"] = $row["passport_no"];
        $_SESSION["place_issuance"] = $row["place_issuance"];
        $_SESSION["date_issuance"] = $row["date_issuance"];
        $_SESSION["expiration_date"] = $row["expiration_date"];
        $_SESSION["visa"] = $row["visa"];
        $_SESSION["visa_validity"] = $row["visa_validity"];
        $_SESSION["highest_educ"] = $row["highest_educ"];
        $_SESSION["course"] = $row["course"];
        $_SESSION["address_ph"] = $row["address_ph"];
        $_SESSION["contact_no"] = $row["contact_no"];
        $_SESSION["email_add"] = $row["contact_no"];
        $_SESSION["permanent_add_abroad"] = $row["permanent_add_abroad"];
        $_SESSION["position"] = $row["position"];
        $_SESSION["assignment"] = $row["assignment"];
        $_SESSION["name_of_company"] = $row["name_of_company"];
        $_SESSION["company_address"] = $row["company_address"];
        $_SESSION["company_contact"] = $row["company_contact"];
        $_SESSION["company_email"] = $row["company_email"];
        $_SESSION["gdrive_link"] = $row["gdrive_link"];
        $_SESSION["nature"] = $row["nature"];
        $_SESSION["aep_number"] = $row["aep_number"];
        $_SESSION["user_status"] = $row["user_status"];
        $_SESSION["date_created"] = $row["date_created"];
        $_SESSION["date_approved"] = $row["date_approved"];





        # code...
    }
}








include 'adminlogout.php';






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/AEP_icon.png" rel="icon">
    <title>AEP - Admin Applicant Viewer</title>

    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, AEP</span>
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
                        <input type="hidden" name="tin" value="<?php echo $_SESSION["tin"]; ?>">



                        <!-- Pending Requests Card Example -->

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">I. Personal Data</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="col-md-12">

                                    </div>
                                    <div class="col-md-12">

                                        <table class=" table">

                                            <tr>
                                                <td colspan="1" style="width: 10%;"><b>Full Name:</b> </td>
                                                <td colspan="3" style="width: 30%;"><?php echo $_SESSION['fname'];  ?></td>
                                                <td colspan="2" style="width: 30%;"><?php echo $_SESSION['mname']; ?></td>
                                                <td colspan="2" style="width: 30%;"><?php echo $_SESSION['lname']; ?></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 10%;"><b>Nationality:</b> </td>
                                                <td style="width: 10%;"><?php echo $_SESSION['nationality']; ?></td>
                                                <td style="width: 10%;"><b>Sex:</b></td>
                                                <td style="width: 3%;"><?php echo $_SESSION['gender']; ?></td>
                                                <td style="width: 12%;"><b>Marital Status:</b></td>
                                                <td style="width: 10%;"><?php echo $_SESSION['marital_status']; ?></td>
                                                <td style="width: 5%;"><b>TIN:</b></td>
                                                <td style="width: 15%;"><?php echo $_SESSION['tin']; ?></td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><b>Date of Birth:</b></td>
                                                <td colspan="2"><?php echo $_SESSION['b_date']; ?></td>
                                                <td colspan="2"><b>Place of Birth:</b></td>
                                                <td colspan="2"><?php echo $_SESSION['place_of_birth']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Passport No.:</b></td>
                                                <td colspan="2"><?php echo $_SESSION['passport_no']; ?></td>
                                                <td colspan="2"><b>Place of Issuance:</b></td>
                                                <td><?php echo $_SESSION['place_issuance']; ?></td>
                                                <td><b>Issuance Date:</b></td>
                                                <td><?php echo $_SESSION['date_issuance']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><b>Expiration Date: </b></td>
                                                <td><?php echo $_SESSION['expiration_date']; ?></td>
                                                <td><b>Visa:</b></td>
                                                <td><?php echo $_SESSION['visa']; ?></td>
                                                <td colspan="2"><b>Visa Validity:</b></td>
                                                <td><?php echo $_SESSION['visa_validity']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><b>Highest Educational Attainment: </b></td>
                                                <td><?php echo $_SESSION['highest_educ']; ?></td>
                                                <td colspan="1"><b>Course of Study:</b></td>
                                                <td colspan="3"><?php echo $_SESSION['course']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 20%;"><b>Address in the Philippines: </b> </td>
                                                <td colspan="6" style="width: 80%;"><?php echo $_SESSION['address_ph']; ?></td>

                                            </tr>
                                            <tr>
                                                <td colspan="2"><b>Contact Number:</b></td>
                                                <td colspan="2"><?php echo $_SESSION['contact_no']; ?></td>
                                                <td colspan="2"><b>Email Address:</b></td>
                                                <td colspan="2"><?php echo $_SESSION['email_add']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 20%;"><b>Permanent Address Abroad: </b> </td>
                                                <td colspan="6" style="width: 80%;"><?php echo $_SESSION['permanent_add_abroad']; ?></td>

                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Application Details</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-700"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <div class="col-md-12">
                                        <table class=" table">
                                            <tr>
                                                <td style="width: 50%;"><b>Date Created :</b></td>
                                                <td style="width: 50%;"><?php echo $_SESSION['date_created']; ?></td>
                                            </tr>
                                            <tr>

                                                <td style="width: 50%;"><b>Application Type:</b></td>
                                                <td style="width: 50%;"><?php echo $_SESSION['application_type']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%;"><b>Application Status:</b></td>
                                                <td style="width: 50%;"><?php echo $_SESSION['user_status']; ?></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 50%;"><b>Application Status:</b></td>
                                                <td style="width: 50%;"><a href="<?php echo $_SESSION['gdrive_link']; ?>" target="_blank">GOOGLE DRIVE LINK</a></td>

                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="2"><button class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#remarks">Remarks</button></td>


                                            </tr>
                                            <tr>

                                                <td class="text-center" colspan="2"><button class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#foreval">For Evaluation</button></td>


                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="2"><button class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#approve">Approve</button></td>



                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="2"><button class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#deny">Reject</button></td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">II. Present Employment</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="col-md-12">

                                    </div>
                                    <div class="col-md-12">

                                        <table class=" table">

                                            <tr>
                                                <td style="width: 10%;"><b>Position:</b> </td>
                                                <td style="width: 20%;"><?php echo $_SESSION['position'];  ?></td>
                                                <td style="width: 15%;"><b>Place/s of Assignment:</b></td>
                                                <td style="width: 30%;"><?php echo $_SESSION['assignment']; ?></td>

                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 20%;"><b>Name of Compnany/Employer</b></td>
                                                <td colspan="2" style="width: 80%;"><?php echo $_SESSION['name_of_company']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="width: 20%;"><b>Address of Company/Employer:</b></td>
                                                <td colspan="2" style="width: 80%;"><?php echo $_SESSION['company_address']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%;"><b>Contact Number:</b> </td>
                                                <td style="width: 20%;"><?php echo $_SESSION['position'];  ?></td>
                                                <td style="width: 15%;"><b>Email Address:</b></td>
                                                <td style="width: 30%;"><?php echo $_SESSION['assignment']; ?></td>

                                            </tr>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>



                </div>
                <!-- /.container-fluid -->

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



    <!-- Modal -->
    <div class="modal fade" id="deny" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>Deny Applicant?</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="admindashboard.php" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>State Remarks:</b></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks1" placeholder="State Here"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="hidden" name="tin" value="<?php echo $_SESSION['tin']; ?>">

                        <input type="submit" class="btn btn-danger" value="YES" name="deny">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>Approve Applicant?</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="admindashboard.php" method="post">
                    <div class="modal-body">
                        <b>Update AEP Number:</b>
                        <input type="text" class="form-control" placeholder="update AEP Number" name="aep">
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>State Remarks:</b></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks1" placeholder="State Here"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="hidden" name="tin" value="<?php echo $_SESSION['tin']; ?>">

                        <input type="submit" class="btn btn-primary" value="YES" name="approved">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="foreval" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>FOR EVALUATION</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="admindashboard.php" method="post">
                    <div class="modal-body">

                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>State Remarks:</b></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks1" placeholder="State Here"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="hidden" name="tin" value="<?php echo $_SESSION['tin']; ?>">

                        <input type="submit" class="btn btn-primary" value="submit" name="foreval">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="remarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>Remarks</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="admindashboard.php" method="post">
                    <div class="modal-body">

                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>State Remarks:</b></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks1" placeholder="State Here"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="hidden" name="tin" value="<?php echo $_SESSION['tin']; ?>">

                        <input type="submit" class="btn btn-primary" value="submit" name="foreval">
                    </div>
                </form>
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

</body>


</html>