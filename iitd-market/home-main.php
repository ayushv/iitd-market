

<?php 
$category="";
$page=0;
$search="";
if(isset($_GET['q'])){

  $search=$_GET["q"];

}



if(isset($_GET['cat'])){

  $category=(int)(test_input($_GET['cat']));

}
// Check that the page number is set.
if(!isset($_GET['page'])){
    $page = 0;
}else{
    // Convert the page number to an integer
    $page = (int)$_GET['page'];
}

 $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
 
if(!empty($category)){
  if(empty($search)){
  $sql = "SELECT COUNT(*) as `total` FROM `listings` where `category_id`=$category";}
  else{
    $sql = "SELECT COUNT(*) as `total` FROM `listings` where `category_id`=$category AND `title` LIKE '%$search%' OR `discription` LIKE '%$search%'" ;
  }}
else{
 if(empty($search)){
  $sql = "SELECT COUNT(*) as `total` FROM `listings` ";}
  else{
    $sql = "SELECT COUNT(*) as `total` FROM `listings` where  `title` LIKE '%$search%' OR `discription` LIKE '%$search%'" ;
  }
}
  $result = $conn->query($sql);
  echo $sql.$conn->error;
if($result->num_rows>0){
$row = $result->fetch_assoc();
$totalListings=$row['total'];
if($totalListings>0){
$totalPages = ceil($totalListings / $ListingsPerPage);

// If the page number is less than 1, make it 1.
if($page < 1){
    $page = 1;
    // Check that the page is below the last page
}else if($page > $totalPages){
    $page = $totalPages;
}
?>
<div class="col-md-10"  id="main" style="height:1000px; ">
  <div class="row">
  <div class="col-md-12">
<table class="table table-stripe">
    <thead>
      <tr>
        <th>Star</th>
        <th>Images?</th>
        <th>Details</th>
        <th>Renewed</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
     
     <?php 

$start=($page-1)*$ListingsPerPage;

   

if(empty($category)){
if(empty($search)){
  $sql = "SELECT * FROM listings LIMIT $start, $ListingsPerPage" ;}
else{
  $sql = "SELECT * FROM listings where `title` LIKE '%$search%' OR `discription` LIKE '%$search%' LIMIT $start, $ListingsPerPage" ;
}
}

else{
  if(empty($search)){

  $sql="SELECT * FROM listings  where `category_id`=$category LIMIT $start, $ListingsPerPage";

}
else{

  $sql = "SELECT * FROM listings where `category_id`=$category  AND `title` LIKE '%$search%' OR `discription` LIKE '%$search%' LIMIT $start, $ListingsPerPage" ;

}}

$result = $conn->query($sql);
echo $conn->error;
if ($result->num_rows > 0) {
    // output data of each row
  $star_id=1;
    while($row = $result->fetch_assoc()) {
       echo "
 <tr>
 <td><span id='star$star_id' style='display:none;'class='glyphicon glyphicon-star'></span>
 <span id='unstar$star_id' class='glyphicon glyphicon-star-empty'></span></td>
 " ;
 $star_id+=1;
 if(empty($row['image'])){
 echo "<td>No</td>"; 
 }
 else{
  echo "<td>Yes</td>"; 
 }
 echo"
<td><a href='view-listing.php?id=".$row['listing id']."'>$row[title]</a></td>
<td>$row[time]</td>
<td>$row[price]</td>
</a></tr>"

;}}
?>
</tbody>
  </table>
</div>
</div>
<div class="container">
<div class="row">
<br>
  <ul class="pagination">
  <?php

  foreach(range(1, $totalPages) as $index){
    if($index == 1 || $index == $totalPages || ($index >= $page - 2 && $index <= $page + 2)){
        if($index==$page){
          echo '<li class="active"><a href="?page=' . $index . '">' . $index . '</a></li>';
    }
    else{
         echo '<li><a href="?page='.$index.' &cat='.$category.' ">' . $index . '</a></li>'; 
    }
}
}
 

}
else{

//404 
  }
}
else{
  //404
}
  
?>
  </ul></div>
</div>

