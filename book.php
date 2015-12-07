<?php
include 'functions.php';
$connect = connectDatabase();

//Start session
session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Tekket</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/custom.css" />
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.php">Tekket</a></h1>
						<nav>
							<a href="#menu">
								<?php

								if (isset($_SESSION["user"])){
									echo $_SESSION["user"];
								}else{
									echo "Menu";
								}
								 ?>
							</a>
						</nav>
          </header>

  				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>
								<?php
								if (isset($_SESSION["user"])){
									echo $_SESSION["user"];
								}else{
									echo "Menu";
								}
								 ?>
							</h2>
							<ul class="links">
								<li><a href="index.php">Home</a></li>
								<?php
								if (isset($_SESSION["user"])){
									echo "<li><a href='scripts/logoutScript.php'>Logout</a></li>";
								}else{
									echo "<li><a href='login.php'>Login</a></li>";
								}
								 ?>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

					<section class="container">
						<form name="booking">
							<div class="column3">
									<select name="city-list" id="city-list">
										<option value="">--</option>
										<?php
										// $res = $connect->query("SELECT * from theatre");
										// $res->data_seek(0);
										// while ($row = $res->fetch_assoc()) {
										//
										// 		echo "<option value=".$row['ID']." >".$row['name']."</option>";
										// }
										$query = "CALL cityList()";
										$stmt = $connect->query($query);
										while ($row = $stmt->fetch_assoc()){
											echo "<option value='1'>".$row['city']."</option>";
										}
										 ?>
									</select>

							 </div>
							 <div class="column3" id="movie-list" style="display: none;">
							 </div>
							 <div class="column3" id="theatre-list" style="display: none;">
							 </div>
							 <div class="column3" id="shows-list" style=";">
							 </div>
						</form>
					</section>



		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/custom.js"></script>

	</body>
</html>
