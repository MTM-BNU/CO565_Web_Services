<?php

include 'PHP API scripts/arrival_details.php';
include 'PHP API scripts/departure_details.php';

?>

<!DOCTYPE html>
<html>	
	<head>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS CDN -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!-- jQuery library CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Popper JS CDN -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript CDN -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<!-- Website Stylesheet -->
		<link rel="stylesheet" type="text/css" href="indexstyle.css">
        <!-- Icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<!-- Ubuntu Font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
		<!-- Nanum Gothic Font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
		<!-- Abel Font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
		<!-- Title -->
		<title>Homepage | London Luton Airport</title>
	</head>
	<body>
		<!-- Navbar -->
		<nav class="main-nav navbar navbar-expand-md navbar-light">
			<img src="images/logo2.png" style="width:150px;" id="logo2" alt="logo">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="main-nav navbar-nav d-inline-flex">
					<li class="nav-item">
						<a class="nav-link text-white" href="index.php">HOMEPAGE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="details.php">FLIGHT INFORMATION</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="#">FLIGHT STATISTICS</a>
					</li>
				</ul>
			</div>
		</nav>

		<a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a>
		<!-- Introductory Jumbotron -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<img src="images/logo.png" id="logo" alt="logo">
				<!-- <h1>London Luton Airport</h1> -->
				<h2>Search Flights</h2>
					<!-- Search Bar -->
					<div class="row justify-content-center">
						<form id="search" class="d-flex align-items-center" method="POST" 
						action="details.php">
							<div class="box">
								<input type="text"  name="flight_iata" id="search-bar"  placeholder="Flight No. or Destination">
								<button class="btn" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass ml-3" id="icon"></i></button>
							</div>
						</form>
					</div>
			</div>
		</div>

		<!-- Container with flight details -->
		<div class="mainContainer container-fluid">
			<!-- Row with wells containing arrivals and departures -->
			<div class="row">
				<div class="col" id="flightsWell1">
                        <h3>Departures</h3>
						<table class = "table1", id = "depTable">
							<tr>
								<th>FLIGHT No.</th>
								<th>CARRIER</th>
								<th>DESTINATION</th>
								<th>SCHEDULED</th>
								<th>EXPECTED</th>
								<th>STATUS</th>
							</tr>
							<?php

								foreach ($departures['response'] as $flight) 
								{
  									echo 
									"<tr>
									<td style='color:yellow'>" . $flight['flight_iata'] . "</td>
									<td style='color:yellow'>" . $flight['airline_icao'] . "</td>
									<td style='color:yellow'>" . $flight['arr_iata'] . "</td>
									<td style='color:yellow'>" . date('H:i:s', strtotime($flight['dep_time'])) . "</td>
									<td style='color:yellow'>" . date('H:i:s', strtotime($flight['dep_estimated'])) . "</td>
									<td style='color:yellow'>" . $flight['status'] . "</td>
									</tr>";
								}
							?>
						</table>
				</div>
				<div class="col-md-12 col-lg-6 text-center" id="flightsWell2">
                    <h3>Arrivals</h3>
					<ul id="arrList"></ul>
                        <table class = "table1", id = "arrTable">
                            <tr>
                                <th>FLIGHT No.</th> 
								<th>CARRIER</th> 
								<th>ORIGIN</th> 
								<th>SCHEDULED</th> 
								<th>EXPECTED</th> 
								<th>STATUS</th>
                            </tr>
							<?php 

								foreach ($arrivals['response'] as $flight) 
								{
  									echo 
									"<tr>
									<td style='color:yellow'>" . $flight['flight_iata'] . "</td>
									<td style='color:yellow'>" . $flight['airline_icao'] . "</td>
									<td style='color:yellow'>" . $flight['dep_iata'] . "</td>
									<td style='color:yellow'>" . date('H:i:s', strtotime($flight['arr_time'])) . "</td>
									<td style='color:yellow'>" . date('H:i:s', strtotime($flight['arr_estimated'])) . "</td>
									<td style='color:yellow'>" . $flight['status'] . "</td>
									</tr>";
								}
							?>
                        </table>
				</div>
			</div>
		</div>

		<footer>
			<p>&copy; 2023 Flights Website Project. All rights reserved.</p>
		</footer>
	</body>
</html>