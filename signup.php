

	<?php
$email="";
$name="";
$password="";
$confirm_password="";
$errMsg="";

//Data validaton here
  if (!empty($_POST)){
	if (isset($_POST['email']) && $_POST['email'] !="" ){
		$email = $_POST['email'];
	}
	else {
		$errMsg.="<p>Error: Please enter your email. </a></p>";
	}
	if (isset($_POST['name']) && $_POST['name'] !="" ){
		$name = $_POST['name'];
	}
	else {
		$errMsg.= "<p>Error: Please enter your name. </a></p>";
	}
	if (isset($_POST['pswd']) && $_POST['pswd'] !="" ){
		$password = $_POST['pswd'];
	}
	else {
		$errMsg.= "<p>Error: Please enter your password. </a></p>";
	}
	if (isset($_POST['conpswd']) && $_POST['conpswd'] !="" ){
		$confirm_password = $_POST['conpswd'];
	}
	else {
		$errMsg.= "<p>Error: Please enter your confirm password. </a></p>";
	}

	if($errMsg!=""){
		echo $errMsg;
	}
  	else{
    
    require 'settings.php';

    //CONNECT TO DATABASE HERE
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

	if ( mysqli_query( $conn,"DESCRIBE `friends`" ) ) {}
	else{

	//IF TABLE NOT EXISTS, CREATE TABLE
			$sql = "CREATE TABLE friends (
			friend_id INT(11)  AUTO_INCREMENT PRIMARY KEY,
			friend_email VARCHAR(50) NOT NULL,
			profile_password VARCHAR(20) NOT NULL,
			profile_name VARCHAR(30),
			date_started DATE,
			num_of_friends INT(10) UNSIGNED,
			)";
			$result = mysqli_query($conn, $sql);

	}
	//CHECK IF EMAIL EXIST IN database
	if($email!=""){
		$result = mysqli_query($conn,"SELECT * FROM friends where friend_email='".$email."'");
		if($result){
		$num_rows = mysqli_num_rows($result);
		}
		if($num_rows >= 1){
			echo "Email Exist";
		}
		else{
			$sql = "INSERT INTO friends (friend_email,profile_password,profile_name,date_started,num_of_friends) 
			VALUES ('$email','$password','$name',now(),0)";
			if ($conn->query($sql) === TRUE) {
				echo "You are successfully registered!";
				header("Location: /MyFriendSystem/friendadd.php");
				session_start();
				/**
				 * Status True = Login
				 * Status False = Logout
				*/
				$_SESSION["status"] = "true";	
	}
	 else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

  	$conn->close();
	
		}
	}
  
	}
	
  }  

?>
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
							<input type="text" id="email" name= "email" placeholder="101217869@student.swin.edu.au" required="required" 
							value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"/>
						</p>
						<p><label for="name">Profile Name </label> 
							<input type="text" id="name" name= "name" placeholder="Chan" required="required"
							value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>"/>
						</p>
						<p><label for="pswd">Password </label> 
							<input type="password" id="pswd" name= "pswd" required="required"/>
                        </p>
                        <p><label for="conpswd">Confirm Password </label> 
							<input type="password" id="conpswd" name= "conpswd" required="required"	 />
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
