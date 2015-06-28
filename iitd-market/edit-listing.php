<?php 
session_start();
include 'globals.php';
include 'header.php';
include 'functions.php';
include 'sidebar.php';
$listing_id="";
if(isset($_GET['id'])){

	$listing_id=$_GET['id'];
}
$imagerr=$titlerr=$discriptionerr=$pricerr=$contacterr=$categoryerr="";
if($_SERVER['REQUEST_METHOD']=="POST"){


$flag=true;
$title = test_input($_POST["title"]);
$discription=test_input($_POST["discription"]);
$price=test_input($_POST["price"]);
$contact=test_input($_POST["contact"]);
$category=test_input($_POST["category"]);
$listing_id=test_input($_POST["listing_id"]);
	if (empty($title)) {
     $titlerr = "title is required";
   	$flag=false;
   } 
  
   if (empty($discription)) {
     $discriptionerr = "discription is required";
     $false=false;
   } 



   if (empty($price) || $price<0) {
     $pricerr = "invalid price";
     $flag=false;
   } 


   if (empty($contact)) {
     $contacterr = "contact is required";
     $flag=false;
   } 




   if (empty($category)) {
     $contacterr = "category is required";
     $flag=false;
   } 
 

 $target_file="";
   	//file upload
if ($_FILES["image"]["size"] > 0){


$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

	echo "cool3";
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
}

// Check file size
if ($_FILES["image"]["size"] > 10000000) {
    $imagerr="Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $imagerr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

   





if($uploadOk){
//file uploading..
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
       echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		//echo "cool2";
			}}}
if($flag){

//database connection...
		        // Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}


		if($target_file==""){

				$sql ="UPDATE `iitd market`.`listings` SET  `title` ='$title' , `discription` = '$discription', `price` = '$price', 
				`contact` ='$contact', `category_id` = '$category' WHERE `listings`.`listing id` = $listing_id";


		}
		else{
	$sql ="UPDATE `iitd market`.`listings` SET  `title` ='$title' , `discription` = '$discription', `price` = '$price', 
				`contact` ='$contact', `category_id` = '$category', `image` = '$target_file' WHERE `listings`.`listing id` = $listing_id";

		}
		
		if ($conn->query($sql) === TRUE) {
		    echo "You have successully edited the listing.";
		    $title=$discription=$price=$contact="";
		    //http redirect to view listing.

	    } else {
	        echo "something went wrong".$conn->error;

	    }
$conn->close();



	
}}




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

	if(isset($_SESSION['login'])){
	if($_SESSION['login']==true){

	$user_id=$_SESSION['id'];
	if($user_id==$row['user id']){

$title=$row['title'];
$discription=$row['discription'];
$price=$row['price'];
$contact=$row['contact'];
$image=$row['image'];
$cid=$row['category_id'];



?>
<div class="col-md-10"  id="main" style="height:1000px;">
<h1>edit listing</h1>
 <form role="form"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
 

 <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
 
 

  <div class="form-group">
  <div class="row">
   <div class="col-md-1"> <label for="title">title:</label></div>
   <div class="col-md-4"> <input type="text" value="<?php echo $title;?>" class="form-control" name="title">
   <span class="error"><?php echo $titlerr;?></span>
  </div></div></div>

  <div class="form-group">
  <div class="row">
   <div class="col-md-1"> <label for="discription">discription:</label></div>
   <div class="col-md-4"> <textarea class="form-control" name="discription"><?php echo $discription;?></textarea>
   <span class="error"> <?php echo $discriptionerr;?></span>
  </div></div></div>


<div class="form-group">
  <div class="row">
  <div class="col-md-1">  <label for="category">category:</label></div>
   <div class="col-md-4">  <select class="form-control" name="category">
    <?php 
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM category ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	if($row[id]==$cid){
    			echo "<option value=$row[id] selected>$row[name]</option>";
    	}
    	else{
    			echo "<option value=$row[id]>$row[name]</option>";	
    	}


       }}
else{
	$categoryerr="no catergory";
}
$conn->close(); ?>       
   
  </select>
   <span class="error"> <?php echo $categoryerr;?></span>
  </div></div></div>

  <div class="form-group">
  <div class="row">
  <div class="col-md-1">  <label for="price">price:</label></div>
   <div class="col-md-4">  <input type="number" class="form-control" name="price" value="<?php echo $price;?>">
   <span class="error"> <?php echo $pricerr;?></span>
  </div></div></div>

  <div class="form-group">
  <div class="row">
  <div class="col-md-1">  <label for="contact">contact:</label></div>
   <div class="col-md-4">  <input type="text" class="form-control" name="contact" value="<?php echo $contact;?>" >
   <span class="error"> <?php echo $contacterr;?></span>
  </div></div></div>

<div class="form-group">
  <div class="row">
  <div class="col-md-1">  <label for="image">image:</label></div>
   <div class="col-md-4">  <input type="file" value="<?php echo $image;?>"name="image">
   <span class="error"> <?php echo $imagerr;?></span>
  </div></div></div>

  <button type="submit" class="btn btn-default">submit</button>
</form>
<?php }}


else{

	echo "<h1> Page not found</h1>";
	//404 error
}
}

else{

	echo "<h1> Page not found</h1>";
	//404 error
}}






?>