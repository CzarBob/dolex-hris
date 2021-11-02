<?php 
session_start();
unset($_SESSION['loggedin']);
unset($_SESSION['username']);
unset($_SESSION['usernameid']);
unset($_SESSION['type']);
header('Location:admin');
 ?>