<?php 
session_start();
include "dbConnection.php";

if ($_SESSION['username'] == ""){
  header("Location: admin");
  exit;
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DOLE HRIS</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="icon" href="img/dolelogogs.png">
  <script type="text/javascript" src = "js/date_time.js"></script>

</head>
<style type="text/css">

</style>
<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main">
        <img class = "icon" src = "img/dolelogogs.png" width = "60"></img>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <!--<a class="nav-link" href = "<?php echo $page; ?>"> -->
        <a class="nav-link" href="main">
          <i class="fas fa-fw fa-lg fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="employee_detail">
          <i class="fas fa-fw fa-lg fa-check-square"></i>
          <span>Employee List</span>
        </a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="serviceRecord">
          <i class="fas fa-fw fa-lg fa-check-square"></i>
          <span>Service Record</span>
        </a>
      </li>
      
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <div class="d-none d-md-inline-block div-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
           <!-- <h2><?php// echo $_SESSION['received_by'] . " Department";?></h2>-->
          </div>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
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
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php //echo $_SESSION['username'] ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
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
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Employee Details</h6>
             
              <a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#addEmployeeForm" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Add Employee</a>
              <!--<a class = "d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#dateRangeModal" aria-expanded="false"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Report</a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered nowrap dt-responsive nowrap dataTables" id="user_data" width="100%" cellspacing="0">
                  <thead class = "text-primary">
                  <tr>
                      <th>EMPLOYEE ID</th>
                      <th>FIRST NAME</th>
                      <th>MIDDLE NAME</th>
                      <th>LAST NAME</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tfoot class = "text-primary">
                    <tr>
                      <th>Process Name</th>
                      <th>Rating</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Comment</th>
                    </tr>
                  </tfoot>
                </table>
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
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
    </div>

  </div>
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
        <!--            <a class="btn btn-primary" href="logout.php">Logout</a> -->
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="logout">Logout</a> 
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
    <div id="add_record" class="modal" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
     
     
      <!-- Modal content-->
        <div class="modal-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h5 class="modal-title text-dark">Add Record</h5>
          <h5 id="date_time"></h5>
        </div>
        <div class="modal-body text-dark">
          <div class = "row">
            <div class = "col-6">
              <div class = "form-group">
                <input type="hidden" name="received_by" id = "received_by" value = "<?php echo $_SESSION['received_by'] ?>">
                <label>Province</label>
                <select class="custom-select" id = "province" name = "province">
                  <option hidden>Province</option>
                  <option value="Bukidnon">Bukidnon</option>
                  <option value="Camiguin">Camiguin</option>
                  <option value="Cagayan de Oro">Cagayan de Oro</option>
                  <option value="Lanao del Norte">Lanao del Norte</option>
                  <option value="Misamis Occidental">Misamis Occidental</option>
                  <option value="Misamis Oriental">Misamis Oriental</option>
                </select>
              </div>
              <div class = "form-group">
                <label>Track Number</label>
                <input type="text" id = "track_num" name = "track_num" class="form-control" readonly>
              </div>
              <div class = "form-group">
                <label>Type of document</label>
                <input type="text" class = "form-control" name="type_docu" id = "type_docu">
              </div>
            </div>
            <div class = "col-6">
              <div class="form-group">
                <label for="comment">Description:</label>
                <textarea class="form-control" rows="5" id="description" name = "description" maxlength="100"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id = "add_docu">Add</button>
        <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
       </div>
      </div>
    </div>
  
<div class="modal" id="release_mod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id = "data">

      </div>
    </div>
  </div>
<div class="modal fade" id="record_added" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Record Successfully Added!</div>
      <div class="modal-footer">
        <button class="btn btn-success" type="button" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="record_released" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Record Successfully Released!</div>
      <div class="modal-footer">
        <button class="btn btn-success" type="button" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<!-- Date range Modal -->
<div class="modal" tabindex="-1" id="dateRangeModal" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Generate Report</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-dark">
        <form action="export.php" method="post">

          <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">From:</label>
            <div class="col-10">
              <input class="form-control" type="date"  id="fromDate" name="fromDate">
            </div>
          </div>

          <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">To:</label>
            <div class="col-10">
              <input class="form-control" type="date"  id="toDate" name="toDate">
            </div>
          </div>
          <!--<button class="btn btn-primary" type="submit">Generate</button>
        </form> -->
        <div class="modal-footer">
        <!-- <b style = "font-size: 18px;"><button class="btn btn-primary" id ="generateReport">Generate Report</button></b>-->
          <!-- <button class="btn btn-primary" id = "generateReport">Add</button> -->
          <!-- <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button> -->
          <button class="btn btn-primary" type="submit">Generate</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Close</button>
        </div>

      
        </form>
      </div>
    </div>
  </div>  
</div>
<!-- End Date Range Modal -->

 <!-- ADD EMPLOYEE FORM -->
 <div class="modal fade bd-example-modal-lg" id="addEmployeeForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Add Employee</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
       
            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">*Employee ID</label>
              <input type="test" name="empid" id = "empid" class="form-control validate" required>
             
            </div>


            <div class="md-form mb-5">
            
              <label data-error="wrong" data-success="right" for="form34">*First Name</label>
              <input type="text" name="firstname" id = "firstname" class="form-control validate" required>
           
            </div>

            <div class="md-form mb-5">
            
              <label data-error="wrong" data-success="right" for="form34">*Middle Name</label>
              <input type="text" name="middlename" id = "middlename" class="form-control validate" required>
           
            </div>

            <div class="md-form mb-5">
            
              <label data-error="wrong" data-success="right" for="form34">*Last Name</label>
              <input type="text" name="lastname" id = "lastname" class="form-control validate" required>
           
            </div>

            <!--
            
            <div class="md-form mb-5">
            
              <label data-error="wrong" data-success="right" for="form34">*Email Address</label>
              <input type="email" name="email" id = "email" class="form-control validate" required>
         
            </div>

            <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">*Postion</label>
              <input type="text" name="position" id = "position" class="form-control validate" required>
             
            </div>

             <div class="md-form mb-5">
       
              <label data-error="wrong" data-success="right" for="form29">*Date Hired</label>
              <input type="date" name="datehired" id = "datehired" class="form-control validate" required>
             
            </div>


            <div class="md-form mb-5"> -->
    
              <!--<input type="hidden" name="received_by" id = "received_by" value = "<?php echo $_SESSION['received_by'] ?>"> -->
              <!--  <label>Province</label>
                <select class="custom-select" id = "province" name = "province">
                  <option hidden>Province</option>
                  <option value="RO">Regional Office</option>
                  <option value="Bukidnon">Bukidnon</option>
                  <option value="Camiguin">Camiguin</option>
                  <option value="Cagayan de Oro">Cagayan de Oro</option>
                  <option value="Lanao del Norte">Lanao del Norte</option>
                  <option value="Misamis Occidental">Misamis Occidental</option>
                  <option value="Misamis Oriental">Misamis Oriental</option>
                </select>
              
            </div>

            <div class="md-form mb-5">
              
              <label data-error="wrong" data-success="right" for="form29">Sick Leave Credit</label>
              <input type="text" name="slcredit" id = "slcredit" class="form-control validate" required>
              
            </div>

            <div class="md-form mb-5">
              
              <label data-error="wrong" data-success="right" for="form29">Vacation Leave Credit</label>
              <input type="text" name="vlcredit" id = "vlcredit" class="form-control validate" required>
              
            </div>  -->

          </div>
          <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-primary" id = "add_employee">Send</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>
      </div>
    </div>


  <style type="text/css">
    .table th, .table td { 
    max-width: 200px; 
    min-width: 70px; 
    overflow: hidden; 
    text-overflow: ellipsis; 
    white-space: nowrap; 
  }
    .fas {
      cursor: pointer;
    }
    
  </style>
   <script type="text/javascript">window.onload = date_time('date_time');</script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>

  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
  <script>


  $(document).ready(function(){
    
    fetch_data();
   
    function fetch_data(){
    //alert('pota');
     var dataTable = $('#user_data').DataTable({
     /* "processing" : true,
      "serverSide" : true,
      "columnDefs": [{ "orderable": false, "targets":[0,1] }],
      "order" : [],*/
      "ajax" : {
       url:"dashboard_query.php",
       type:"POST"
      }
     });
    }  
  });



  $(document).ready(function(){




  $('#generateReport').click(function(){
     var fromDate = $('#fromDate').val();
     var toDate = $('#toDate').val();

    alert(fromDate);
     if(fromDate!="" && toDate!=""){
     $.ajax({
      url:"export",  
      method:"post",  
      data:{
        export:"export",
        fromDate:fromDate,
        toDate:toDate
        },
      success:function(response){
       /* if(response=="success"){
            window.location.href="index";
        }
        if(response=="others"){
            window.location.href="admin";
        }
        if(response=="fail"){
          $('#error_login').modal('show');
        }*/
        $('#dateRangeModal').modal('hide');
      }
    });  
   }
   else{
    $('#error_blank').modal('show');
   }
  }); 
}); 


$(document).on('click', '#viewEmployee2', function(){
          var add_employee = "Success";
          //validateData();
          //var answer = validateData();  
       //if(answer == 'N'){ //COMMENTED, USED FOR VALIDATION
              $.ajax({
                url:"viewEmployee",
                method:"POST",
                data:{
                  add_employee:add_employee,
                  empid:empid, 
                  firstname:firstname, 
                  middlename:middlename, 
                  lastname:lastname/*,
                  email:email,
                  position:position,
                  datehired:datehired,
                  slcredit:slcredit,
                  vlcredit:vlcredit,*/
                },
                success:function(data){
                 // $('#add_employee').modal('hide');
                 /* $('#empid').val('');
                  $('#firstname').val('');
                  $('#middlename').val('');
                  $('#lastname').val('');
                  $('#email').val('');
                  $('#position').val('');
                  $('#datehired').val('');
                  $('#slcredit').val('');
                  $('#vlcredit').val('');*/

                
                  //COMMENTED FOR THE MEAN TIME
                // $('#user_data').DataTable().destroy();
                  //fetch_data();
                 /* alert("Data Added");
                  
                  $('#addEmployeeForm').modal('hide');
                  
                  setInterval('refreshPage()', 5000);*/
                 
                }     
              }); 
            //}
            

        });

$(document).on('click', '#add_employee', function(){
          var add_employee = "Success";
          //validateData();
          //var answer = validateData();
          var empid = $('#empid').val();
          var firstname = $('#firstname').val();
          var middlename = $('#middlename').val();
          var lastname = $('#lastname').val();
          /*var email = $('#email').val();
          var position = $('#position').val();
          var datehired = $('#datehired').val();
          //var rating = document.querySelector('input[name="optradio"]:checked').value;
          var province = document.querySelector('input[name="province"]:selected').value;
          var slcredit = $('#slcredit').val();
          var vlcredit = $('#vlcredit').val();*/

         

       //if(answer == 'N'){ //COMMENTED, USED FOR VALIDATION
              $.ajax({
                url:"insertEmployee",
                method:"POST",
                data:{
                  add_employee:add_employee,
                  empid:empid, 
                  firstname:firstname, 
                  middlename:middlename, 
                  lastname:lastname/*,
                  email:email,
                  position:position,
                  datehired:datehired,
                  slcredit:slcredit,
                  vlcredit:vlcredit,*/
                },
                success:function(data){
                 //$('#add_employee').modal('hide');
                  $('#empid').val('');
                  $('#firstname').val('');
                  $('#middlename').val('');
                  $('#lastname').val('');
                 /* $('#email').val('');
                  $('#position').val('');
                  $('#datehired').val('');
                  $('#slcredit').val('');
                  $('#vlcredit').val('');*/

                
                  //COMMENTED FOR THE MEAN TIME
                // $('#user_data').DataTable().destroy();
                  //fetch_data();
                  alert("Data Added");
                  
                  $('#addEmployeeForm').modal('hide');
                  
                  setInterval('refreshPage()', 5000);
                 
                }     
              }); 
            //}
            

        });

        function refreshPage() {
              location.reload(true);
          }



 


        function validateData() {
        var flag = 'N';
        var fullname=document.getElementById("fullname").value;
        var email = document.getElementById("email").value;
        //alert(email);
        var fullnameTrim = fullname.trim();
        var emailTrim = email.trim();
        //check will be true or false
       // alert(fullnameTrim.length);
        if (fullnameTrim.length == 0){ 
            alert("Full Name is empty");
            flag = 'Y';
          }

        if (emailTrim.length == 0) {
            alert("Email is empty");
            flag = 'Y';
        }
       
        return flag;
        
      }
  </script>

</body>

</html>