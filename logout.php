<?php 
header("Location: /MyFriendSystem/index.php");
session_start();
/**
 * Status True = Login
 * Status False = Logout
**/
$_SESSION["status"] = false;	
$_SESSION["email"] = "";

?>