<?php
   include "includes/dbconnect.inc.php";
   session_start();

   $adm=$msg1=$msg3='';
   $p_id = $o_username = $o_email = $o_mobile_no = $o_nid = $o_address = $o_space = "";

   if (isset($_SESSION['uname'])) {
     $adm = $_SESSION['uname'];
   }
   else{
     header("Location:Ownerlogin.php");
   }
   
   if (isset($_SESSION['msg3'])) {
    $msg3 = $_SESSION['msg3'];
  }

  if (isset($_SESSION['id'])) {
    $p_id = $_SESSION['id'];
  }

 ?>

<html lang="en">

    <head>
        <title>Parker Dashboard.</title>
        <link rel="stylesheet" href="../../css/parkerdash_style.css">
    </head>

    <body>
        <div align="center">
            <img src="LOGO.png" alt="logo"><br>
            <span style="color:#FA5858; font-size:30px; font-family:ebrima"><u> PARKER DASHBOARD. </u></span><br>
            <span style="color:#424242; font-size:22px; font-family:ebrima"> Welcome Mr./ Mrs./ Ms. <?php echo $adm; ?> </span>
        </div>
        <div align="right" style="padding-right:200px;">
            <a href="parkerDashboard.php" target="_self"><b>Back<b></a>
        </div>

        <form action="parkerapproval.php" method="POST">

           <h2 class="admpanel">Parker Information panel.</h2>
           <?php 

                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $sql1="SELECT * FROM parker WHERE id = '$p_id'";
                    $result1=mysqli_query($conn, $sql1);
    
                    while($row = mysqli_fetch_assoc($result1)){
                        $p_username= $row['username'];
                        $p_email = $row['email'];
                        $p_mobile_no = $row['mobile_no'];
                        $p_nid = $row['nid'];

                        if (isset($_GET['lgn_btn'])) {
                            echo "Login button pressed";
                        }

                        ?>
                        <div>
                            <div>
                                <label for="p_id">Parker ID: </label>
                                <label for="p_id"><?php echo $p_id; ?></label>
                            </div>
                            <div>
                                <label for="p_username">Parker Name: </label>
                                <label for="p_username"><?php echo $p_username; ?></label>
                            </div>
                            <div>
                                <label for="p_email">Parker Email: </label>
                                <label for="p_email"><?php echo $p_email; ?></label>
                            </div>
                            <div>
                                <label for="p_mobile_no">Parker Mobile No: </label>
                                <label for="p_mobile_no"><?php echo $p_mobile_no; ?></label>
                            </div>
                            <div>
                                <label for="p_nid">Parker NID: </label>
                                <label for="p_nid"><?php echo $p_nid; ?></label>
                            </div>
                        </div>

                <?php
                    }

                    $_SESSION['id'] = $p_id;
                    $_SESSION['username'] = $p_username;

                }

            ?>

        </form>




    </body>

</html>