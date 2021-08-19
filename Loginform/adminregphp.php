<?php
  include "includes/dbconnect.inc.php";
  session_start();
  $uName = $uPass = $uMail = $uMobile = $uNid = $uReff = $err = $err1 = $err2 = $err3 = $msg = $uNameInDB = $uMailInDB = $uMobileInDB = $uNidInDB = "" ;


  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['uname'])){
      $uName = mysqli_real_escape_string($conn, $_POST['uname']);
    }

    if(!empty($_POST['upass'])){
      $CuPass = mysqli_real_escape_string($conn, $_POST['upass']);
      $uPassToDB = password_hash($CuPass, PASSWORD_DEFAULT);

    }

	if(!empty($_POST['mail'])){
      $uMail = mysqli_real_escape_string($conn, $_POST['mail']);
    }


	if(!empty($_POST['mobile'])){
      $uMobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    }


	if(!empty($_POST['nid'])){
      $uNid = mysqli_real_escape_string($conn, $_POST['nid']);
    }


	if(!empty($_POST['reff'])){
      $uReff = mysqli_real_escape_string($conn, $_POST['reff']);
    }



  $sqlUserCheck1 = "SELECT * FROM admin";
	$result1 = mysqli_query($conn, $sqlUserCheck1);
	$rowCount1 = mysqli_num_rows($result1);

  if($rowCount1>0){

    $sqlUserCheck = "SELECT username, email, mobile_no, nid  FROM admin WHERE username = '$uName' OR email='$uMail' OR mobile_no='$uMobile' OR nid='$uNid' ";
    $result = mysqli_query($conn, $sqlUserCheck);

    while ($row = mysqli_fetch_assoc($result)) {
      $uNameInDB = $row['username'];
      $uMailInDB = $row['email'];
      $uMobileInDB = $row['mobile_no'];
      $uNidInDB = $row['nid'];
    }

    $n = 0;

    if($uNameInDB == $uName){
      $n++;
      $err = "User Name already exists!";
    }

    if($uMailInDB == $uMail){
      $n++;
      $err1 = "E-mail already exists!";
    }

    if($uMobileInDB == $uMobile){
      $n++;
      $err2 = "Mobile number already exists!";
    }

    if($uNidInDB == $uNid){
      $n++;
      $err3 = "NID number already exists!";
    }

    if($n==0){
      $sql = "INSERT INTO admin (username, password, email, mobile_no, nid, reff)
              VALUES ('$uName','$uPassToDB','$uMail','$uMobile','$uNid','$uReff');";

      $insert_admin = mysqli_query($conn, $sql);

      if (!$insert_admin) {
        die("Admin Insertion Query Failed" . mysqli_error($conn));
      }

      $_SESSION['username'] = $uName;
      $_SESSION['msg'] = ' has successfully registered. Refresh to go further.';
      header("Location:Adminlogin.php");
    }
  }

  else{

    $sql = "INSERT INTO admin (username, password, email, mobile_no, nid, reff, approval)
              VALUES ('$uName','$uPassToDB','$uMail','$uMobile','$uNid','$uReff','yes');";


    $insert_admin = mysqli_query($conn, $sql);

    if (!$insert_admin) {
      die("Admin Insertion Query Failed" . mysqli_error($conn));
    }
    
    $_SESSION['username'] = $uName;
    $_SESSION['msg'] = ' has successfully registered. Refresh to go further.';
    header("Location:Adminlogin.php");
  }

}

else{


  $sqlUserCheck1 = "SELECT * FROM admin";
	$result1 = mysqli_query($conn, $sqlUserCheck1);
	$rowCount1 = mysqli_num_rows($result1);


}



?>

<html>
 <body style="background-color:#E6E6E6">
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <div align="center">
      <img src="stopsign.png" height="40%" width="20%" alt="warning sign"><br><br>
       <span style="color:#FE2E2E; font-size:20px"><?php echo $err; ?></span><br>
       <span style="color:#FE2E2E; font-size:20px"><?php echo $err1; ?></span><br>
       <span style="color:#FE2E2E; font-size:20px"><?php echo $err2; ?></span><br>
       <span style="color:#FE2E2E; font-size:20px"><?php echo $err3; ?></span><br>
       <span style="color:#B40404; font-size:25px; font-family:impact">Warning: Use only authentic and unique entries!</span>
   </form>
 </body>
</html>
