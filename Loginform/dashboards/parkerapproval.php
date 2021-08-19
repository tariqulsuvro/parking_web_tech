<?php
include "includes/dbconnect.inc.php";
session_start();

  $pID="";

 if($_SERVER["REQUEST_METHOD"]=="POST"){

   if(!empty($_POST['pid'])){
     $pID = $_POST['pid'];
   }
   else{
     $_SESSION['msg2'] = "No id given.";
     header("Location:admindash.php");
   }

   if(isset($_POST['p_apr'])){
              $sqlUserCheck = " SELECT * FROM parker WHERE id = '$pID' " ;
              $result = mysqli_query($conn, $sqlUserCheck);
              $rowCount = mysqli_num_rows($result);
              if($rowCount<1)
              {
                  $_SESSION['msg2'] = "No parker exist of this id.";
                  header("Location:admindash.php");
              }
              else
              {
                  $sqlUserCheck1 = " UPDATE parker set approval='yes' WHERE id = '$pID'" ;
                  $result1 = mysqli_query($conn, $sqlUserCheck1);

                  $_SESSION['msg2'] = "Succesfully Approved";
                  header("Location:admindash.php");

              }
   }

   elseif(isset($_POST['p_sus'])){
     $sqlUserCheck = " SELECT * FROM parker WHERE id = '$pID' " ;
     $result = mysqli_query($conn, $sqlUserCheck);
     $rowCount = mysqli_num_rows($result);
     if($rowCount<1)
     {
         $_SESSION['msg2'] = "No parker exist of this id.";
         header("Location:admindash.php");
     }
     else
     {
         $sqlUserCheck1 = " UPDATE parker set approval='no' WHERE id = '$pID'" ;
         $result1 = mysqli_query($conn, $sqlUserCheck1);

         $_SESSION['msg2'] = "Succesfully suspended.";
         header("Location:admindash.php");
       }


    }
  }

 ?>
