<!DOCTYPE html>
<!-- get header ('Page Name'. 'Title')-->
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Assignment 2 " />
		<meta name="author" content="ChanSiawZheng" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>My Friend System</title>
		<link rel="icon" href="images/logo.png" type="image/x-icon" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="style/style.css" />
	</head>
	
<body>
<!--Header-->
<?php 
	include 'header.inc';
?>

<?php 
	include 'menu.inc';
?>
<!--Header End-->
	<div class="directory">
		<div class="container">
			<a href="index.php">Home </a>
		</div>
	</div>
	
	<div class="parallax"></div>
	<section class="banner-image">
		<div class="container">
		<div class="banner-content">
            <h1>My Friend System</h1>
            <h1>Assignment Home Page</h1>
			<br>
	
				<p>Name: Chan Siaw Zheng &nbsp; &nbsp; 
				<span> Student ID: 101217869 </p>
				<p>Email: <a href="101217869@swin.edu.au">101217869@swin.edu.au</a></p>

    			<p>I declare that this assignment is my individual work. 
                    I have not worked collaboratively nor have I copied from any other student’s work or from any other source. </p>

                <p>Tables successfully created and populated.
		</div>
		</div>
	</section>
	<div class="parallax"></div>

	<!--Footer-->	
		<?php 
			include 'footer.inc';
		?>
 	<!-- End footer section -->

    
	</body> 
	</html>