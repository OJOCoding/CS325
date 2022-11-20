<?php
  require "DBMS/db.php";

  if(isset($_POST["Delete_Blog"])){

    $Delete_ID = mysqli_real_escape_string($conn,$_POST["Delete_ID"]);

  $query = "DELETE FROM blog WHERE `blog`.`ID` = '$Delete_ID'";

    if(mysqli_query($conn,$query)){
      header("Location: ".ROOT_URL."blog_index.php");
    }else{
      echo "ERROR:".mysqli_error($conn);
    }
  }

  $ID = mysqli_real_escape_string($conn,$_GET["ID"]);

  $query = "SELECT * FROM `blog` WHERE `ID` = $ID ";

  $result = mysqli_query($conn,$query);

  $blog = mysqli_fetch_assoc($result);

  mysqli_free_result($result);

  mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Vinnie's Trattoria</title>
    <style>
        html,
body {
    max-width: 100%;
    overflow-x: hidden;
    padding: 0;
    margin: 0;
}

body {
    background-color: #fbfaf1;
    width: 100vw;
}

header {
    display: flex;
    justify-content: space-between;
    height: 5vw;
    top: 0;
    background-color: #fbfaf1;
    width: 100vw;
    z-index: 99;
}

.logo {
    aspect-ratio: 1 / 1;
    height: 7vh;
    align-self: center;
}

#header_tittle {
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 1.25vw;
    line-height: 25px;
    letter-spacing: 0.55em;
    color: #383127;
    text-decoration: none;
    margin-left: 3vw;
    align-self: center;
    flex-grow: 1;
    flex-basis: 0;
}

.navigation a {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 1vw;
    line-height: 25px;
    color: #383127;
    text-decoration: none;
    letter-spacing: 0.05em;
}

.navigation {
    display: flex;
    justify-content: end;
    align-self: center;
    margin-right: 3vw;
    flex-grow: 1;
    flex-basis: 0;
    gap: 1vw;
}

footer * {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 0.9vw;
    line-height: 25px;
    color: #fbfaf1;
    text-decoration: none;
    letter-spacing: 0.1em;
    margin-right: 1vw;
    margin-right: 2.8vw;
}

footer a {
    color: #383127;
    font-weight: 600;
}


footer {
    padding: 0;
    display: flex;
    justify-content: end;
    margin-top: 5vw;
    background-color: #A10412;
    color: #fbfaf1;
    left: 0;
    right: 0;
    bottom: 0;
}

.top{
    width:80vw;
    height:30vw;
    display: flex;
    flex-direction:row;
    justify-content:space-evenly;
    margin:2vw 10vw;
    margin-top:3vw;
}
.left{
    width:60%;
    margin-right:5vw;
    overflow:hidden;
}
.left img{
    height:30vw;
    object-fit:cover;
    
}
.right{
    width:40%
}

#blog_header {
    text-decoration: none;
    color: #383127;
    font-size: 2vw;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
}

#content {
    color: #383127;
    text-decoration: none;
    font-size: 1.3vw;
    font-weight: 400;
    overflow: hidden;
}

#date {
    text-decoration: none;
    color: #383127;
    text-decoration: none;
    font-size: 1vw;
    font-weight: 600;
    letter-spacing: 0.2em;
}

#author {
    text-decoration: none;
    color: #383127;
    text-decoration: none;
    font-size: 1.5vw;
    font-weight: 500;
    letter-spacing:0.3em;
}
.bottom{
    width:80vw;
    margin: 1vw 10vw;
}


.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fbfaf1;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 15px;
}

.dropdown-content a {
    float: none;
    color: #383127;
    padding: 10px 10px;
    text-decoration: none;
    display: block;
    text-align: left;
    border-radius: 15px;

}

.dropdown-content a:hover {
    background-color: #fbfaf1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.button1 {
  background-color: #A10412;
  border: none;
  border-radius:45px;
  color: #fbfaf1;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
  text-transform:uppercase;
}
.buttons{
    width:20vw;
    display: flex;
    flex-direction:row;
    justify-content:space-evenly;    
    margin:2.5vw 40vw;
}

    </style>
</head>

<body>
    <header>
        <a href="index.html" id="header_tittle">Vinnie's trattoria</a>

                  <img class="logo" src="images\logo.png" alt="">
        <nav class="navigation">
            <a href="home.html">HOME</a>
            <div class="dropdown">
            <a id="drop" href="about_us.html">ABOUT US</a> 
                <div class="dropdown-content">
                  <a href="hiring.php">JOIN US</a>
                </div>
              </div> 
              <div class="dropdown">
                <a id="drop" href="menu.html">MENU</a> 
                    <div class="dropdown-content">
                      <a href="delivery.html">DELIVERY</a>
                    </div>
                </div> 
                <div class="dropdown">
                <a id="drop" href="reviews.php">REVIEW</a> 
                    <div class="dropdown-content">
                      <a href="add_review.php">ADD REVIEW</a>
                    </div>
                  </div>
                  <div class="dropdown">
                  <a id="drop" href="blog_index.php">BLOG</a> 
                    <div class="dropdown-content">
                      <a href="add.php">ADD BLOG</a>
                    </div>
                  </div>              
            <a href="gallery.html">GALLERY</a>
            <a href="contact.html">CONTACT</a>
        </nav>
    </header>
    <main>
    <div class="blog">
    <div class="top">
        <div class="left">
            <img id="image" src="<?php echo $blog["Image_URL"] ?>" alt="">
        </div>
        <div class="right">
            <div class="div1"> <p id="date"><?php echo $blog["Date_Created"]  ?></p></div>
            <div class="div2"> <h1 id="blog_header"><?php echo $blog["Title"] ?></h1></div>
            <div class="div3"> <h3 id="author">By: <?php echo $blog["Author"]?></h3></div>
        </div>
    </div>
    <div class="bottom">
    <p id="content"><?php echo $blog["Content"] ?></p>
    </div>   
    </div>
    <div class="buttons">
    <a href="<?php echo ROOT_URL ?>edit.php?ID=<?php echo $blog["ID"] ?>" class="button1">Edit</a>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
      <input type="hidden" name="Delete_ID" value="<?php echo $blog["ID"] ?>">
      <input type="submit" value="Delete" name="Delete_Blog" class="button1">
    </form>
    </div>
</main>
    <footer>
        <p>© 2022 CS 325: FALL PROJECT SUBMISSION BY <a href="credits.html">ONI LUCA</a></p>
    </footer>
</body>

</html>