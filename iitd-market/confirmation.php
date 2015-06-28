<?php 
	
	include 'header.php';
	include 'sidebar.php';
	include 'functions.php';
	include 'globals.php';



if ($_SERVER["REQUEST_METHOD"] == "GET") {
$email=test_input($_GET["email"]);
$code=rawurldecode(test_input($_GET["confirmcode"]));
echo $email.$code;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE email LIKE '$email' AND salt LIKE '$code'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();

if ($result->num_rows > 0) {

$sqlconf="UPDATE `iitd market`.`user` SET `status` = 'confirmed' WHERE `email` = '$email';";
$resconf=$conn->query($sqlconf) ;

if($resconf===TRUE)
{
	echo "your account has been confirmed. Login with your email and password";
}

else{
	echo "something went wrong .Try again later.";
}
}
   
 else {
    echo "wrong confirmation link.";
}

$conn->close();

}
include 'footer.php';
?>