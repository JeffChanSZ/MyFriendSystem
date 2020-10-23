<!DOCTYPE html>
<!-- get header ('Page Name'. 'Title')-->
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Assignment 2 " />
		<meta name="author" content="ChanSiawZheng" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>My Friend System -- About Page</title>
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
				<a href="about.php">About </a>
			</div>
		</div>

		<div class="parallax"></div>   
	<!--About  section -->
	<section class="profile">
		<div class="container">
            
        <div class="quote">
            <h1>About</h1>
			<br>
                <ul>
                    <li>
                        <?php echo 'PHP version: ' . phpversion();?>
                    </li>
				    <li>Most of the tasks are completed except for Extra Chanllenge. Pagination &amp; Mutual Friend Count. </li>
				    <li>Special Features ---
                        <ol>
                              <li>CSS: Bootstrap -- CSS Library</li>
                              <li>PHP, SQL: mysqli_fetch_array -- Fetch a result row as an associative, a numeric array, or both. </li>
                              <li>PHP, SQL: mysqli_query -- Performs a query on the database. </li>
                              <li>JavaScript: window.location.href (Object) -- Use to get the current page address (URL) and to redirect the browser to a new page. </li>
                        </ol></li>
                    <li>The most troublesome part for me is the mutual friend count in Add Friend page which is task 9. 
                        It's hard for me trying to figure out a way to get the mutual friend ID.</li>
                    <li>Time Management as I would like to start on this assignment much earlier so that I can spend more time on doing research on the extra challenge. </li>  
                    <li>AJAX -- AJAX allows web pages to be updated asynchronously by exchanging data with a web server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.</li>   
                </ul>
                
                <ul>
                    <li><a href="friendlist.php">Friend List </a></li>
				    <li><a href="friendadd.php">Add Friends </a></li>
				    <li><a href="index.php">Home Page </a></li>    
                </ul>
            </br>

                <ul>
                    <li><h3> Forum Discussion -- Assignment 2 <h3></li>
                    <div class="about">
                        <img src="images/discussion1.PNG" alt="Discussion Point1" class="hoverimage" /><br>
                        <p>Question -- General Question about Task 7 About Page</p>
                        <img src="images/discussion2.PNG" alt="Discussion Point2" class="hoverimage" /><br>
                        <p>Answer -- General Question about Task 7 About Page</p>
                        <img src="images/discussion3.PNG" alt="Discussion Point3" class="hoverimage" /><br>
                        <p>Question -- General Question about Task 4 My Friend List Page</p>
                        <img src="images/discussion3.PNG" alt="Discussion Point4" class="hoverimage" /><br>
                        <p>Answer -- General Question about Task 4 My Friend List Page</p>
                    </div>

    			    
                    <p class="exitnav"><a href="index.php">Home</a></p>
        </div>

        </div>
	</section><!-- End of About  section -->

	<div class="parallax"></div>
		<!--Footer-->	
		<?php 
			include 'footer.inc';
		?>
 		<!-- End footer section -->
    
	</body> 
    </html>
    