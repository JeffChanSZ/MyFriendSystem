<!DOCTYPE html>
<!-- get header ('Page Name'. 'Title')-->
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Assignment 2 " />
		<meta name="author" content="ChanSiawZheng" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>My Friend System -- Sign Up Form</title>
		<link rel="icon" href="images/logo.jpeg" type="image/x-icon" />
		
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
				<a href="index.php">Home </a> >
				<a href="signup.php">Sign Up </a>
			</div>
		</div>

		    
	<!--SignUp Form  section -->
	<section class="profile">
		<div class="container">

        <h1>My Friend System</h1>
        <h1>Registration Page</h1>

			<form class="form" method="post" action="signup.php">
			<br>
			<br>

						<p><label for="email">Email </label> 
							<input type="text" id="email" name= "email" placeholder="101217869@student.swin.edu.au" required="required"/>
						</p>
						<p><label for="name">Profile Name </label> 
							<input type="text" id="name" name= "name" placeholder="Chan" required="required"/>
						</p>
						<p><label for="pswd">Password </label> 
							<input type="text" id="pswd" name= "pswd" required="required"/>
                        </p>
                        <p><label for="conpswd">Confirm Password </label> 
							<input type="text" id="conpswd" name= "conpswd" required="required"/>
						</p>
				
				<p>
					<button type="submit" name="submit" value="Submit" class="Register" >Register </button>
					<button type="submit" name="submit" value="Submit" class="Clear" >Clear </button>
				</p>
				
				<p class="return"><a href="index.php" class="returnIndex">Home</a></p>
			</form>
			</div>
	</section><!-- End of SignUp Form  section -->

		<!--Footer-->	
		<?php 
			include 'footer.inc';
		?>
 		<!-- End footer section -->
    
	</body> 
	</html>