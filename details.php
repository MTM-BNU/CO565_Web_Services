<?php

    include 'PHP API scripts/flight_details.php';
    
    if(!isset($_POST['submit']))
    {
        header("Location: details_search.php");
    }
    else if(isset($_POST['submit']) && empty($destination_code))
    {
        header("Location: details_search.php?message=error");
    }

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
		<link rel="stylesheet" type="text/css" href="css/detailsstyle.css">
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
        <title>Flight Details | London Luton Airport</title>
</head>
<body>
    <!-- Navbar -->
    <header>

        <nav class="main-nav navbar navbar-expand-md navbar-light">
			<img src="css/images/logo2.png" style="width:150px;" id="logo2" alt="logo">
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
						<a class="nav-link text-white" href="flight_statistics.php">FLIGHT STATISTICS</a>
					</li>
				</ul>
			</div>
		</nav>
        
    </header>

    <main>
        <div class="jumbotron jumbotron-fluid">
                <section>
                    <div class="section-header">
                    <h2>Flight Information</h2>
                    <form id="search" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="box">
                            <input type="text" name="flight_iata" placeholder="Flight search">
                            <button class="btn" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass ml-3" id="icon"></i></button>
                        </div>
                    </form>
                    </div>
                    <div class="row">
                        <div class="flight-info">
                            <?php 
                            
                                if($flight_name == "W9" || $flight_name == "W6") 
                                    echo "<img src='css/images/WUK.png' alt'Company Logo' style='border: 2px solid black; color:#5c5f64;'>";
                                else if($flight_name == "U2") 
                                    echo "<img src='css/images/EZY.png' alt'Company Logo' style='border: 2px solid black; color:#5c5f64;'>";
                                else if($flight_name == "FR") 
                                    echo "<img src='css/images/RYR.png' alt'Company Logo' style='border: 2px solid black; color:#5c5f64;'>";
                                else
                                    echo "<img src='css/images/noimage.png' alt'Company Logo' style='border: 2px solid black; color:#5c5f64;'>";

                            ?>
                        </div>
                        <div class="flight-details">
                            <p style="color:#5c5f64;">Flight Name: <?php if (!empty($flight_name)) { echo $flight_name; } ?> </p>
                            <p style="color:#5c5f64;">Flight Number: <?php if (!empty($flight_number)) { echo $flight_number; } ?></p>
                            <p style="color:#5c5f64;">Destination Code / Arrival Code: <?php if (!empty($destination_code)) { echo $destination_code; } ?></p>
                        </div>
                    </div>

            <div class="expected-departure">
                <p>Expected to Depart at:<?php if (!empty($expected_departure_time)) { echo $expected_departure_time; } ?></p>
                <i class="fa-sharp fa-solid fa-plane"></i>
                <div class="line"></div>
            </div>
        </div>
        <div class="mainContainer container-fluid">
            <div class="flight-status">
                <div class="flight-status-box" id="flightsWell1">
                    <h3>Departure Information</h3>
                    <p>Airport Name: <?php if (!empty($airport_name_dep)) { echo $airport_name_dep; } ?> </p>
                    <p>Airport Code: <?php if (!empty($airport_code_dep)) { echo $airport_code_dep; } ?> </p>
                    <p>Airport Location: <?php if (!empty($airport_location_dep)) { echo $airport_location_dep; } ?> </p>
                    <p>Takeoff Location: <?php if (!empty($takeoff_location)) { echo $takeoff_location; }; ?> </p>
                    <p>Takeoff Date: <?php if (!empty($takeoff_date)) { echo $takeoff_date; }; ?> </p>
                    <p>Takeoff Time:  <?php if (!empty($takeoff_time)) { echo $takeoff_time; }; ?> </p>
                    <p>Status: <?php if (!empty($status)) { echo $status; }; ?> </p>
                </div>
                <div class="flight-status-box" id="flightsWell2">
                    <h3>Arrival Information</h3>
                    <p>Airport Name: <?php if (!empty($airport_name_arr)) { echo $airport_name_arr; }; ?> </p>
                    <p>Airport Code: <?php if (!empty($airport_code_arr)) { echo $airport_code_arr; }; ?>
                    <p>Airport Location: <?php if (!empty($airport_location_arr)) { echo $airport_location_arr; }; ?>  </p>
                    <p>Landing Location:  <?php if (!empty($landing_location)) { echo $landing_location; }; ?></p>
                    <p>Landing Date:<?php if (!empty($landing_date)) { echo $landing_date; }; ?> </p>
                    <p>Landing Time: <?php if (!empty($landing_time)) { echo $landing_time; }; ?> </p>
                    <p>Status: <?php if (!empty($status)) { echo $status; }; ?> </p>
                </div>
            </div>
        </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Flights Website Project. All rights reserved.</p>
    </footer>
</body>

</html>