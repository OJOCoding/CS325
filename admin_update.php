<?php

include "DBMS/db.php";
$ID = mysqli_real_escape_string($conn,$_GET["ID"]);	
$table=$_GET['table'];

if ( $table == 'blog' ){ 
  
  $ID = mysqli_real_escape_string($conn,$_GET["ID"]);	
  $Title = mysqli_real_escape_string($conn,$_POST["Title"]);
  $Author = mysqli_real_escape_string($conn,$_POST["Author"]);
  $Content = mysqli_real_escape_string($conn,$_POST["Content"]);
  $Image_URL = mysqli_real_escape_string($conn,$_POST["Image_URL"]);

  $query = "UPDATE `blog` SET `Title` = '$Title', `Author` = '$Author', `Content` = '$Content', `Image_URL` = '$Image_URL' WHERE `blog`.`ID` = $ID";

  if(mysqli_query($conn,$query)){
    header("Location: ".ROOT_URL."admin_panel.php");
  }else{
    echo "ERROR:".mysqli_error($conn);
  }

} 


if ( $table == 'review' ) { 
  
  $ID = mysqli_real_escape_string($conn,$_GET["ID"]);	
  $Name = mysqli_real_escape_string($conn,$_POST["Name"]);
  $Email = mysqli_real_escape_string($conn,$_POST["Email"]);
  $Review = mysqli_real_escape_string($conn,$_POST["Review"]);
  $Image_URL = mysqli_real_escape_string($conn,$_POST["Image_URL"]);

  $query = "UPDATE `reviews` SET `Name` = '$Name', `Email` = '$Email', `Review` = '$Review', `Image_URL` = 'Image_URL' WHERE `reviews`.`ID` = $ID";


  if(mysqli_query($conn,$query)){
    header("Location: ".ROOT_URL."admin_panel.php");
  }else{
    echo "ERROR:".mysqli_error($conn);
  }
}
?>
