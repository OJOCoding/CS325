<?php
  require "DBMS/db.php";

  $query = "SELECT * FROM `blog`";

  $result = mysqli_query($conn,$query);

  $blogs = mysqli_fetch_all($result,MYSQLI_ASSOC);

  mysqli_free_result($result);

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
    <script>
        function doSth(i){
            if(!confirm("Thank you for subscribing to our newsletter! Press Ok to continue!")) {
                return false;
            }
            this.form.submit();
        }
    </script>
    <style>html,
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
    position: fixed;
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
    margin-top: 2.25vh;
    background-color: #A10412;
    color: #fbfaf1;
    left: 0;
    right: 0;
    bottom: 0;
}

.blog-banner {
    height: 37.5vw;
    top: 5vw;
    text-align: center;
}

.blurry {
    height: 37.5vw;
    object-fit: cover;
    filter: blur(5px);
    z-index: 1;
    width: 100vw;
}

.blog-banner h1 {
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    font-size: 2.5vw;
    line-height: 25px;
    color: #fbfaf1;
    text-decoration: none;
    letter-spacing: 0.3em;
    position: relative;
    top: -15vw;
}

.blog-banner h2 {
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 1.5vw;
    line-height: 25px;
    color: #fbfaf1;
    text-decoration: none;
    letter-spacing: 0.2em;
    position: relative;
    top: -14vw;
}
.wrapper {
    display: grid;
    grid-template-columns: 3fr 1fr;
    margin-top: 5vw;
    margin-left: 5vw;
    width: 80vw;
    z-index: 1;
}

.blog_content {
    height: 22.5vw;
    width: 50vw;
}

.blog-img {
    height: 20vw;
    width: 35vw;
    margin-left: 5vw;
}

#image{
    height: inherit;
    width: inherit;
    object-fit: cover;
    border-radius: 30px;
}

#content {
    color: #383127;
    text-decoration: none;
    font-size: 1.3vw;
    font-weight: 400;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    font-style: italic;
}

#read-more {
    text-decoration: none;
    color: #383127;
    text-decoration: none;
    font-size: 1.2vw;
    font-weight: 600;
    letter-spacing: 0.1em;
}

#add {
    text-decoration: none;
    color: #383127;
    text-decoration: none;
    font-size: 1.5vw;
    font-weight: 700;
    letter-spacing: 0.2em;
    margin:5vw;
}

#Date {
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
    font-size: 1.25vw;
    font-weight: 500;
}

#blog-header {
    text-decoration: none;
    color: #383127;
    font-size: 1.5vw;
    letter-spacing: 0.15em;
    text-transform: uppercase;
}

input[type=submit]{
    padding: 0.75vw;
    border-radius: 15px;
    border: 0;
    background-color: #fbfaf1;
    color: #383127;
    box-shadow: 4px 4px 10px rgb(0 0 0 / 6%);
    resize: none;
    font-family: 'Roboto', sans-serif;
    cursor: pointer;
    height: 3.5vw;
    text-transform: uppercase;
    font-weight: 700;
    width:7vw;
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

input[type=text], select, textarea {
    padding: 1vw;
    border-radius: 15px;
    border: 0;
    letter-spacing: 0.1em;
    font-weight: 500;
    background-color: #fbfaf1;
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.06);
    resize: none;
    height: 1.5vw;
    text-align: center;
    overflow-y: hidden;
    font-family: 'Roboto', sans-serif;
    font-size: medium;
    margin-right: 1vw;
}

.newsletter {
    background-color: rgba(248, 185, 96, 1);
    height: 12vw;
    width: 60vw;
    border-radius: 30px;
    padding-top: 0.5vw;
    text-align: center;
    margin: 5vw 20vw;
}

.newsletter h1 {
    color: #383127;
    font-size: 2vw;
    font-weight: 700;
    font-family: 'Roboto', 'sans-serif';
}

.newsletter h2 {
    margin-top: -1vw;
    color: #383127;
    font-size: 1.35vw;
    font-weight: 400;
    font-family: 'Roboto', 'sans-serif';
}

.submission-area {
    display: flex;
    justify-content: space-between;
    margin-left: 15%;
    margin-right: 15%;
    margin-top: 1vw;
}
html {
    scroll-behavior: smooth;
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
    <section class="blog-banner">
            <img class="blurry" src="images/Blog_Header.jpg" alt="">
            <h1>FOOD & INSIGHTS AT VINNIE’S TRATTORIA</h1>
            <h2>CHECK OUT SOME OF OUR RECENT NEWS AND ACHIEVEMENTS</h2>
</section>
<section>
            <div class="wrapper">
            <?php foreach($blogs as $blog): ?>
            <div class="blog_content">
                <p id="Date">DATE <?php echo $blog["Date_Created"]?></p>
                <h1 id="blog-header"><?php echo $blog["Title"] ?></h1>
                <h3 id="author"><?php echo $blog["Author"]?></h3>
                <p id="content"><?php echo $blog["Content"] ?></p>
                <a id="read-more" href="blog.php?ID=<?php echo $blog['ID']; ?>">Read More</a>
            </div>
            <div class="blog-img">
                <img id="image" src="<?php echo $blog["Image_URL"] ?>" alt="">
            </div>
            <?php endforeach; ?>
                
            </div>
        </section>
        <section>
            <a id="add" href="<?php echo ROOT_URL ?>add.php">Do you want to blog?</a>
        </section>
        <section class="newsletter">
            <h1>SUBSCRIBE TO OUR NEWSLETTER</h1>
            <h2>FOR EXCLUSIVE RECIPIES, CHEF RECOMANDATIONS & MORE EXCITING NEWS </h2>
            <div class="submission-area">
            <a id="newsletter"></a>
            <form action="newsletter.php" method="post" onsubmit="doSth(event)" auto_complete="off">
            <input type="text" name="Name" placeholder="Full Name">
            <input type="text" name="Email" placeholder="Email">
            <input type="submit" value="Submit" name="submit">
            </form>
            </div>
        </section>
    </main>
    <footer>
        <p>© 2022 CS 325: FALL PROJECT SUBMISSION BY <a href="credits.html">ONI LUCA</a></p>
    </footer>
</body>

</html>