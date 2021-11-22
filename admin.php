<?php 
session_start();


if(isset($_SESSION["loggedin"])){

  if ($_SESSION["loggedin"] == "Account_Logged"){
    header("Location: main");
    exit;
  }
  else{
    header("Location: admin");
    exit;
  }
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
  <title>DOLE X - HRIS</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300" type="text/css" />
  <link rel="icon" href="img/dolelogogs.png">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="css/sb-admin-2.min.css">
  <link rel="stylesheet" href="css/mystyle.css">
  <script src="vendor/jquery/jquery.min.js"></script>

</head>
<body class="bg-gradient-animation">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-lg-block imagelogin">
                <div class="p-5 mt-5">

                </div>
              </div>
              <div class="col-lg-6 bg-gray-200">
                <div class="p-5 mt-5">
                  <div class="text-center">
                    <h1 class="h4 text-black-800 mb-5">DOLE-X HRIS</h1>
                  </div>
                  <!--<form class="user" method = "post">-->
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name = "username" placeholder="Username" autocomplete = "on">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name = "password" placeholder="Password" onkeydown="handleEnter(event)">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <!--<a class="btn btn-info btn-user btn-block text-white" id ="login"><b style = "font-size: 18px;">Login</b></a>
                    <a class="btn btn-info btn-user btn-block text-white" data-target="#privacyNoticeModal" id ="privacy_notice"><b style = "font-size: 18px;">Login</b></a>-->
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#privacyNoticeModal"
                                                    aria-expanded="false">Add Children</button>
                    <hr>
                    <div class="text-center">
                     
                    </div>
                  <!--</form>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="error_login" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
    <!-- Modal content-->
      <div class="modal-header">
        <h4 class="modal-title">Error</h4>
      </div>
        <div class="modal-body text-dark">Incorrect Username or Password!</div>
      <div class="modal-footer">
      <a href="#" data-dismiss="modal" aria-hidden="true" width = "30" class="btn btn-danger">Try Again</a>
      </div>

    </div>
    </div>
  </div>
  <div id="error_blank" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
    <!-- Modal content-->
      <div class="modal-header">
        <h4 class="modal-title">Error</h4>
      </div>
        <div class="modal-body text-dark">Please don't leave the fields blank!</div>
      <div class="modal-footer">
      <a href="#" data-dismiss="modal" aria-hidden="true" width = "30" class="btn btn-danger">Agreed</a>
      </div>

    </div>
    </div>
  </div>



  <!-- ADD CHILDREN FORM -->
  <div class="modal fade" id="privacyNoticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              <input type="text" style="text-transform: uppercase;"  name="fullname" id = "fullname" class="form-control validate" required>
           
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
  
<style type="text/css">
.imagelogin{
  background:url('img/dole-logo.jpg');
  background-position: center;
  background-size: cover;
  background-color: grey;
} 

</style>
<script type="text/javascript">
$(document).ready(function(){
  var inputPass = document.getElementById("password");
  inputPass.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
          event.preventDefault();
          document.getElementById("login").click();
      }
  });

  var inputUser = document.getElementById("username");
  inputUser.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
          event.preventDefault();
          document.getElementById("login").click();
      }
  });


  function loginConfirm(){
    var username = $('#username').val();
     var password = $('#password').val();
     if(username!="" && password!=""){
     $.ajax({
      url:"login",  
      method:"post", 
      dataType: "JSON",
      data:{
        login:"login",
        username:username,
        password:password
        },
      success:function(data){
        //alert(data.status);
        if(data.status=="success"){
            window.location.href="main.php", true;
        }
        /*if(response=="others"){
            window.location.href="admin";
        }*/
        if(data.status=="fail"){
          $('#error_login').modal('show');
        }
      }
    });  
   }
   else{
    $('#error_blank').modal('show');
   }
  }

  $('#login').click(function(){
    loginConfirm();
  }); 



}); 
</script> 
</body>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</html>