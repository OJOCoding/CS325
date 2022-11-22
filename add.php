<?php
require "DBMS/db.php";

if (isset($_POST["submit"])) {
    $Title = mysqli_real_escape_string($conn, $_POST["Title"]);
    $Author = mysqli_real_escape_string($conn, $_POST["Author"]);
    $Content = mysqli_real_escape_string($conn, $_POST["Content"]);
    $Image_URL = mysqli_real_escape_string($conn, $_POST["Image_URL"]);

    $query = " INSERT INTO `blog` (`ID`, `Title`, `Author`, `Content`, `Date_Created`,`Image_URL`) VALUES (NULL, '$Title', '$Author', '$Content', current_timestamp(), '$Image_URL');";

    header("Location: " . ROOT_URL . "blog_index.php");
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Vinnie's Tratoria</title>
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
    position:fixed;
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
  padding: 20px;
  width:80vw;
  background: radial-gradient(50% 60% at 50% 50%, #F8B960 0%, rgba(248, 185, 96, 0.48) 100%);
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
        <h1>Blog Your Way</h1>
    </div>
    <div class="container">
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    
  <div class="row">
      <div class="col-25">
        <label for="title">Blog Title</label>
      </div>
      <div class="col-75">
      <input type="text" name="Title">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="author">Author</label>
      </div>
      <div class="col-75">
      <input type="text" name="Author">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="content">Blog Content</label>
      </div>
      <div class="col-75">
        <textarea id="Content" name="Content" style="height:10vw"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Image_URL">Image URL</label>
      </div>
      <div class="col-75">
      <input id="box" type="text" name="Image_URL"> 
      </div>
    </div>
    <div class="row">
    <input type="submit" value="Submit" name="submit">

    </div>
  </form>
</div>
<footer>
        <p>© 2022 CS 325: FALL PROJECT SUBMISSION BY <a href="credits.html">ONI LUCA</a></p>
    </footer>
</body>
</html>
