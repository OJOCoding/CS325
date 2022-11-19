<?php
  require_once "DBMS/db.php";

  if(isset($_POST["submit"])){

    $Update_ID = mysqli_real_escape_string($conn,$_POST["Update_ID"]);
    $Title = mysqli_real_escape_string($conn,$_POST["Title"]);
    $Author = mysqli_real_escape_string($conn,$_POST["Author"]);
    $Content = mysqli_real_escape_string($conn,$_POST["Content"]);
    $Image_URL = mysqli_real_escape_string($conn,$_POST["Image_URL"]);

    $query = "UPDATE `blog` SET `Title` = '$Title', `Author` = '$Author', `Content` = '$Content', `Image_URL` = '$Image_URL' WHERE `blog`.`ID` = $Update_ID";

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
    overflow: hidden;
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
    position:absolute;
    left: 0;
    right: 0;
    bottom: 0;
}

.editor{
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    font-size:1.5vw;
    line-height: 25px;
    color: #383127;
    text-decoration: none;
    letter-spacing: 0.3em;
   text-transform:uppercase;
    text-align:center;
    margin-top:5vw;
}


input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
  font-family: 'Roboto', sans-serif;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-family: 'Roboto', sans-serif;
}

input[type=submit] {
  background-color: #A10412;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  float: right;
  font-family: 'Roboto', sans-serif;
  margin-top:1vw;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:80vw;
  margin: 5vw 10vw;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
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
    <div class="editor">
        <h1>Blog Editor</h1>
    </div>
    <div class="container">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <div class="row">
      <div class="col-25">
        <label for="title">Blog Title</label>
      </div>
      <div class="col-75">
      <input id="title" type="text" name="Title" value="<?php echo $blog["Title"] ?>"> 
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="author">Author</label>
      </div>
      <div class="col-75">
        <input id="author" type="text" name="Author" value="<?php echo $blog["Author"] ?>"> 
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="content">Blog Content</label>
      </div>
      <div class="col-75">
        <textarea id="Content" name="Content" style="height:10vw"><?php echo $blog["Content"] ?></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Image_URL">Image URL</label>
      </div>
      <div class="col-75">
      <input id="box" type="text" name="Image_URL" value="<?php echo $blog["Image_URL"] ?>"> 
      </div>
    </div>
    <div class="row">
    <input type="hidden" name="Update_ID" value="<?php echo $blog["ID"] ?>">
            <input id="submit" type="submit" value="Submit" name="submit">
    </div>
  </form>
</div>
</main>
<footer>
        <p>© 2022 CS 325: FALL PROJECT SUBMISSION BY <a href="credits.html">ONI LUCA</a></p>
    </footer>
</body>

</html>