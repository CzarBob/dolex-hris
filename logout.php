<?php 
session_start();
unset($_SESSION['loggedin']);
unset($_SESSION['username']);
unset($_SESSION['usernameid']);
unset($_SESSION['type']);
unset($_SESSION['fielofficeid']);
unset($_SESSION['divisionid']);
header('Location:admin');
 ?>