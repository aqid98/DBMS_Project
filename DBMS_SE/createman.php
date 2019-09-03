<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$USER_ID = $Manager_ID = $Stock_name="";
$USER_ID_err = $Manager_ID_err =  $Stock_name_err ="";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    // Validate Investor_ID
     if($_POST["Manager_ID"])
	{
    $input_Manager_ID = trim($_POST["Manager_ID"]);
    if(empty($input_Manager_ID)){
        $Manager_ID_err = "Please enter an Manager_ID alloted to you.";     
    } else{
        $Manager_ID = $input_Manager_ID;
    }
	}
	 
	 // Validate User id
          if($_POST["USER_ID"])
		 {
                $input_USER_ID = trim($_POST["USER_ID"]);
				if(empty($input_USER_ID)){
				$USER_ID = "Please do enter a valid user id";     
				} else{
							$USER_ID = $input_USER_ID;
						}
         }  
	
    
		// Validate stockname
	if($_POST["Stock_name"])
	{
    $input_Stock_name = trim($_POST["Stock_name"]);
    if(empty($input_Stock_name)){
        $Stock_name_err = "Please enter a stock name.";
    } elseif(!filter_var($input_Stock_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Stock_name_err = "Please enter a valid stock name.";
    } else{
        $Stock_name = $input_Stock_name;
    }
	}
    
    
    
    // Check input errors before inserting in database
    if(empty($USER_ID_err) && empty($Stock_name_err) && empty($Manager_ID_err)){
        // Prepare an insert statement
        $sql2 = "INSERT INTO manager (Manager_ID, Stock_name, USER_ID) VALUES (?, ?, ?) ";
         
        if($stmt = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isi", $param_Manager_ID, $param_Stock_name, $param_userid);
            
            // Set parameters
			$param_Manager_ID = $Manager_ID;
			$param_userid = $USER_ID;
			$param_Stock_name = $Stock_name;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
				echo "Records created successfully. Redirect to landing page";
                // Records created successfully. Redirect to landing page
                header("location: index.html");
                exit();
            } else{
                echo "Please Check your Manager details ";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
 
<!DOCTYPE html>
<html lang="en">
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
<div id="page">
    <div class="wrapper">
		<div class="colorlib-loader"></div>
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
								<h2>Portfolio grid w/o text</h2>
								<p class="breadcrumbs"><span><a href="index.html">Home</a></span> <span>Work  grid w/o text</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    <style type="text/css">
        .wrapperadd{
            width: 500px;
            margin: 0 auto;
        }
    </style>
	    <div class="wrapperadd">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>ADD NEW USERS</h2>
                    </div>
                    <p>Please fill this form to start trading.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Manager_ID_err)) ? 'has-error' : ''; ?>">
                            <label>Manager ID</label>
                            <input type="number" name="Manager_ID" class="form-control" value="<?php echo $Manager_ID; ?>">
                            <span class="help-block"><?php echo $Manager_ID_err;?></span>
                        </div>
						
                        <div class="form-group <?php echo (!empty($USER_ID_err)) ? 'has-error' : ''; ?>">
                            <label>USER ID</label>
                            <input type="number" name="USER_ID" class="form-control" value="<?php echo $USER_ID; ?>">
                            <span class="help-block"><?php echo $USER_ID_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($Stock_name_err)) ? 'has-error' : ''; ?>">
                            <label>stockname</label>
                             <input type="text" name="Stock_name" class="form-control" value="<?php echo $Stock_name; ?>">
                            <span class="help-block"><?php echo $Stock_name;?></span>
                        </div>
						
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.html" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
</div>			
 
    </div>
			<footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About unapp</h4>
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
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920"><i class="icon-phone"></i> + 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> info@yoursite.com</a></li>
							<li><a href="#"><i class="icon-location4"></i> yourwebsite.com</a></li>
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
	</div>

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