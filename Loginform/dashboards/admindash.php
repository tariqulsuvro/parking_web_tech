<?php
   include "includes/dbconnect.inc.php";
   session_start();

   $adm=$msg=$msg1=$msg2='';

   if (isset($_SESSION['uname'])) {
     $adm = $_SESSION['uname'];
   }
   else{
     header("Location:Adminlogin.php");
   }

   if (isset($_SESSION['msg'])) {
     $msg = $_SESSION['msg'];
   }

   if (isset($_SESSION['msg1'])) {
     $msg1 = $_SESSION['msg1'];
   }

   if (isset($_SESSION['msg2'])) {
     $msg2 = $_SESSION['msg2'];
   }
   

 ?>





<html lang="en">
  <head>
    <title>Admin Dashboard.</title>
    <link rel="stylesheet" href="../../css/admindash_style.css">
  </head>

  <body>
    <div align="center">
      <img src="LOGO.png" alt="logo"><br>
      <span style="color:#FA5858; font-size:30px; font-family:ebrima"><u> ADMIN DASHBOARD. </u></span><br>
      <span style="color:#424242; font-size:22px; font-family:ebrima"> Welcome Mr. <?php echo $adm; ?> </span>
    </div>
    <div align="right" style="padding-right:200px;">
      <a href="alogout.php" target="_self"><b>Log Out<b></a>
    </div>

    <form action="adminapproval.php" method="POST">

      <h2 class="admpanel">Admin waiting panel. (Input ID and approve or suspend the profile.)</h2>

      <label class="id">Admin ID:</label>
      <input type="number" name="aid" />
      <input type="submit" value="Approve" name="a_apr" class="appr" />
      <input type="submit" value="Suspend" name="a_sus" class="sus" />
      <span style="color:#FF0000; font-size:15px"><sub><?php echo $msg; ?></sub></span><br><br>

      <table style="width:100%">
        <tr>  
          <th>ID.</th> 
          <th>User Name</th> 
          <th>Mobile no.</th> 
          <th>NID no.</th> 
          <th>E-mail</th> 
          <th>Refference ID</th> 
          <th>Approval</th> 
        </tr>
        <?php

          $sql="SELECT * from admin";
          $result=mysqli_query($conn, $sql);

          while($row = mysqli_fetch_assoc($result)){
          
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['mobile_no']; ?></td>
                <td><?php echo $row['nid']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['reff']; ?></td>
                <td><?php echo $row['approval']; ?></td>
              </tr>

        <?php } ?>

      </table>

    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <form action="ownerapproval.php" method="POST">
      
      <h2 class="admpanel">Owner waiting panel. (Input ID and approve or suspend the profile.)</h2>
      <label class="id">Owner ID:</label>
      <input type="number" name="oid"/>
      <input type="submit" value="Approve" name="o_apr" class="appr" />
      <input type="submit" value="Suspend" name="o_sus" class="sus" />
      <span style="color:#FF0000; font-size:15px"><sub><?php echo $msg1; ?></sub></span>
      <br>
      <br>

      <table style="width:100%">
        <tr>  
          <th>ID.</th> 
          <th>User Name</th> 
          <th>Mobile no.</th> 
          <th>NID no.</th> 
          <th>E-mail</th> 
          <th>Address</th> 
          <th>Space</th> 
          <th>Status</th> 
          <th>Approval</th> 
        </tr>

        <?php
          $sql1="SELECT * from owner";
          $result1=mysqli_query($conn, $sql1);

          while($row = mysqli_fetch_assoc($result1)){

          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['mobile_no']; ?></td>
            <td><?php echo $row['nid']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['space']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['approval']; ?></td>
          </tr>

        <?php } ?>

      </table>

    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <form action="parkerapproval.php" method="POST">

      <h2 class="admpanel">Parker waiting panel. (Input ID and approve or suspend the profile.)</h2>
      <label class="id">Parker ID:</label>
      <input type="number" name="pid"/>
      <input type="submit" value="Approve" name="p_apr" class="appr" />
      <input type="submit" value="Suspend" name="p_sus" class="sus" />
      <span style="color:#FF0000; font-size:15px"><sub><?php echo $msg2; ?></sub></span><br><br>


      <table style="width:100%">
        <tr>  
          <th>ID.</th> 
          <th>User Name</th> 
          <th>Mobile no.</th> 
          <th>NID no.</th> 
          <th>E-mail</th> 
          <th>Approval</th> 
        </tr>
        <?php
          $sql2 = "SELECT * from parker";
          $result2 = mysqli_query($conn, $sql2);

          while($row = mysqli_fetch_assoc($result2)){
          ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['mobile_no']; ?></td>
              <td><?php echo $row['nid']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['approval']; ?></td>
            </tr>

        <?php } ?>

      </table>
    </form>
  </body>
</html>
