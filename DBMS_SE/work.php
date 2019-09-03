<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>unapp Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div id="colorlib-logo"><a href="index.html">Stock Trader Management</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li class="has-dropdown active">
									<a href="work.php">User Information</a>
								</li>
								<li><a href="trade.html">Start Trading</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<section id="home" class="video-hero" style="height: 500px; background-image: url(images/cover_img_1.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
		<div class="overlay"></div>
			<div class="display-t display-t2 text-center">
				<div class="display-tc display-tc2">
					<div class="container">
						<div class="col-md-12 col-md-offset-0">
							<div class="animate-box">
								<h2>Portfolio</h2>
								<p class="breadcrumbs"><span><a href="index.html">Home</a></span> <span>Work</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapperinfo{
            width: 700px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 20px;
        }
    </style>
	    <div class="wrapperinfo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">User Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Users</a>
                    </div>
                    <?php
                    // Include config file
					
                    require_once "config.php";
					$resulte1 = mysqli_query($link,"SELECT * FROM users ");
					
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM users";
					$result2 = mysqli_query($link,"SELECT COUNT(*) AS `count` FROM users WHERE role='INVESTOR'");
					$row2 = mysqli_fetch_assoc($result2);
					$result3 = mysqli_query($link,"SELECT COUNT(*) AS `count2` FROM users WHERE role='MANAGER'");
					$row3 = mysqli_fetch_assoc($result3);
					$resultavg= mysqli_query($link,"SELECT AVG(AGE) AS `age` FROM users WHERE role='INVESTOR'");
					$rowage=mysqli_fetch_assoc($resultavg);
					$resultavg1= mysqli_query($link,"SELECT AVG(AGE) AS `age1` FROM users WHERE role='MANAGER'");
					$rowage1=mysqli_fetch_assoc($resultavg1);
					$resultmaxage= mysqli_query($link,"SELECT MAX(AGE) AS `maxage` FROM users WHERE role='INVESTOR'");
					$rowmaxage=mysqli_fetch_assoc($resultmaxage);
					$resultmaxage1= mysqli_query($link,"SELECT MAX(AGE) AS `maxage1` FROM users WHERE role='MANAGER'");
					$rowmaxage1=mysqli_fetch_assoc($resultmaxage1);
					$resultminage= mysqli_query($link,"SELECT MIN(AGE) AS `minage` FROM users WHERE role='INVESTOR'");
					$rowminage=mysqli_fetch_assoc($resultminage);
					$resultminage1= mysqli_query($link,"SELECT MIN(AGE) AS `minage1` FROM users WHERE role='MANAGER'");
					$rowminage1=mysqli_fetch_assoc($resultminage1);
					
				//$rowtester=mysqli_query($link,"SELECT users.user_name, COUNT(stock.USERID) AS NumberOfStocks
					//FROM (stock INNER JOIN users ON stock.USERID = users.user_id) GROUP BY user_name HAVING COUNT(stock.USERID) > 0;");
					//$resulttest=mysqli_fetch_assoc($rowtester);
					
					
  
					
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                       // echo "<th>#</th>";
                                        echo "<th>USER ID</th>";
                                        echo "<th>USER NAME</th>";
                                        echo "<th>USER FULL NAME</th>";
                                        echo "<th>ROLE</th>";
										echo "<th>ACTION</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['user_id'] . "</td>";
                                        echo "<td>" . $row['user_name'] . "</td>";
                                        echo "<td>" . $row['full_name'] . "</td>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?user_id=". $row['user_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?user_id=". $row['user_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?user_id=". $row['user_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
							
							echo "<em>Total Number of Investors is ".$row2['count']." Investors</em><BR>";
							echo "<em>Total Number of Managers is ".$row3['count2']." Managers<BR>";
							echo "Average age of Investors is ".$rowage['age']." years<BR>";
							echo "Average age of Managers is ".$rowage1['age1']." years<BR>";
							echo "Min Age of Investors is ".$rowminage['minage']." years<BR>";
							echo "Min Age of Managers is ".$rowminage1['minage1']." years<BR>";
							echo "Max Age of Investors is ".$rowmaxage['maxage']." years<BR>";
							echo "Max Age of Managers is ".$rowmaxage1['maxage1']." years<BR></em>";
						$sql33="SELECT users.user_name, COUNT(stock.USERID) AS NumberOfStocks FROM (stock INNER JOIN users ON stock.USERID = users.user_id) GROUP BY user_name HAVING COUNT(stock.USERID) > 0";
						if($result33 = mysqli_query($link, $sql33)){
                        if(mysqli_num_rows($result33) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                       // echo "<th>#</th>";
                                        
                                        echo "<th>USER NAME</th>";
                                        echo "<th>NUMBER OF STOCKS</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row33 = mysqli_fetch_array($result33)){
                                    echo "<tr>";
                                       
                                        echo "<td>" . $row33['user_name'] . "</td>";
                                        echo "<td>" . $row33['NumberOfStocks'] . "</td>";
                                        
                                       
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
							
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
						}
					
                    // Close connection
                    mysqli_close($link);
                    }
					?>
					 
					 <div id="chartContainer" style="height: 300px; width: 100%;"></div>
<div id="chartContainer1" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
	
window.onload = function () {
var num = <?php echo json_encode($row2['count']); ?>;
var num1=<?php echo json_encode($row3['count2']);?>;
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "DATA ANALYSE"
	},
	axisY: {
		title: "Users"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "1 unit = one user",
		dataPoints: [      
			{ y: parseInt(num), label: "INVESTOR" },
			{ y: parseInt(num1),  label: "MANAGER" },
		]
	}]
});
chart.render();

var chart2 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title: {
		text: " Market Share - 2018"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: parseInt(num), label: "Investor"},
			{y: parseInt(num1), label: "Manager"},
				{y:5,label: "Not Acquired"}
		]
	}]
});
chart2.render();
}

</script>
					 
</div>
</div>
</div>
</div>

		<footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About unapp whose template I have used -Mohammed Aqid Khatkhatay</h4>
						<p>Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-3 colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#"><i class="icon-check"></i> Home</a></li>
								<li><a href="#"><i class="icon-check"></i> Gallery</a></li>
								<li><a href="#"><i class="icon-check"></i> About</a></li>
								<li><a href="#"><i class="icon-check"></i> Blog</a></li>
								<li><a href="#"><i class="icon-check"></i> Contact</a></li>
								<li><a href="#"><i class="icon-check"></i> Privacy</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Recent Blog</h4>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">Photoshoot Technique</a></h2>
								<p class="admin"><span>30 March 2018</span></p>
							</div>
						</div>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-2.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">Camera Lens Shoot</a></h2>
								<p class="admin"><span>30 March 2018</span></p>
							</div>
						</div>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-3.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">Imahe the biggest photography studio</a></h2>
								<p class="admin"><span>30 March 2018</span></p>
							</div>
						</div>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Contact Info</h4>
						<ul class="colorlib-footer-links">
							<li>Part of DBMS Project <br> 60004160050 SE A-3</li>
							<li><a href="tel://1234567920"><i class="icon-phone"></i> +91 67574547</a></li>
							<li><a href="https://github.com/aqid98"><i class="icon-envelope"></i> https://github.com/aqid98</a></li>
							<li><a href="#"><i class="icon-location4"></i> mohdaqidkhat98@gmail.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								 <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><br> 
								Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a>, <a href="http://pexels.com/" target="_blank">Pexels</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>


	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- YTPlayer -->
	<script src="js/jquery.mb.YTPlayer.min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

