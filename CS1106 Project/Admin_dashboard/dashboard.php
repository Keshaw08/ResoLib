<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Resolib</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-book-open'></i>
			<span class="text">Resolib</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="student_Details.php">
                    <i class='bx bx-group'></i>
                    <span class="text">Student_Details</span>
                </a>
			</li>
			<li>
				<a href="Faculty_Details.php">
					<i class='bx bx-group' ></i>
					<span class="text">Faculty_Details</span>
				</a>
			</li>
			<li>
				<a href="File_Details.php">
					<i class='bx bx-file'></i>
					<span class="text">File_Details</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="../index.html" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="dashboard_search.php" method="post">
				<div class="form-input">
					<input type="search" name="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bx-message-alt-dots' ></i>
				<!-- <span class="num">8</span> -->
			</a>
			<a href="#" class="profile" style="text-align:right;">
				<img src="img/people.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>
			<ul class="box-info">
				<li>
					<i class='bx bx-group'></i>
					<span class="text">
						<div class="box">
							<?php
							$conn = mysqli_connect('localhost:3307','root','','main_database');
							 $query ="Select * from student_login";
							 $query_run = mysqli_query($conn, $query);
							 if($total = mysqli_num_rows($query_run)){
							 	echo '<h3>'.$total.'</h3>';
							 }
							 else{
							 	echo '<h3> Data Not Found</h3>';
							}
							
							?>
						<div>
						<p>Student</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
							<?php
								$conn = mysqli_connect('localhost:3307','root','','main_database');
								$query ="Select * from faculty_login";
								$query_run = mysqli_query($conn, $query);
								if($total = mysqli_num_rows($query_run)){
									echo '<h3>'.$total.'</h3>';
								}
								else{
									echo '<h3> Data Not Found</h3>';
								}
							
							?>
						<p>Faculty</p>
					</span>
				</li>
				<li>
					<i class='bx bx-file' ></i>
					
					<span class="text">
					<?php
							$conn = mysqli_connect('localhost:3307','root','','main_database');
							 $query ="Select * from resolib";
							 $query_run = mysqli_query($conn, $query);
							 if($total = mysqli_num_rows($query_run)){
							 	echo '<h3>'.$total.'</h3>';
							 }
							 else{
							 	echo '<h3> Data Not Found</h3>';
							}
							
							?>
						<p>Files</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Logins</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Username</th>
								<th>Email_id</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>

			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>