<?php 
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']==true){
  echo "go home you are drunk";

  http_redirect("home.php");
}
else{

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email=test_input($_POST["email"]);
      $pwd=test_input($_POST["pwd"]);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE email LIKE '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash=$row["password"];
$salt=$row["salt"];
$user_id=$row["id"];
$login=verify_pwd($pwd,$salt,$hash);
echo $login;
if($login==true){

    if($row["status"]=="confirmed"){
        echo "successful login...";
     $_SESSION['login']=true;
     $_SESSION['id']=$user_id;
     //http_redirect('$site/home.php');
  
     $conn->close();
        ///login..
    }
    else{
      echo "Please Confirm your account by clicking on the link in the Conformation mail.";
    }
}
else{
  echo "Invalid Usermame or password ";

}
}



?>
<div class="col-md-10"  id="main" style="height:1000px; ">

<h2>Login</h2>
<br>
<br>

 <form role="form" method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <div class="form-group">
  <div class="row">
   <div class="col-md-1"> <label for="email">Email:</label></div>
   <div class="col-md-4"> <input type="email" class="form-control" name="email">
  </div></div></div>
  <div class="form-group">
  <div class="row">
  <div class="col-md-1">  <label for="pwd">Password:</label></div>
   <div class="col-md-4">  <input type="password" class="form-control" name="pwd">
  </div></div></div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<br>
<a href='#'>Register</a><br>
<a href='#'>Forgot Password</a><br>
<a href='#'>Didn't Recieve Conformation mail</a><br><br>
<?php } ?>