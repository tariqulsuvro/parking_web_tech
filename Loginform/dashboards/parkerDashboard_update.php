<?php include "includes/dbconnect.inc.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php

if (isset($_GET['parker_id'])) {
	$parker_id = $_GET['parker_id'];
	// echo $parker_id;
}
if (isset($_GET['parker_uname'])) {
	$parker_uname = $_GET['parker_uname'];
	// echo $parker_uname;
}

?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Unlocking Hidden Parking Spaces</title>

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

</head>


<body>

	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="parkerProfile.php"><i class="fa fa-fw fa-user"></i>My Profile</a>
		<a href="parkerDashboard.php"><i class="fa fa-fw fa-car"></i>Parking Status</a>
		<a href="#"><i class="fa fa-fw fa-envelope"></i>Support</a>
		<a href="plogout.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
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


		<section class="banner-area">
			<div class="container">
				<div class="row upperspace">
					<div class=" col-lg-6 col-md-5 col-sm-12 col-12">
						<div class="banner-img">
							<img src="million-job.png" class="img-fluid">
						</div>
					</div>
					<div class=" col-lg-6 col-md-7 col-sm-12 col-12">

						<div class="sign-up-area">
							<div class="sign-up">
								<div class="row">
									<div class="col-md-12">
										<h3 align="center" class="mb-4">Find Parking</h3>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<form method="post" action="">

											<div class="switch-field w-100">

												<input type="radio" id="monthly" name="type" value="monthly" checked />
												<label for="monthly">Monthly</label>

												<input type="radio" id="hourly" name="type" value="hourly" />
												<label for="hourly">Hourly</label>
											</div>

											<!-- Date picker -->
											<div class="time-picker-section">
												<div class="row">
													<div class="col-6 pl-1">
														<!-- arriving date time -->
														<div class="form-group ">
															<label>Division</label>
															<select class="form-control" id="division" name="division" required="">

																<option disabled selected value>- Select -</option>
																<?php

																$query = "SELECT id, parking_area, division FROM owner";
																$select_query = mysqli_query($conn, $query);
																while ($row = mysqli_fetch_assoc($select_query)) {
																	$o_id = $row['id'];
																	$o_parking_area = $row['parking_area'];
																	$o_division = $row['division'];

																?>
																	<option value="<?php echo $o_id; ?>"><?php echo $o_division; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>

													<div class="col-6 pr-1">
														<!-- arriving date time -->
														<div class="form-group">
															<label>Parking Area</label>
															<input type="text" id="local" name="local" />
														</div>

													</div>

												</div>
											</div>

											<button type="submit" id="sign" class="btn btn-block mt-3 datepicker-btn" name="search_btn">Search</button>

											<?php



											?>
										</form>

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

		<section class="find-parking-table">
			<div class="container">


				<div class="row">
					<div class="col-md-12">

						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Owner Name</th>
										<th>Owner Parking Address</th>
										<th>Owner Mobile No</th>
										<th>Owner Parking Space</th>
										<th>Owner Parking Area</th>
										<th>Owner Division</th>
										<th>Owner Status</th>
										<th width="14%">Book</th>
									</tr>
								</thead>

								<tbody id="find_park_t">

									<?php

									if (isset($_POST['search_btn'])) {

										$search = $_POST['search_btn'];
										$parker_search = mysqli_real_escape_string($conn, $_POST['local']);
										$parker_division = mysqli_real_escape_string($conn, $_POST['division']);

										$query = "SELECT * FROM owner WHERE id LIKE '$search'";
										$select_query = mysqli_query($conn, $query);
										while ($row = mysqli_fetch_assoc($select_query)) {
											$o_parking_area = $row['parking_area'];
											$o_division = $row['division'];

											if ($parker_division == $o_division) {
												$query = "SELECT * FROM owner";
												$select_query = mysqli_query($conn, $query);
												$i = 0;
												while ($row = mysqli_fetch_assoc($select_query)) {
													$the_o_id = $row['id'];
													$o_username = $row['username'];
													$o_email = $row['email'];
													$o_mobile_no = $row['mobile_no'];
													$o_nid = $row['nid'];
													$o_address = $row['address'];
													$o_parking_area = $row['parking_area'];
													$o_division = $row['division'];
													$o_space = $row['space'];
													$o_status = $row['status'];

													$i++;
									?>

													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $o_username; ?> </td>
														<td><?php echo $o_address; ?></td>
														<td><?php echo $o_mobile_no; ?></td>
														<td><?php echo $o_space; ?></td>
														<td><?php echo $o_parking_area; ?></td>
														<td><?php echo $o_division; ?></td>
														<td><?php echo $o_status; ?></td>
														<td align="center"><a href="FindParkingFormee2c.html?link=380"><button>Book Parking</button></a></td>
													</tr>

												<?php
												}
											}
										}
									} else {
										if ($_SERVER['REQUEST_METHOD'] == 'GET') {
											$o_uname = $_GET['uname'];


											$query = "SELECT * FROM owner WHERE username = '$o_uname'";
											$select_query = mysqli_query($conn, $query);
											$i = $k = 0;
											while ($row = mysqli_fetch_assoc($select_query)) {
												$the_o_id = $row['id'];
												$o_username = $row['username'];
												$o_email = $row['email'];
												$o_mobile_no = $row['mobile_no'];
												$o_nid = $row['nid'];
												$o_address = $row['address'];
												$o_parking_area = $row['parking_area'];
												$o_division = $row['division'];
												$o_space = $row['space'];
												$k = $o_space;
												$k--;
												$o_status = $row['status'];

												$i++;
												?>

												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $o_username; ?> </td>
													<td><?php echo $o_address; ?></td>
													<td><?php echo $o_mobile_no; ?></td>
													<td><?php echo $k; ?></td>
													<td><?php echo $o_parking_area; ?></td>
													<td><?php echo $o_division; ?></td>
													<td><?php echo $o_status; ?></td>
													<td align="center">Booked</td>
												</tr>

									<?php
											}

											$update_query_space = "UPDATE owner SET space = '$k' WHERE username = '$o_uname'";
											$update_space = mysqli_query($conn, $update_query_space);
											if (!$update_space) {
												die("Insert Query Failed" . $conn);
											}


											$date_time = date("Y/m/d h:i:s A");

											$insert_date_time_query = "INSERT INTO cost_info(owner_name, parker_id, parker_name, starting_time) VALUES ('$o_username','$parker_id','$parker_uname','$date_time')";
											$insert_date_time = mysqli_query($conn, $insert_date_time_query);
											if (!$insert_date_time) {
												die("Insert Query Failed" . mysqli_error($conn));
											}
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>


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