<?php

session_start();

//include 'adminviewapplicant1.php';
if (isset($_POST['id'])) {


    $id = $_POST['id'];

    $connect = mysqli_connect("localhost", "root", "", "citizens_charter");
    //$viewquery = "SELECT * FROM `aep_user_details` JOIN aep_user_details_2 ON aep_user_details.tin = aep_user_details_2.tin JOIN aep_user_details_3 ON aep_user_details_2.tin = aep_user_details_3.tin JOIN aep_user_employment on aep_user_details_3.tin = aep_user_employment.tin JOIN aep_user_status ON aep_user_status.tin = aep_user_employment.tin WHERE aep_user_details.tin = '" . $tin . "'";
    $viewquery = "SELECT * FROM `citizen_charter`  WHERE ID = '" . $id . "'";
    $viewresults = mysqli_query($connect, $viewquery);

    while ($row = mysqli_fetch_assoc($viewresults)) {

        $_SESSION["id"] = $row["ID"];
        $_SESSION["firstname"] = $row["FIRSTNAME"];
        $_SESSION["middlename"] = $row["MIDDLENAME"];
        $_SESSION["lastname"] = $row["LASTNAME"];

        # code...
    }
}


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
                                    <div class="col-md-12">
    
                                       <table class=" table">
                                            <tr>
                                                <td colspan="1" style="width: 10%;"><b>Full Name:</b> </td>
                                                <td colspan="2" style="width: 30%;"><input type="text" name="employeeid" id = "employeeid" class="form-control validate" required></td> 
                                                <td style="width: 20%;"><input type="text" name="firstname" id = "firstname" class="form-control validate" required></td> 
                                                <td colspan="2" style="width: 25%;"><input type="text" name="middlename" id = "middlename" class="form-control validate" required></td>
                                                <td style="width: 15%;"><input type="text" name="lastname" id = "lastname" class="form-control validate" required></td> 
                                            </tr>
                                           <!-- <tr>
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
                                                <td colspan="2"></td>
                                                <td colspan="2"></td>
                                                <td colspan="2"></td>
                                                <td colspan="2" style = "align: left"><button class="btn btn-primary" id = "update_employee">     Update Employee Details  </button></td>                                                
                                            </tr>    -->
                                      </table> 
                                    </div>
                                </div>
                            </div>
                        </div>



                            





                  <!--
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
     
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
                        </div> -->

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
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Work Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Trainings</a>
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
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...asdasdasd</div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.asdasdasd..</div>
                                </div>
                            




                          
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
            <h4 class="modal-title w-100 font-weight-bold">Add Children</h4>
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
              <input type="text" name="dob" id = "dob" class="form-control validate" required>
             
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-primary" id = "add_children">Add data</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
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

                
                function fetch_single() {
                        var employeeiddb = document.getElementById("empID").value;
                        //alert(employeeid);
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
                                    $('#employeeid').val(data.employeeid);
                                    $('#firstname').val(data.firstname);
                                    $('#middlename').val(data.middlename);
                                    $('#lastname').val(data.lastname);
                                    //fetch_children_data();
                                    //alert(data);
                                    //$('#action').val('Edit');
                                    //$('#submit_button').val('Edit');
                                    //$('#hidden_id').val(hidden_id);
                                }
                            });

                            fetch_children_data();
                }  



                


                $(document).on('click', '#add_children', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                        //validateData();
                        //var answer = validateData();
                            var fullname = $('#fullname').val();
                            var dob = $('#dob').val();    

          
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
                                //setInterval('refreshPage()', 5000);
                                $('#children_data').DataTable().ajax.reload();
                                $('#modalChildrenForm').modal('hide');
                               
                                }     
                            }); 
                });
            });

            function refreshPage() {
                    location.reload(true);
                }


            $(document).on('click', '#update_employee', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                //validateData();
                //var answer = validateData();
                    var empid = $('#employeeid').val();
                    var firstname = $('#firstname').val();
                    var middlename = $('#middlename').val();
                    var lastname = $('#lastname').val();
                 //if(answer == 'N'){ //COMMENTED, USED FOR VALIDATION
                    $.ajax({
                        url:"update_employee",
                        method:"POST",
                        data:{
                            add_employee:add_employee,
                            empid:empid, 
                            firstname:firstname, 
                            middlename:middlename, 
                            lastname:lastname,
                            employeeiddb:employeeiddb,
                            action:'add_children'

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
<<<<<<< HEAD
                    var add_employee = "Success";
=======
                    var cancel_employee = "Success";
>>>>>>> 7419c5008ca14f17674ae85ea27228438af1bed6
                //validateData();
                //var answer = validateData();
                    var empid = $('#employeeid').val();
                    var firstname = $('#firstname').val();
                    var middlename = $('#middlename').val();
                    var lastname = $('#lastname').val();
<<<<<<< HEAD
=======

                    

                

>>>>>>> 7419c5008ca14f17674ae85ea27228438af1bed6
                 //if(answer == 'N'){ //COMMENTED, USED FOR VALIDATION
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            add_employee:add_employee,
                            empid:empid, 
                            firstname:firstname, 
                            middlename:middlename, 
                            lastname:lastname,
                            employeeiddb:employeeiddb,
<<<<<<< HEAD
                            action:'cancel_employee'
=======
                            action:'cancel_update'
>>>>>>> 7419c5008ca14f17674ae85ea27228438af1bed6

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
<<<<<<< HEAD
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

                        
                        }     
                    }); 

=======
              
>>>>>>> 7419c5008ca14f17674ae85ea27228438af1bed6
            });




           

    </script>

</body>


</html>