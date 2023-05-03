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
		<link rel="stylesheet" type="text/css" href="detailsstyle.css">
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
        <title>Flight Search | London Luton Airport</title>
</head>
<body>
    <!-- Navbar -->
    <header>

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
						<a class="nav-link text-white" href="flight_statistics.php">FLIGHT STATISTICS</a>
					</li>
				</ul>
			</div>
		</nav>
        
    </header>

    <main>
        <div class="jumbotron jumbotron-fluid" style="height:80vh;">
			<div class="container">
                <div class="row d-flex-row align-items-center justify-content-center">
                    <div class="col-6">
                        <img src="images/logo.png" id="logo" alt="logo" class="w-100">
                        <!-- <h1>London Luton Airport</h1> -->
                    </div>
                </div>
			</div>
            <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-3">
                        <!-- Search Bar -->
                        <h2>Search Flights</h2>
                        <div class="w-100" style="margin-top:5em;">
                            <form id="search" method="post" action="details.php">
                                <div class="box">
                                    <input type="text" name="flight_iata" placeholder="Flight search">
                                    <button name="submit" class="btn" type="submit"><i class="fa-solid fa-magnifying-glass ml-3" id="icon"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
		</div>
    </main>
    <footer class="mt-0">
        <p>&copy; 2023 Flights Website Project. All rights reserved.</p>
    </footer>
</body>

</html>