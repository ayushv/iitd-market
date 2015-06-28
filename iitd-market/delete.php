<?php session_start();
include 'globals.php';
include 'header.php';
include 'functions.php';
include 'sidebar.php';
$listing_id="";
if(isset($_GET['id'])){

	$listing_id=$_GET['id'];
}




    $conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM listings where `listing id`=$listing_id  ";
	$result = $conn->query($sql);
	$flag=false;

	if ($result->num_rows > 0) {
	    // output data of 'the' row
	$row = $result->fetch_assoc();

	if(isset($_SESSION['login'])){
	if($_SESSION['login']==true){

	$user_id=$_SESSION['id'];
	if($user_id==$row['user id']){

			$sql = "DELETE FROM `iitd market`.`listings` WHERE `listings`.`listing id` = '$listing_id'";
			if($conn->query($sql)){
				echo "Your listing has been deleted";
				$flag=true;
			}
			else{
				echo "something went wrong".$conn->error;
			}

	}}}}
	if(!$flag){
		//404
		} ?>






