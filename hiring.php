<?php
  require "DBMS/db.php";

  if(isset($_POST["submit"])){
    $Name = mysqli_real_escape_string($conn,$_POST["Name"]);
    $Age = mysqli_real_escape_string($conn,$_POST["Age"]);
    $Email = mysqli_real_escape_string($conn,$_POST["Email"]);
    $File = real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));;

    $query = " INSERT INTO `applications` (`ID`, `Name`, `Age`, `Email`, `PDF`) VALUES (NULL, '$Name', '$Age', '$Email', '$File');";

    header("Location: ".ROOT_URL."hiring.php");
    mysqli_query($conn,$query);
  }
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/hiring.css">
    <title>Vinnie's Trattoria</title>
    <script>
        function doSth(i){
            if(!confirm("Thank you for your appliication. You will be contacted shortly! Press Ok to continue!")) {
                return false;
            }
            this.form.submit();
        }
    </script>
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

        footer *{
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
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
        }

        body {
            background-image: url("images/hiring_img.jpg");
            background-repeat: no-repeat;
            background-size: 100vw 60vw;
        }

        .form {
            background-color: rgba(251, 250, 241, 0.75);
            height: 25vw;
            width: 45vw;
            position: absolute;
            top: 10vw;
            left: 5vw;
            border-radius: 15px;
            padding-top: 2vw;
            text-align:center;

        }
    .form h1{
        font-family: 'Roboto', 'sans-serif';
        color: #383127;
        font-size: 1.5vw;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        margin-top: 2.5vw;
    } 
    .form h2{
        font-family: 'Roboto', 'sans-serif';
        color: #383127;
        font-size: 1.5vw;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        margin-top: 2.5vw;
    } 
    .form p{
        font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 1.25vw;
            line-height: 25px;
            color: #383127;
            text-decoration: none;
            letter-spacing: 0.1em;
            margin-right: 1vw;
            margin-right: 2.8vw;
    }
   
input[type=submit] {
  background-color: #A10412;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  font-family: 'Roboto', sans-serif;
  font-size:1vw;
  margin-top:1vw;
}

input[type="file"]::file-selector-button {
  padding: 0.2em 0.4em;
  border-radius: 0.2em;
  background-color: #a10412;
  color:#fbfaf1;
}
.label{
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 1.25vw;
    line-height: 25px;
    color: #383127;
    text-decoration: none;
    letter-spacing: 0.1em;
    margin-left:10vw;
    margin-top:1.5vw;
    margin-bottom:1vw;
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
        <div class="form">
                    <h1>WANT TO JOIN THE TEAM?</h1>
                    <h2>Apply Now!</h2>
                    <p>Upload your CV below in a PDF file format labeled in this fashion "Name_LastName.pdf"</p>
                    <form action="add_file.php" method="post" enctype="multipart/form-data" onsubmit="doSth(event)">
                        <input class="label" type="file" name="uploaded_file"><br>
                        <input type="submit" value="Upload file">
                    </form>
        </div>
    </main>
    <footer>
        <p>© 2022 CS 325: FALL PROJECT SUBMISSION BY <a href="credits.html">ONI LUCA</a></p>
    </footer>
</body>

</html>