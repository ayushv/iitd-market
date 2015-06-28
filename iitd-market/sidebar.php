<?php  
$flag=false;
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login']==true){
		$flag=true;
		}}?>
<div style="height:1000px;" id="sidebar-contain" class="container">
<br><br><br>
<div class ="row">
<div  class="col-md-2" id="sidebars">
<div class="btn-group-vertical">
<?php if(!$flag){echo '
	
  <a role="button" href="starred.php" class="btn btn-info">Starred Listings</a>
  <a role="button" href="login.php"class="btn btn-info">Login</a>
<a href="register.php" role="button" class="btn btn-info">Register</a>
';}
else{

echo '
  <a role="button" class="btn btn-info" href="starred.php">Starred Listings</a>
  <a role="button" class="btn btn-info" href="create-listings.php">Create Listing</a>
  <a role="button" class="btn btn-info" href="my-listings.php">My Listings</a>
';
 }?>
</div>


<br><br>

<div style="height: 40%; width: 125px; background-color:aliceblue;" id="sidebar2">
<div class="btn-group-vertical">
  <a role="button" class="btn btn-link" href="home.php">All Categories</a>

 <?php
 include 'globals.php';
   $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM category";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    	echo  '<a role="button" href="home.php?cat='.$row["id"].'"class="btn btn-link">'.$row["name"].'</a>';}}
    	$conn->close();?>
</div>

  </div>

</div>
