
<!DOCTYPE html>
<html>
<head>
    <title>Flight Details</title>
    <style>
        /* Style for the centered menu */

        header {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #333;
            color: #fff;
            padding: 10px;
            height: 100px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav li {
            margin-right: 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            margin: 0 auto;
        }

        footer {
            text-align: center;
            margin-top: 100px;
        }

        #search {
            float: right;
            margin-top: 15px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .section-header h2 {
            margin: 0;
        }

        #search {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .flight-info {
            display: flex;
            align-items: left;
            justify-content: left;
            margin-top: 50px;
            margin-left: 50px;
        }

        .flight-info img {
            height: 100px;
            margin-right: 20px;
        }

        .flight-details {
            text-align: left;
        }


        .flight-details p {
            font-size: 16px;
            margin: 5px 0;
        }

        .expected-departure {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-size: 24px;
        }

        .flight-status {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            margin-left: 50px;
            margin-right: 50px;
        }

        .flight-status-box {
            border: 1px solid #ccc;
            padding: 10px;
            width: 45%;
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="departures_arrivals.html">Departures & Arrivals</a></li>
                <li><a href="details.php">Flight Info</a></li>
                <li><a href="flight_statistics.html">Flight Statistics</a></li>
            </ul>
        </nav>
        <h2>Flight Information</h2>
    </header>
    <main>
    <?php include 'PHP API scripts/flight_details.php' ?>
        <section>
            <div class="section-header">
                

<form id="search" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="flight_iata" placeholder="Flight search">
    <button type="submit">Go</button>
</form>

            </div>
            <div class="flight-info">
                <img src="" alt="Company Logo">
                <div class="flight-details">
                    <p>Flight Name: <?php if (!empty($flight_name)) { echo $flight_name; } ?> </p>
                    <p>Flight Number: <?php if (!empty($flight_number)) { echo $flight_number; } ?></p>
                    <p>Destination Code / Arrival Code: <?php if (!empty($destination_code)) { echo $destination_code; } ?></p>
                </div>
            </div>
            <div class="expected-departure">
                <p>Expected to Depart at:<?php if (!empty($expected_departure_time)) { echo $expected_departure_time; } ?></p>
            </div>
            <div class="flight-status">
                <div class="flight-status-box">
                    <h3>Departure Information</h3>
                   
                    <p>Airport Name: <?php if (!empty($airport_name_dep)) { echo $airport_name_dep; } ?> </p>
                    <p>Airport Code: <?php if (!empty($airport_code_dep)) { echo $airport_code_dep; } ?> </p>
                    <p>Airport Location: <?php if (!empty($airport_location_dep)) { echo $airport_location_dep; } ?> </p>
                    <p>Takeoff Location: <?php if (!empty($takeoff_location)) { echo $takeoff_location; }; ?> </p>
                    <p>Takeoff Date: <?php if (!empty($takeoff_date)) { echo $takeoff_date; }; ?> </p>
                    <p>Takeoff Time:  <?php if (!empty($takeoff_time)) { echo $takeoff_time; }; ?> </p>
                    <p>Status: <?php if (!empty($status)) { echo $status; }; ?> </p>
                </div>
                <div class="flight-status-box">
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
        </section>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Flights Website Project. All rights reserved.</p>
    </footer>
</body>

</html>