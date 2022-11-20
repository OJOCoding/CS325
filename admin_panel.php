<!DOCTYPE html>
<html>
<head>
<title>Vinnie's Tratoria Admin Panel</title>
<style>
body {
  font-family: 'Helvetica Neue', Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  background: #2b2b2b; }
  @media screen and (max-width: 580px) {
    body {
      font-size: 16px;
      line-height: 22px; } }
h1{
	text-align:center;
	padding-top:5vw;
	color:white;
	font-size:3vw;
	letter-spacing:0.5em;
}
h2{
	color:white;
	padding:1vw;
}
.back{
	font-size:2vw;
	text-align:center;
	margin-top:-2vw;
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 90vw; }

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table; }
  @media screen and (max-width: 580px) {
    .table {
      display: block; } }

.row {
  display: table-row;
  background: #f6f6f6; 
}
  .row:nth-of-type(odd) {
    background: #e9e9e9; }
  .row.header {
    font-weight: 900;
    color: #ffffff;
    background: #ea6153; }
  .row.green {
    background: #27ae60; }
  .row.blue {
    background: #2980b9; }
  @media screen and (max-width: 580px) {
    .row {
      padding: 14px 0 7px;
      display: block;
	}
      .row.header {
        padding: 0;
        height: 6px; }
        .row.header .cell {
          display: none; }
      .row .cell {
        margin-bottom: 10px;
		
	 }
        .row .cell:before {
          margin-bottom: 3px;
          content: attr(data-title);
          font-size: 10px;
          line-height: 10px;
          font-weight: bold;
          text-transform: uppercase;
          color: #969696;
          display: block;
		 } 
		
		}

.cell {
  padding: 6px 12px;
  display: table-cell; 
  min-width: 75px;
}
a{
	text-decoration:none;
	color: #3b3b3b;
}
  @media screen and (max-width: 580px) {
    .cell {
      padding: 2px 16px;
      display: block; } }
</style>
</head>
<body>

<h1>ADMIN PANEL</h1>
<div class="wrapper">
<h2>BLOG TABLE</h2>
  <div class="table">
    
    <div class="row header">
      <div class="cell">
        ID
      </div>
      <div class="cell">
        Title
      </div>
      <div class="cell">
        Author
      </div>
      <div class="cell">
        Content
      </div>
	  <div class="cell">
        Date
      </div>
	  <div class="cell">
        Image URL
      </div>
	  <div class="cell">
        Actions
      </div>
    </div>
				<?php
					include('DBMS/db.php');
					$query=mysqli_query($conn,"select * from `blog`");
					while($row=mysqli_fetch_array($query))
					{
						?>
						 <div class="row">
							<div class="cell" data-title="ID">
								<?php echo $row['ID']; ?>
							</div>
							<div class="cell" data-title="Title">
								<?php echo $row['Title']; ?>
							</div>
							<div class="cell" data-title="Author">
								<?php echo $row['Author']; ?>      
							</div>
							<div class="cell" data-title="Content">
								<?php echo $row['Content']; ?>
							</div>
							<div class="cell" data-title="Date">
								<?php echo $row['Date_Created']; ?>
							</div>
							<div class="cell" data-title="Image_URL">
								<?php echo $row['Image_URL']; ?>      
							</div>
							<div class="cell" data-title="Actions">
							<a href="admin_edit.php?id=<?php echo $row['ID']; ?>&table=blog">Edit</a>
							<a href="admin_delete.php?id=<?php echo $row['ID']; ?>&table=blog">Delete</a>      
							</div>
						</div>
					<?php
					}
					?>
		</div>
		<h2>REVIEWS TABLE</h2>
		<div class="table">
    
    <div class="row header green">
      <div class="cell">
        ID
      </div>
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Email
      </div>
      <div class="cell">
        Review
      </div>
	  <div class="cell">
        Image URL
      </div>
	  <div class="cell">
        Actions
      </div>
    </div>
				<?php
					include('DBMS/db.php');
					$query=mysqli_query($conn,"select * from `reviews`");
					while($row=mysqli_fetch_array($query))
					{
						?>
						 <div class="row">
							<div class="cell" data-title="ID">
								<?php echo $row['ID']; ?>
							</div>
							<div class="cell" data-title="Name">
								<?php echo $row['Name']; ?>
							</div>
							<div class="cell" data-title="Email">
								<?php echo $row['Email']; ?>      
							</div>
							<div class="cell" data-title="Review">
								<?php echo $row['Review']; ?>
							</div>
							<div class="cell" data-title="Image_URL">
								<?php echo $row['Image_URL']; ?>      
							</div>
							<div class="cell" data-title="Actions">
							<a href="admin_edit.php?id=<?php echo $row['ID']; ?>&table=reviews">Edit</a>
							<a href="admin_delete.php?id=<?php echo $row['ID']; ?>&table=reviews">Delete</a>      
							</div>
						</div>
					<?php
					}
					?>
		</div>
		<h2>JOB APPLICATION FILES TABLE</h2>

		<div class="table">
    
    <div class="row header blue">
      <div class="cell">
        ID
      </div>
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Date-Applied
      </div>
      <div class="cell">
        Download CV PDF
      </div>
	  <div class="cell">
        Actions
      </div>
    </div>
				<?php
					include('DBMS/db.php');
					$query=mysqli_query($conn,"select * from `job_app_files`");
					while($row=mysqli_fetch_array($query))
					{
						?>
						 <div class="row">
							<div class="cell" data-title="ID">
								<?php echo $row['ID']; ?>
							</div>
							<div class="cell" data-title="Name">
								<?php echo $row['Name']; ?>
							</div>
							<div class="cell" data-title="Date_Applied">
								<?php echo $row['Created']; ?>      
							</div>
							<div class="cell" data-title="Download CV PDF">
							<a href="get_file.php?ID=<?php echo $row['ID'];?>">Download</a>
							</div>
							<div class="cell" data-title="Actions">
							<a href="admin_delete.php?id=<?php echo $row['ID']; ?>&table=job_app_files">Delete</a>      
							</div>
						</div>
					<?php
					}
					?>
		</div>
		<h2>NEWSLETTER SUBSCRIPTION TABLE</h2>
						
		<div class="table">
    
    <div class="row header">
      <div class="cell">
        ID
      </div>
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Email
      </div>
	  <div class="cell">
        Actions
      </div>
    </div>
				<?php
					include('DBMS/db.php');
					$query=mysqli_query($conn,"select * from `newsletter`");
					while($row=mysqli_fetch_array($query))
					{
						?>
						 <div class="row">
							<div class="cell" data-title="ID">
								<?php echo $row['ID']; ?>
							</div>
							<div class="cell" data-title="Name">
								<?php echo $row['Name']; ?>
							</div>
							<div class="cell" data-title="Email">
								<?php echo $row['Email']; ?>      
							</div>
							<div class="cell" data-title="Actions">
							<a href="admin_delete.php?id=<?php echo $row['ID']; ?>&table=newsletter">Delete</a>           
							</div>
						</div>
					<?php
					}
					?>
		</div>
				</div>
	<h2 class="back"><a href="index.html">BACK</a></h2>
</body>
</body>
</html>