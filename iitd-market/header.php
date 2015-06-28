<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Bootstrap 101 Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">


  for (var i = 1; i <=5; i++) {
    var i=''+ i
    var unstar='unstar'+i;
    var star='star'+i;
  document.getElementById(unstar).onclick =star_func(star,unstar) ;
  document.getElementById(star).onclick =unstar_func(star,unstar) ;

};

  function star_func(star,unstar){
document.getElementById(unstar).style="display:none";
document.getElementById(star).style="display:inline";

}
function unstar_func(star,unstar){

document.getElementById(star).style="display:none";
document.getElementById(unstar).style="display:inline";

}
</script>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  

<div class="container" >
<div class="row" style="background-color:aliceblue;">
<div class="col-md-3">
  <a href="home.php" ><h1> IITD-Market </h1></a>
</div>
<br>
<div class="col-md-4">
 <form class="form-horizontal" role="form" method="get" action="home.php">
  <div class="form-group">
  
  <input type="search" class="form-control" name="q">
  </div>
 </div>
<div class="col-md-2">
 <div class="form-group">
  <select class="form-control" name="cat">
  <option selected>All categories</option>
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

      echo  '<option value="'.$row["id"].'">'.$row["name"].'</option>';}}
      $conn->close();

  ?>



    </select>
</div></div>
  <div class="col-md-2" style="width:12%">
  <input type="submit" class="btn btn-info " value="Submit Button">
  </div></form>
  </div>

