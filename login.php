<?php
$email="";
$password="";
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
	if (isset($_POST['pswd']) && $_POST['pswd'] !="" ){
		$password = $_POST['pswd'];
	}
	else {
		$errMsg .= "<p>Error Password: Empty Password Fill. Please enter your password. </p>
      	<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";
    
	}

	validateFormat($email, $password, $errMsg);

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
		$sql = "SELECT * FROM friends WHERE friend_email = '$email' AND profile_password = '$password'";
		$result = mysqli_query($conn,$sql);
		if($result){
			$num_rows = mysqli_num_rows($result);
			if($num_rows == 1){
				echo "Login Success";
				header("Location: /MyFriendSystem/friendlist.php");
				session_start();
				/**
				 * Status True = Login
				 * Status False = Logout
				**/
				$_SESSION["status"] = true;
				$_SESSION["email"] = $email;

			}
			else{
				echo "<p>Error: Email or Password incorrect, Please Check. </a></p>";
			}
		}
		$conn->close();

		}
  }
  
  //Data validaton here -- Format Checking
  function validateFormat($email, $password, $errMsg){
	if ($email=="") {
	$errMsg .= "<p>Error Email: Empty Email Fill. </p>
	<p>Return back to <a href=\"index.php\"> Home Page</a> or <a href=\"signup.php\"> Sign Up Page</a></p></br>";

	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	  $errMsg .= "<p>Invalid Email: Email must follow the Email format. </p>
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
		<title>My Friend System -- Login Form</title>
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
				<a href="login.php">Login </a>
			</div>
		</div>

		<div class="parallax"></div>  
	<!--Login Form  section -->
	<section class="profile">
		<div class="container">

        <h1>My Friend System</h1>
        <h1>Log in Page</h1>

			<form class="form" method="post" action="login.php">
			<br>
			<br>

						<p><label for="email">Email </label> 
							<input type="text" id="email" name= "email" placeholder="101217869@student.swin.edu.au"
							value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" />
						</p>
						<p><label for="pswd">Password </label> 
							<input type="password" id="pswd" placeholder="******" name= "pswd" />
                        </p>
				
				<p>
					<button type="submit" name="submit" value="Submit" class="Login" >Log in </button>
					<button type="submit" name="submit" value="Submit" class="Clear" >Clear </button>
				</p>
				
				<p class="exitnav"><a href="index.php">Home</a></p>
			</form>
			</div>
	</section><!-- End of Login Form  section -->
	<div class="parallax"></div>

		<!--Footer-->	
		<?php 
			include 'footer.inc';
		?>
 		<!-- End footer section -->
    
	</body> 
	</html>

