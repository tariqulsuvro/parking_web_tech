<?php
include "includes/dbconnect.inc.php";
session_start();

$uPass = $uName =$tp= $message =$appr= "";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['uname'])){
		$uName = mysqli_real_escape_string($conn, $_POST['uname']);
	}
	if(!empty($_POST['upass'])){
		$uPass = mysqli_real_escape_string($conn, $_POST['upass']);
    }

    $sqlUserCheck1 = "SELECT * FROM admin";
	$result1 = mysqli_query($conn, $sqlUserCheck1);
	$rowCount1 = mysqli_num_rows($result1);

	if($rowCount1>0){
		$sqlUserCheck = " SELECT * FROM admin WHERE username = '$uName' " ;
		$result = mysqli_query($conn, $sqlUserCheck);
		$rowCount = mysqli_num_rows($result);

		if($rowCount < 1){
	     	$_SESSION['msg1'] = "No Admin does not exist in this user name!";
	      header("Location:Adminlogin.php");
		}
		else{

			while($row = mysqli_fetch_assoc($result)){
				$uPassInDB = $row["password"];
	            $appr = $row["approval"];

		    	if(password_verify($uPass , $uPassInDB)){

	                if($appr=="yes")
	                {
	                    $_SESSION['uname'] = $uName;
	                    header("Location:dashboards/admindash.php");

	                }

	                else
	                {
	                    $_SESSION['msg1'] = "Your account is not approved yet.";
	                    header("Location:Adminlogin.php");
	                }

				}
				else{

					$_SESSION['msg1'] = "Wrong Password!";
	                header("Location:Adminlogin.php");
				}
		}
	 }
	}

else
{
	$_SESSION['msg1'] = "No admin exists!";
  header("Location:Adminlogin.php");
}



}


?>
