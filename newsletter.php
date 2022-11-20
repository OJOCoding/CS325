<?php
  require "DBMS/db.php";
  if(isset($_POST["submit"])){
    $Name = mysqli_real_escape_string($conn,$_POST["Name"]);
    $Email = mysqli_real_escape_string($conn,$_POST["Email"]);
    $query = " INSERT INTO `newsletter` (`ID`, `Name`, `Email`) VALUES (NULL, '$Name', '$Email');";

    header("Location: ".ROOT_URL."blog_index.php");
    mysqli_query($conn,$query);
  }
?>
