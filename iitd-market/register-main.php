<?php
include 'globals.php';
$namerr=$emailerr=$passerr="";
$name=$email=$pass=$passcon="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = test_input($_POST["name"]);
$email=test_input($_POST["email"]);
$pass=test_input($_POST["pass"]);
$passcon=test_input($_POST["passcon"]);

   
   if (empty($name)) {
     $namerr = "Name is required";
   } else {
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $namerr = "Only letters and white space allowed";
     }
 }
  
   if (empty($email)) {
     $emailerr = "Email is required";
   } else {
    
     // check if e-mail address is well-formed
  
   }


    if (empty($pass)) {
     $passerr = "Password is required";
   } else {
     
     // check if e-mail address is well-formed
  
   }

     if ($passcon != $pass) {
     	echo "live in";
     $passerr = "Passwords do not match";
   } 




   if(empty($namerr) and empty($emailerr) and empty($passerr)){

$hash=create_hash($pass);

 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (name,email,password,salt,status)
VALUES ('$name', '$email', '$hash[0]','$hash[1]','not confirmed')";
$ccode=rawurlencode($hash[1]);
if ($conn->query($sql) === TRUE) {
    echo "You have succesfully registered. check your mail for confirmation link.";
//mail code:
$to=$email;
$subject="confirmation link";
$message= "To confirm your account. click on this link:$site/confirmation.php?email=$email&confirmcode=$ccode";

$mail=mail ( $to ,  $subject , $message );
echo "$message";
$pass=$email=$name="";


} else {	
    if($conn->error=="Duplicate entry '$email' for key 'email'"){
    		echo "user already exists with this email. try different email.";
    }

    else{
    	echo "something went wrong. Try again.";
    }
}

$conn->close();

   } 
  
 }





?>



<div class="col-md-10"  id="main" style="height:1000px; ">

<h2>Register</h2>
<br>
<p>In an effort to prevent scams and keep the Marketplace local, users must create an account using their <i>@iitd.ac.in </i>email address before posting a listing.<b>If you do not have a University ID, then you are not eligible to post listings.</b></p>
<br>

 <form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
   <div class="form-group">
  <div class="row">
   <div class="col-md-1"> <label for="name">Name:</label></div>
   <div class="col-md-4"> <input type="name" value="<?php echo $name;?>" class="form-control" name="name">
   <span class="error"><?php echo $namerr;?></span>
  </div></div></div>

  <div class="form-group">
  <div class="row">
   <div class="col-md-1"> <label for="email">Email:</label></div>
   <div class="col-md-4"> <input type="email" value="<?php echo $email;?>"class="form-control" name="email">
   <span class="error"> <?php echo $emailerr;?></span>
  </div></div></div>

  <div class="form-group">
  <div class="row">
  <div class="col-md-1">  <label for="pwd">Password:</label></div>
   <div class="col-md-4">  <input type="password" class="form-control" name="pass">
   <span class="error"> <?php echo $passerr;?></span>
  </div></div></div>

  <div class="form-group">
  <div class="row">
  <div class="col-md-2">  <label for="passcon">Confirm Password:</label></div>
   <div class="col-md-4">  <input type="password" class="form-control" name="passcon">
  </div></div></div>

  <button type="submit" class="btn btn-default">Sign Up</button>
</form>
<br>
<a href='#'>Login</a><br>
<a href='#'>Forgot Password</a><br>
<a hrfe='#'>Didn't Recieve Conformation mail</a><br><br>
