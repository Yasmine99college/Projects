<!DOCTYPE html>
<html>
<head>
	<title>katkota</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css?version=51">
  <link rel="stylesheet" href="style.css">
</head>
<!-- <style>
	#signup{
		width: 20%;
		background-color: gray;
		color: white;
		transition: 0.5s;
	}
	#login{
		width: 20%;
		background-color:gray;
		
		color: white;
		transition: 0.5s;
	}
	#signup:hover{
		width: 20%;
		background-color:#7777ff;
		color: white;
		transition: 0.5s;
	}
	#login:hover{
		width: 20%;
		background-color:#7777ff;
		color: white;
		transition: 0.5s;
	}	
	.well{
		background-color: #7777ff;
	}
</style> -->
<body>

 
		<!-- <div class="row"> -->
	
		<div class="well">
			<center><img src="logo.jpg"width="160px" height="160px" id="im"></center>
		</div>
	
<!-- </div> -->
		<div>
			<form method="post" action="">
				<center><button id="signup" class="btn btn-outline-danger" name="signup">Sign up</button></center><br><br>
				<?php
					if(isset($_POST['signup'])){
						header("Location:signup.php");
					}
				?>
				<center><button id="login" class="btn btn-outline-danger" name="login">Login</button></center><br><br>
				<?php
					if(isset($_POST['login'])){
						header("Location:signin.php");
					}
				?>
			</form>
		</div>
	</body>
</html>