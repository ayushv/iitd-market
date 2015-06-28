<?php 
include 'header.php';
include 'sidebar.php';
include 'globals.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {

	$listing_id=$_GET['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM listings where `listing id`=$listing_id  ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of 'the' row
	$row = $result->fetch_assoc();
	       echo "
	 <div class='col-md-10'>
	 <h1>$row[title]</h1>";
	if (!empty($row['image']))
	{
		echo"<div class='image'><a href=$row[image]><img src=$row[image] height='200px' width='200px'></a></div>";

	}

	echo"
<br><br>
	<p><span class='discription'>$row[discription]</span></p>
	<br><span class='price'>Price: $row[price]$</span>
	<br><span class='price'>Status: $row[status]</span>
	<br><span class='contact'>Contact: $row[contact]<br></span>
	<span class='time'>Renewed on :$row[time]<br></span>
</div></div>"
	;


}
else{

	echo "error";
}

session_start();
if(isset($_SESSION['login'])){
if($_SESSION['login']==true){

$user_id=$_SESSION['id'];
if($user_id==$row['user id']){

	echo '<br><br><br><div class=row>
	<div class="col-md-2">
	</div>	
	<div class="col-md-2">
	<button type="button" class="btn btn-info">edit listing</button></div>
	<div class="col-md-2">
	<button type="button" class="btn btn-info">delete listing</button>
	</div></div>';
}
}


}


}




 ?>