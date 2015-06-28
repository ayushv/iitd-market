<?php 

session_start();
include 'functions.php';
include 'globals.php';
if($_SESSION['login']==true){
$user_id=$_SESSION['id'];
include 'header.php';
include 'sidebar.php';


?>


<div class="col-md-10"  id="main" style="height:1000px; ">
<h1>My Listings</h1>
<table class="table table-stripe">
    <thead>
      <tr>
        <th>Title</th>
        <th>status</th>
        <th>Renewed</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
     <?php 
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM listings where `user id`=$user_id  ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "
 <tr>
 <td>$row[title]</td>
<td>$row[status]</td>
<td>$row[time]</td>
<td>$row[price]</td>
</tr>"

;


}}

$conn->close();}

?></tbody>
