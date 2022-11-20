<?php
  require "DBMS/db.php";

  $query = "SELECT * FROM `reviews`";

  $result = mysqli_query($conn,$query);

  $reviews = mysqli_fetch_all($result,MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

.review_pattern {
  background-image: url("images/review_pattern.jpg");
  background-repeat: repeat-x;
  height: 15vw;
  background-size: 20vw 20vw;
  width: 100vw;

}

.review_pattern h1 {
  margin-top: 18.5vw;
  position: absolute;
  margin-left: 28.5vw;
  font-family: 'Roboto', 'sans-serif';
  color: #383127;
  font-size: 1.5vw;
  font-weight: 700;
  letter-spacing: 0.15em;

}

#second-part {
  margin-top: 4vw;
  width: 100%;
  font-family: 'Roboto', 'sans-serif';
  text-align: center;
  color: #383127;
}

#second-part h1 {
  font-size: 1.5vw;
  font-weight: 700;
  letter-spacing: 0.5rem;
}
#second-part a{  
  text-decoration: none;
  color:#383731;
}

#second-part h2 {
  font-size: 1.25vw;
  font-weight: 500;
  letter-spacing: 0.25rem;
}

.socials {
  margin: 2.5vw 25vw;
  width: 50%;
  display: flex;
  justify-content: space-evenly;
}

.socials img {
  width: 3vw;
  aspect-ratio: 1/1;
}

.reviews {
  position: relative;
  overflow: hidden;
  padding: 20px 15vw;
  width: 70vw;
  margin-top: 7.5vw;
}

.review-container {
  padding: 0 2.5vw;
  display: flex;
  overflow-x: auto;
  scroll-behavior: smooth;
}

.review-container::-webkit-scrollbar {
  display: none;
}

.review-card {
  flex: 0 0 auto;
  width: 17.5vw;
  height: 22.5vw;
  margin-right: 40px;
  background: conic-gradient(from 180deg at 50% 50%, #F8B960 0deg, rgba(248, 185, 96, 0) 223.13deg, #F8B960 360deg);
  border-radius: 45px;
  gap: 2.5vw;
}

.review-image {
  position: relative;
  width: 10vw;
  height: 10vw;
  overflow: hidden;
  margin-left: 3.75vw;
  margin-top: 2vw;

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
.review-thumbnail {
  width: 100%;
  height: 110%;
  object-fit: cover;
}

.review-info {
  width: 100%;
  height: 100px;
  text-align: center;
}

.review-short-description {
  width: 75%;
  height: 18px;
  line-height: 20px;
  margin-left: 2.25vw;
  font-size: medium;
  font-family: 'Roboto', sans-serif;

}

.costumer{
  font-size: larger;
  text-transform: uppercase;
  font-family: 'Roboto', sans-serif;

}

.pre-btn,
.nxt-btn {
  border: none;
  width: 10vw;
  height: 100%;
  position: absolute;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, #fff 100%);
  cursor: pointer;
  z-index: 8;
}

.pre-btn {
  left: 10vw;
  transform: rotate(180deg);
}

.nxt-btn {
  right: 10vw;
}

.pre-btn img,
.nxt-btn img {
  opacity: 0.2;
}

.pre-btn:hover img,
.nxt-btn:hover img {
  opacity: 1;
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
            <a href="reviews.php">REVIEWS</a>           
            <a href="blog_index.php">BLOG</a>
            <a href="gallery.html">GALLERY</a>
            <a href="contact.html">CONTACT</a>
        </nav>
    </header>
    <section class="review_pattern ">
        <h1>HERE IS WHY PEOPLE COME BACK FOR MORE</h1>
    </section>
    <section class="reviews">
        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="review-container">
            <?php foreach($reviews as $review): ?>
            <div class="review-card">
            <div class="review-image">
                <img class="review-thumbnail" src="<?php echo $review["Image_URL"] ?>" alt="">
            </div>
            <div class="review-info">
                <h2 class="costumer"><?php echo $review["Name"]?></h3>
                <p class="review-short-description"><?php echo $review["Review"] ?></p>
            </div></div>
            <?php endforeach; ?>
        
    </section>
    <section id="second-part">
        <a href="add_review.php"><h1>LEAVE US A REVIEW </h1></a>
        <h2>~ Write about us on review sites, social medias or send us a message below ~</h2>
        <div class="socials">
            <a href="https://google.com/"><img src="images/social_logos/googlelogo.webp" alt=""></a>
            <a href="https://www.facebook.com/"><img src="images/social_logos/facebooklogo.png" alt=""></a>
            <a href="https://www.instagram.com/"><img src="images/social_logos/instagramlogo.png" alt=""></a>
            <a href="https://www.twitter.com/"><img src="images/social_logos/twitterlogo.png" alt=""></a>
            <a href="https://www.tripadvisor.com/"><img src="images/social_logos/tripadvisorlogo.png" alt=""></a>
        </div>
    </section>
    <script src="JavaScript/reviews.js"></script>
    <footer>
        <p>© 2022 CS 325: FALL PROJECT SUBMISSION BY <a href="credits.html">ONI LUCA</a></p>
    </footer>
</body>
</html>