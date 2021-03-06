<?php

session_start();
require 'settings.php';
//Get logged in user information
if($_SESSION['status']==true && $_SESSION['email']!=""){
    $email=$_SESSION['email'];
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());}
    $sql = "SELECT * FROM friends WHERE friend_email = '$email'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        //Output data of each row
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
	$ID_toDelete = $_GET["Id"];
	echo "myID:".$myID;
	echo "Delete ID:".$ID_toDelete;
  if($ID_toDelete!=$myID){
	
	  $sql = "DELETE FROM myfriends  WHERE friend_id1 = '$myID' AND friend_id2='$ID_toDelete' 
	  OR friend_id1 = '$ID_toDelete' AND friend_id2='$myID'";
	
		if ($conn->query($sql) === TRUE ) {
		echo "Friend Succesfully Removed!";
		//Friend count minus 1
		$sql = "UPDATE friends SET num_of_friends=num_of_friends-1 WHERE friend_id=$myID  OR friend_id='$ID_toDelete'";
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
		<title>My Friend System -- FriendList</title>
		<link rel="icon" href="images/logo.png" type="image/x-icon" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" />
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
				<a href="login.php">Login </a> >
				<a href="friendlist.php">Friend List </a> 
			</div>
		</div>

		<div class="parallax"></div>
	<!--Friend List section -->
	<section class="profile">
		<div class="container">

        <h1>My Friend System </br>
		<?php echo $name; ?>’s Friend List Page </br>
        Total Number of Friends is <?php echo $friendCount; ?>
		</h1>
		</br></br>

		<h2>Friend List</h2>

		<div class="section-3">
			<table class="table">
				
        <?php
            //Get All User and dispaly into a table
            
            $sql= "SELECT * FROM myfriends WHERE friend_id1 = '$myID'";
            $result = mysqli_query($conn,$sql);
            echo "<table style='width:100% '>"; // start a table tag in the HTML
            echo
			"<thead>
			<tr>
			  <th><h4>ID</h4></th>
              <th><h4>Friend Name</h4></th>
              <th><h4>Action</h4></th>
			</tr>
			</thead>\n";
				while($row = mysqli_fetch_array($result)){   
					//Creates a loop to loop through results
					$sql= "SELECT * FROM friends WHERE friend_id= '$row[friend_id2]'";
					$result_inner = mysqli_query($conn,$sql);
						if ($result_inner->num_rows > 0) {
						while($row_inner = mysqli_fetch_array($result_inner)){ 
							$displayName=$row_inner["profile_name"];
						}
					  }
              
				echo "
				<tbody>
				<tr>
				<td><h3>" . $row['friend_id2'] . "</h3></td>
				<td><h3>" . $displayName . "</h3></td>
				<td><button onclick='removeFriend($row[friend_id2])'> Unfriend </button></td>
				</tr>
				</tbody>"; 

			}

            echo "</table>"; //Close the table in HTML

            $conn->close();



		?>
		<p class="exitnav"><a href="friendadd.php">Add Friends </a>
		<a href="logout.php">Log out </a></p>

		</table>
		</div>
		</div>

		</div>


	</section><!-- End of Friend List section -->
	<div class="parallax"></div>

		<!--Footer-->	
		<?php 
			include 'footer.inc';
		?>
 		<!-- End footer section -->
	
		 <!-- JavaScript Section -->
		 <script>
         function removeFriend(ID) {        
            console.log(ID);
            window.location.href = "friendlist.php?Id=" + ID;
            

        }
		</script>
		<!-- End of JavaScript Section -->

	</body> 
	</html>

