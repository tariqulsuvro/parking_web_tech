<?php
  include "includes/dbconnect.inc.php";
  session_start();

  $oID= $oID_Add ="";

  if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(!empty($_POST['oid']) || !empty($_POST['oid_add'])){
      $oID = $_POST['oid'];
      $oID_Add = $_POST['oid_add'];
    }
    else{
      $_SESSION['msg1'] = "No id given.";
      header("Location:admindash.php");
    }

    if(isset($_POST['o_apr'])){
      $sqlUserCheck = " SELECT * FROM owner WHERE id = '$oID' " ;
      $result = mysqli_query($conn, $sqlUserCheck);
      $rowCount = mysqli_num_rows($result);

      if($rowCount<1)
      {
        $_SESSION['msg1'] = "No user exist of this id.";
        header("Location:admindash.php");
      }
      else
      {
        $sqlUserCheck1 = " UPDATE owner set approval='yes' WHERE id = '$oID'" ;
        $result1 = mysqli_query($conn, $sqlUserCheck1);
        if (!$result1) {
            die("Update Query Failed" . mysqli_error($conn));
        }

        $_SESSION['msg1'] = "Succesfully Approved";
        header("Location:admindash.php");

      }
    }

    elseif(isset($_POST['o_sus'])){
      $sqlUserCheck = " SELECT * FROM owner WHERE id = '$oID' " ;
      $result = mysqli_query($conn, $sqlUserCheck);
      $rowCount = mysqli_num_rows($result);
      if($rowCount<1)
      {
        $_SESSION['msg1'] = "No user exist of this id.";
        header("Location:admindash.php");
      }
      else
      {
        $sqlUserCheck1 = " UPDATE owner set approval='no' WHERE id = '$oID'" ;
        $result1 = mysqli_query($conn, $sqlUserCheck1);
        if (!$result1) {
          die("Update Query Failed" . mysqli_error($conn));
        }

        $_SESSION['msg1'] = "Succesfully suspended.";
        header("Location:admindash.php");
      }
    }

    elseif(isset($_POST['o_act'])){
      $sqlUserCheck = " SELECT * FROM owner WHERE id = '$oID_Add' " ;
      $result = mysqli_query($conn, $sqlUserCheck);
      $rowCount = mysqli_num_rows($result);

      if($rowCount<1)
      {
        $_SESSION['msg3'] = "No user exist of this id.";
        header("Location:admindash.php");
      }
      else
      {
        $sqlUserCheck1 = " UPDATE owner set status='active' WHERE id = '$oID_Add'" ;
        $result1 = mysqli_query($conn, $sqlUserCheck1);
        if (!$result1) {
            die("Update Query Failed" . mysqli_error($conn));
        }

        $_SESSION['msg3'] = "Succesfully Activated";
        header("Location:admindash.php");

      }
    }

    elseif(isset($_POST['o_deact'])){
      $sqlUserCheck = " SELECT * FROM owner WHERE id = '$oID_Add' " ;
      $result = mysqli_query($conn, $sqlUserCheck);
      $rowCount = mysqli_num_rows($result);
      if($rowCount<1)
      {
        $_SESSION['msg3'] = "No user exist of this id.";
        header("Location:admindash.php");
      }
      else
      {
        $sqlUserCheck1 = " UPDATE owner set status='inactive' WHERE id = '$oID_Add'" ;
        $result1 = mysqli_query($conn, $sqlUserCheck1);
        if (!$result1) {
          die("Update Query Failed" . mysqli_error($conn));
        }

        $_SESSION['msg3'] = "Succesfully Deactivated.";
        header("Location:admindash.php");
      }
    }
  }

 ?>
