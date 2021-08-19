<?php include "includes/dbconnect.inc.php"; ?>

<?php
session_start();

$adm = $msg1 = $msg3 = '';
$o_id = $o_username = $o_email = $o_mobile_no = $o_nid = $o_address = $o_space = "";

if (isset($_SESSION['uname'])) {
    $adm = $_SESSION['uname'];
} else {
    header("Location:Ownerlogin.php");
}

if (isset($_SESSION['msg3'])) {
    $msg3 = $_SESSION['msg3'];
}

if (isset($_SESSION['id'])) {
    $o_id = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Owner Dashboard</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="bootstrap.min.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="owl.carousel.min.css">

    <!-- owl carousel theme -->
    <link rel="stylesheet" href="owl.theme.default.min.css">

    <!-- custom style -->

    <link href="find-parking-place.css" rel="stylesheet">
    <link href="sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ############################################################################################## -->

    <link rel="stylesheet" href="../../css/ownerDash_style.css">

</head>


<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="ownerDash.php"><i class="fa fa-fw fa-user"></i>My Profile</a>
        <a href="ownerDashboard.php"><i class="fa fa-fw fa-car"></i>Parking Status</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i>Support</a>
        <a href="ologout.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
    </div>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

    <div id="main">
        <nav class="navbar navbar-default" role="navigation">
            <a class="navbar-brand navbar-right" href="index.html"><img src="rsz_logo1.png"></a>
            <div class="navbar-header">

            </div>

            <div class="collapse navbar-collapse">
                <!-- snip -->
            </div>
        </nav>

        <div align="center">
            <img src="LOGO.png" alt="logo"><br>
            <span style="color:#FA5858; font-size:30px; font-family:ebrima"><u> OWNER DASHBOARD. </u></span><br>
            <span style="color:#424242; font-size:22px; font-family:ebrima"> Welcome Mr./ Mrs./ Ms. <?php echo $adm; ?> </span>
        </div>


    </div>

    <form action="" method="POST">
        <h2 class="admpanel">Parker Information panel.</h2>

        <table style="width:100%">
            <tr>
                <th>ID.</th>
                <th>User Name</th>
                <th>Mobile no.</th>
                <th>E-mail</th>
                <th>NID no.</th>
                <th>Action</th>
            </tr>

            <?php

            $cost_info_query = "SELECT * FROM cost_info";
            $cost_info = mysqli_query($conn, $cost_info_query);
            while ($row = mysqli_fetch_assoc($cost_info)) {
                $p_uname = $row['parker_name'];
                $o_uname = $row['owner_name'];

                if ($adm == $o_uname) {

                    $select_parker_query = "SELECT parker_id, parker_name FROM cost_info WHERE parker_name = '$p_uname'";
                    $select_parker = mysqli_query($conn, $select_parker_query);
                    while ($row = mysqli_fetch_assoc($select_parker)) {
                        $the_p_uname = $row['parker_name'];
                        // $o_uname = $row['owner_name'];                        
                    }

                    $sql1 = "SELECT * from parker WHERE username = '$the_p_uname'";
                    $result1 = mysqli_query($conn, $sql1);

                    while ($row = mysqli_fetch_assoc($result1)) {

            ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['mobile_no']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['nid']; ?></td>
                            <td align="center"><a href="ownerDashboard_update.php?p_name=<?php echo $the_p_uname; ?>"><button type="button" name="park_end_btn">End Parking</button></a></td>
                        </tr>

            <?php
                    }
                }
            }



            ?>

        </table>
    </form>


    <script type="text/javascript">
        $("#division").on("change", function() {
            var value = $(this).val();
            //var url = 'home/get_seperate_locality.html';
            //var url = 'http://parkingkoi.xyz/car-parking/getLocality.php';
            $.ajax({
                url: url,
                type: "post",
                data: {
                    "value": value
                },
                success: function(data) {
                    $("#local").html(data);
                    //alert(data);
                },
            });
        });
        /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
    </script>
    <script>
        /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

    <!-- ############################################################################################## -->
</body>

</html>