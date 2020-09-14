<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css?version=51">
  <link rel="stylesheet" href="style.css">
</head>
<!-- <style>
	.cont{
		width: 50%;
		margin: 10px auto;
		background-color: #fff;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
	}
	.well{
		background-color: #660066;
	}
	#signup{
		width: 20%;
		background-color: gray;
		color: white;
		transition: 0.5s;
	}
	#signup:hover{
		width: 20%;
		background-color:#660066;
		color: white;
		transition: 0.5s;
	}
</style> -->
<body>
<!-- <div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><h1 style="color: white;">Connect to your buddies! ^_^</h1></center>
		</div>
	</div> 

</div>-->
<div class="row">
	<div >
		<div class="well">
			<center><h1 style="color: skyblue;">Connect to your buddies! ^_^</h1></center>
		</div>
	</div>
</div>
	<div class="cont">
				<center><h3><strong>Sign up  ^_^</strong></h3></center>
				<form action="" method="post" name="myForm">
						<h5>Enter your first name</h5>
						<input type="text" class="form-control" placeholder="First Name" name="first_name" required="required">
					<br>
						<h5>Enter your last name</h5>
						<input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required">
					<br>
						<h5>Enter your password</h5>
						<input id="password" type="password" class="form-control" placeholder="Password" name="pw" required="required">
					<br>
						<h5>Enter your email</h5>
						<input id="email" type="email" class="form-control" placeholder="Email" name="email" required="required">
					<br>
						<h5>Select your gender</h5>
						<select class="form-control" name="gender" required="required">
							<option>Male</option>
							<option>Female</option>
						
						</select>
					<br>
						<h5>Set your date</h5>
						<input type="date" class="form-control" placeholder="Email" name="birthday" required="required">
					<br>
					<!--  <div class="form-group input-group">
                       	<div class="input-group-prepend">
	            	    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
	                 	</div> -->
	                 	     <h5>Enter your phone number</h5>
	                     	<select class="form-control" name="phone" required="required">
		                          <option selected="">+20</option>
		                          <option >+972</option>
		                          <option >+198</option>
		                          <option >+701</option>
		                    </select>
    	                  <input name="phone" class="form-control" placeholder="Phone number" type="text">
                     <br>
                        <h5>Enter your Home town</h5>
						<input type="text" class="form-control" placeholder="home town" name="home_town" required="required">
				     <br>

				      <h5>Enter your Relationship status</h5>
	                     	<select class="form-control" required="required" name="rela">
		                          <option selected="">Single</option>
		                          <option >In a relationship</option>
		                          <option >Engaged</option>
		                          <option >Married</option>
		                    </select>
                     <br>
                     <h5>Say something creative about you !</h5>
						<input type="text" class="form-control" placeholder="About me" name="aboutMe" required="required">
					<br>

					<center><button id="signup" type="submit" name="signup" class="btn btn-outline-danger" >Sign up</button></center>
				</form>
				<div style="background: #fff; border-radius: 3px; max-width: 420px; padding: 15px; margin:auto;margin-top: 15px;color: #7b7b7b;" align="center">
                Already have an account ? <a href="signin.php">Sign in</a><hr style="margin: 8px;">
            </div>
	</div>
</body>
</html>


<?php 
 if(isset($_POST['signup'])){
 	$con = mysqli_connect("localhost","root","","smapp") or die(mysql_error());
 	//session_start();
 	$fname = $_POST['first_name'];
 	$lname = $_POST['last_name'];
 	$pass = $_POST['pw'];
 	$pass = md5($pass);
 	$email = $_POST['email'];
 	$gender = $_POST['gender'];
 	$date = $_POST['birthday'];
 	$phone = $_POST['phone'];
 	$home = $_POST['home_town'];
 	$relation = $_POST['rela'];
 	$aboutMe = $_POST['aboutMe'];
 	if($gender == 'Male'){$photo = "boy.png";}
 	elseif($gender == 'Female'){$photo = "girl.png";}
 	
 	$qu = "insert into users (fname,lname,pw,email,gender,date,phone,home,relationship,photo,aboutMe) 
 	value ('$fname','$lname','$pass','$email','$gender','$date','$phone','$home','$relation','$photo','$aboutMe')";
 	$query = mysqli_query($con,$qu);
 	if($query){
 		echo " <script> alert('well done')</script>";
 	}
 }
 ?>