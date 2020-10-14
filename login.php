<!DOCTYPE html>
<!-- get header ('Page Name'. 'Title')-->
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Assignment 2 " />
		<meta name="author" content="ChanSiawZheng" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>My Friend System -- Login Form</title>
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
				<a href="signup.php">Login </a>
			</div>
		</div>

		    
	<!--Login Form  section -->
	<section class="profile">
		<div class="container">

        <h1>My Friend System</h1>
        <h1>Log in Page</h1>

			<form class="form" method="post" action="login.php">
			<br>
			<br>

						<p><label for="email">Email </label> 
							<input type="text" id="email" name= "email" placeholder="101217869@student.swin.edu.au" required="required"/>
						</p>
						<p><label for="pswd">Password </label> 
							<input type="password" id="pswd" name= "pswd" required="required"/>
                        </p>
				
				<p>
					<button type="submit" name="submit" value="Submit" class="Login" >Log in </button>
					<button type="submit" name="submit" value="Submit" class="Clear" >Clear </button>
				</p>
				
			</form>
			</div>
	</section><!-- End of Login Form  section -->

		<!--Footer-->	
		<?php 
			include 'footer.inc';
		?>
 		<!-- End footer section -->
    
	</body> 
	</html>


	<?php
$email="";
$password="";


//Data validaton here
  if (!empty($_POST)){
  if (isset($_POST['email']) && $_POST['email'] !="" ){
    $email = $_POST['email'];
  }
  else {
    echo "<p>Error: Please enter your email. </a></p>";
  }
  
  if (isset($_POST['pswd']) && $_POST['pswd'] !="" ){
    $password = $_POST['pswd'];
  }
  else {
    echo "<p>Error: Please enter your password. </a></p>";
  }
  
    
    require 'settings.php';

    //CONNECT TO DATABASE HERE
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

//   if ( mysqli_query( $conn,"DESCRIBE `registration`" ) ) {
//     // my_table exists
// }
// else{

//   //IF TABLE NOT EXISTS, CREATE TABLE
// $sql = "CREATE TABLE registration (
//   ID INT(11)  AUTO_INCREMENT PRIMARY KEY,
//   Seminar_reference_number VARCHAR(6) NOT NULL,
//   Username VARCHAR(20) NOT NULL,
//   Qualification VARCHAR(255),
//   Email_address VARCHAR(255),
//   PhoneNo VARCHAR(10),
//   )";
//       $result = mysqli_query($conn, $sql);

// }
//   $sql = "INSERT INTO registration (Seminar_reference_number,Username,Qualification,Email_address,PhoneNo) 
//   VALUES ('$reference','$username','$qualification','$email','$phoneno')";
//   if ($conn->query($sql) === TRUE) {
//     echo "You are successfully registered!";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }

//   $conn->close();

  }  

?>