<?php

    include 'PHP API scripts/statistics_fetch.php';

    $delayArrivals = getDelay(null, null, "arrivals");
    $delayDepartures = getDelay(null, null, "departures");
    $delays = getDelay(null, null, "")['flights'];
?>

<html>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
		<link rel="stylesheet" type="text/css" href="css/flight_statistics.css">
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
		<title>Flight Statistics | London Luton Airport</title>
</head>

<body>
   <!-- Navbar -->
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

        <a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a>
		<!-- Introductory Jumbotron -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<img src="css/images/logo.png" id="logo" alt="logo">
				<!-- <h1>London Luton Airport</h1> -->
				<h2> Flight Statistics</h2>
			</div>
		</div>
    <main>
        <section>
            <div class="delay_title" style="background:red;">
                <h2> Average delay time today at Arrivals: <?php if(empty($delayArrivals['delay_average'])) echo 0; else echo $delayArrivals['delay_average'];?> min.</h2>
                <h2> Average delay time today at Departures: <?php if(empty($delayDepartures)) echo 0; else echo $delayDepartures['delay_average'];?> min.</h2>
            </div>
            <div class="flight-delays">
                <div class="flight-delay-box">
                    <h3>Arrivals Delay Information 🛫</h3>
                    <div id="dept_chart" style="width:100%; max-width:600px; height:500px;"></div>

                    <script>

                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Delay Time', 'Number of delays today'],
                    ['30 min',0<?php echo $delayArrivals['delay_30'];?>],
                    ['45 min',0<?php echo $delayArrivals['delay_45']; ?>],
                    ['60 min ',0<?php echo $delayArrivals['delay_60']; ?>],
                    ['75 min',0<?php echo $delayArrivals['delay_75']; ?>],
                    ['90 min',0<?php echo $delayArrivals['delay_90']; ?>]
                    ]);

                    var options = {
                    title:'Delays in Departues'
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('dept_chart'));
                    chart.draw(data, options);
                    }
                    </script>
                    
                </div>
                <div class="flight-delay-box">
                    <h3>Departures Delay Information 🛬</h3>
                    <div id="arv_chart" style="width:100%; max-width:600px; height:500px;"></div>
                    <script>
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        
                        function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Delay Time', 'Number of delays today'],
                          ['30 min',0<?php echo $delayDepartures['delay_30']; ?>],
                          ['45 min',0<?php echo $delayDepartures['delay_45']; ?>],
                          ['60 min ',0<?php echo $delayDepartures['delay_60']; ?>],
                          ['75 min',0<?php echo $delayDepartures['delay_75']; ?>],
                          ['90 min',0<?php echo $delayDepartures['delay_90']; ?>]
                        ]);
                        
                        var options = {
                          title:'Delays in Arrivals'
                        };
                        
                        var chart = new google.visualization.ColumnChart(document.getElementById('arv_chart'));
                          chart.draw(data, options);
                        }
                        </script>
                        
                    
                </div>
            </div>
            <div class="mainContainer container-fluid">
                <!-- Row with wells containing arrivals and departures -->
                <div class="row">
                    <div class="col" id="flightsWell1">
                        <h3>Delays</h3>
                        <table class = "table1">
                            <tr>
                                <th>FLIGHT No.</th> 
                                <th>CARRIER</th> 
                                <th>ORIGIN</th> 
                                <th>DESTINATION</th> 
                                <th>SCHEDULED DEPARTURE</th> 
                                <th>SCHEDULED ARRIVAL</th> 
                                <th>DELAY</th>
                            </tr>
                            <?php

                                foreach($delays as $flight)
                                {
                                    echo "<tr>";
                                    echo "<th style='color:yellow;'>" . $flight['flight_icao'] ."</th>";
                                    echo "<th style='color:yellow;'>" . $flight['airline_icao'] ."</th>";
                                    echo "<th style='color:yellow;'>" . $flight['dep_iata'] ."</th>"; 
                                    echo "<th style='color:yellow;'>" . $flight['arr_iata'] ."</th>"; 
                                    echo "<th style='color:yellow;'>" . $flight['dep_time'] ."</th>"; 
                                    echo "<th style='color:yellow;'>" . $flight['arr_time'] ."</th>"; 
                                    echo "<th style='color:red;'>" . $flight['delayed'] ."</th>"; 
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </div>
        </section>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Flights Website Project. All rights reserved.</p>
    </footer>
</body>

</html>