<?php

$email="";
$name="";
$password="";
$confirm_password="";
$errMsg="";

//Data validaton here -- Empty Fills
  if (!empty($_POST)){
	if (isset($_POST['email']) && $_POST['email'] !="" ){
		$email = $_POST['email'];
	}
	else {
		$errMsg .= "<p>Error Email: Empty Email Fill. Please enter your email. </p>
      	<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";
    
	}
	if (isset($_POST['name']) && $_POST['name'] !="" ){
		$name = $_POST['name'];
	}
	else {
		$errMsg .= "<p>Error Name: Empty Name Fill. Please enter your name. </p>
      	<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";
    
	}
	if (isset($_POST['pswd']) && $_POST['pswd'] !="" ){
		$password = $_POST['pswd'];
	}
	else {
		$errMsg .= "<p>Error Password: Empty Password Fill. Please enter your password. </p>
      	<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";
    
	}
	if (isset($_POST['conpswd']) && $_POST['conpswd'] !="" ){
		$confirm_password = $_POST['conpswd'];
	}
	else {
		$errMsg .= "<p>Error Confirm Password: Empty Confirm Password Fill. Please enter your confirm password. </p>
      	<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

	}

	validateFormat($email, $name, $password, $confirm_password, $errMsg);

	if($errMsg!=""){
		echo $errMsg;
		exit;
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
			profile_name VARCHAR(30) NOT NULL,
			date_started DATE NOT NULL,
			num_of_friends INT(10) UNSIGNED,
			)";
			$result = mysqli_query($conn, $sql);

	}
	//Check if email exists in database, email must be unique
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
				**/
				$_SESSION["status"] = true;	
				$_SESSION["email"] = $email;
	}
	 else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

  	$conn->close();
	
		}
	}
  
	}
	
  }
  
  //Data validaton here -- Format Checking
  function validateFormat($email, $name, $password, $confirm_password, $errMsg){
	if ($email=="") {
	$errMsg .= "<p>Error Email: Empty Email Fill. </p>
	<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	  $errMsg .= "<p>Invalid Email: Email must follow the Email format. </p>
	  <p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

	}

	if ($name=="") {
        $errMsg .= "<p>Error Name: Empty Name Fill. </p>
        <p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

        }else if( !preg_match("/^[a-zA-Z ]*$/",$name)){
          $errMsg .= "<p>Invalid Name: Email must contain only letters. </p>
          <p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

		}
	
	if ($password=="") {
        $errMsg .= "<p>Error Password: Empty Password Fill. </p>
        <p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

        }else if( !preg_match("/^[a-zA-Z0-9 ]*$/",$password)){
          $errMsg .= "<p>Invalid Password: Password must contain only letters and numbers. </p>
          <p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

        }else if( $password != $confirm_password){
			$errMsg .= "<p>Invalid Password: Password must match Confirm Password. </p>
			<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";
  
		}

	if ($confirm_password=="") {
        $errMsg .= "<p>Error Confirm Password: Empty Confirm Password Fill. </p>
        <p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

        }else if( !preg_match("/^[a-zA-Z0-9 ]*$/",$confirm_password)){
          $errMsg .= "<p>Invalid Confirm Password: Confirm Password must contain only letters and numbers. </p>
          <p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

        }else if( $confirm_password != $password){
			$errMsg .= "<p>Invalid Confirm Password: Confirm Password must match Password. </p>
			<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";
  
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
				<a href="index.php">Home </a> >
				<a href="signup.php">Sign Up </a>
			</div>
		</div>

		<div class="parallax"></div>   
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
							<input type="password" id="pswd" name= "pswd" placeholder="******" required="required"/>
                        </p>
                        <p><label for="conpswd">Confirm Password </label> 
							<input type="password" id="conpswd" name= "conpswd" placeholder="******" required="required"	 />
						</p>
				
				<p>
					<button type="submit" name="submit" value="Submit" class="Register" >Register </button>
					<button type="submit" name="submit" value="Submit" class="Clear" >Clear </button>
				</p>
				
				<p class="exitnav"><a href="index.php">Home</a></p>
			</form>
			</div>
	</section><!-- End of SignUp Form  section -->

	<div class="parallax"></div>
		<!--Footer-->	
		<?php 
			include 'footer.inc';
		?>
 		<!-- End footer section -->
    
	</body> 
	</html>
