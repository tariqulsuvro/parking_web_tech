<?php
include "includes/dbconnect.inc.php";
session_start();

  $aID="";

 if($_SERVER["REQUEST_METHOD"]=="POST"){

   if(!empty($_POST['aid'])){
     $aID = $_POST['aid'];
   }
   else{
     $_SESSION['msg'] = "No id given.";
     header("Location:admindash.php");
   }

   if(isset($_POST['a_apr'])){
              $sqlUserCheck = " SELECT * FROM admin WHERE id = '$aID' " ;
              $result = mysqli_query($conn, $sqlUserCheck);
              $rowCount = mysqli_num_rows($result);
              if($rowCount<1)
              {
                  $_SESSION['msg'] = "No admin exist of this id.";
                  header("Location:admindash.php");
              }
              else
              {
                  $sqlUserCheck1 = " UPDATE admin set approval='yes' WHERE id = '$aID'" ;
                  $result1 = mysqli_query($conn, $sqlUserCheck1);

                  $_SESSION['msg'] = "Succesfully Approved";
                  header("Location:admindash.php");

              }
   }

   elseif(isset($_POST['a_sus'])){
     $sqlUserCheck = " SELECT * FROM admin WHERE id = '$aID' " ;
     $result = mysqli_query($conn, $sqlUserCheck);
     $rowCount = mysqli_num_rows($result);
     if($rowCount<1)
     {
         $_SESSION['msg'] = "No admin exist of this id.";
         header("Location:admindash.php");
     }
     else
     {
         $sqlUserCheck1 = " UPDATE admin set approval='no' WHERE id = '$aID'" ;
         $result1 = mysqli_query($conn, $sqlUserCheck1);

         $_SESSION['msg'] = "Succesfully suspended.";
         header("Location:admindash.php");
       }


    }
  }

 ?>
