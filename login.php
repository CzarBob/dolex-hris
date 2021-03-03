<?php
session_start();
include "dbConnection.php";
if(isset($_POST['login'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$query = "SELECT * FROM `users` WHERE `USERNAME` = '".$user."' AND `PASSWORD` = '".$pass."' ";
	//var_dump($query);
	$result = mysqli_query($connect,$query);
	if($row=mysqli_fetch_assoc($result)){
		/*if($row['received_by']=="Receiving"){
		  $_SESSION['loggedin']="Account_Logged";
		  $_SESSION['received_by'] = $row['received_by'];
		  $_SESSION['username'] = $row['username'];
		  echo "success";
	  	}
	  	else{
			$_SESSION['loggedin']="Account_Logged";
			$_SESSION['received_by'] = $row['received_by'];
			$_SESSION['username'] = $row['username'];
			echo "others";
		  }*/

		  $_SESSION['loggedin']="Account_Logged";
		  $_SESSION['username'] = $row['USERNAME'];
		  echo "success";
	}
	else{
	  echo "fail";
	}
}
?>