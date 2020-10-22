<?php

session_start();
require 'settings.php';

if($_SESSION['status']==true && $_SESSION['email']!=""){
    $email=$_SESSION['email'];
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());}
    $sql = "SELECT * FROM friends WHERE friend_email = '$email'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $name=$row["profile_name"];
            $friendCount=$row['num_of_friends'];
            $myID=$row['friend_id'];
        }
      } else {
        echo "User Not Found";
      }

      

}

if (isset($_GET["Id"])) {
          $ID_toAdd = $_GET["Id"] ;
        if ( mysqli_query( $conn,"DESCRIBE `friends`" ) ) {}
        else{

        //IF TABLE NOT EXISTS, CREATE TABLE
                $sql = "CREATE TABLE myfriends (
                friend_id1 INT(11)  NOT NULL,
                friend_id2 INT(11) NOT NULL,
                
                )";
                $result = mysqli_query($conn, $sql);

        }
        if($ID_toAdd!=$myID){
          $sql = "INSERT INTO myfriends (friend_id1,friend_id2) 
            VALUES ('$myID','$ID_toAdd'), ('$ID_toAdd','$myID')";
          // $sql.= "INSERT INTO myfriends (friend_id1,friend_id2) 
          // VALUES ('$ID_toAdd','$myID')";
          	if ($conn->query($sql) === TRUE ) {
              echo "Friend Succesfully Added!";
              //Update Number of Count
              $sql = "UPDATE friends SET num_of_friends=num_of_friends+1 WHERE friend_id='$myID' OR friend_id='$ID_toAdd'";
              $result = mysqli_query($conn,$sql);
             }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }
        else{
            echo "Both ID cannot be the same";
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
		<link rel="icon" href="images/logo.jpeg" type="image/x-icon" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="style/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        <h2><?php echo $name; ?> Add Friend  Page</h2>
        <h3>Total Number of Friend: <?php echo $friendCount; ?> </h3>
        </br></br></br></br></br>
        <h3>Friend List</h3>

        <?php
            //Get All User and dispaly into a table
            $sql= "SELECT * FROM myfriends WHERE friend_id1 = '$myID'";
            $result = mysqli_query($conn,$sql);
            $myFriends=array();
            while($row = mysqli_fetch_array($result)){   
              array_push($myFriends, $row['friend_id2']);
            }
            //Not inlcude user own email
            $sql= "SELECT * FROM friends WHERE friend_email != '$email'";
            $result = mysqli_query($conn,$sql);
            echo "<table style='width:100% '>"; // start a table tag in the HTML
            echo
            "<tr>
              <td><h4>ID</h4></td>
              <td><h4>Name</h4></td>
              <td><h4>Action</h4></td>
            </tr>\n";
                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                  //Make sure exist friend is not display into table again
                  if( !in_array( $row['friend_id'],$myFriends ))
                      {
                        echo "<tr><td> <h3>" . $row['friend_id'] . "</h3></td><td><h2>" . $row['profile_name'] ."</h2></td><td><button onclick='addFriend($row[friend_id])'> Add as Friend </button></td></tr>"; 
                      }
                }

            echo "</table>"; //Close the table in HTML

            $conn->close();


        ?>
    <a href="friendlist.php"> View My Friend</a>
		<a href="logout.php">Logout</a>
		</div>
	</section><!-- End of Login Form  section -->

		<!--Footer-->	
		<?php 
			include 'footer.inc';
		?>
 		<!-- End footer section -->
    

         <script>
         function addFriend(ID) {        
            console.log(ID);
            // $.post("friendadd.php", {data:ID}, function(results){
            // alert(results);
            // });
            window.location.href = "friendadd.php?Id=" + ID;
            

        }
        </script>
	</body> 
	</html>
