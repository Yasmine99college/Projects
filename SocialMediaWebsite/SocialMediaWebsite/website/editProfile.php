<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php session_start();?>
<div class="row">
	<div >
		<div class="well">
			<center><h1 style="color: skyblue;">
				<?php 
				$con = mysqli_connect("localhost","root","","smapp") or die(mysql_error());
				$id = $_SESSION['id'];
				$qu = "select * from users where id = $id";
 				$result = mysqli_query($con,$qu);
 				$row = mysqli_fetch_assoc($result);
				echo "Hello ".$row['fname'];
				?>
			</h1></center>
		</div>
	</div>
</div>
	<div class="cont">
				<center><h3><strong>Edit</strong></h3></center>
				<form action="" method="post" name="myForm">
						<h5>Edit your first name</h5>
						<input type="text" class="form-control" placeholder="First Name" name="fname" >
					<br>
						<h5>Edit your last name</h5>
						<input type="text" class="form-control" placeholder="Last Name" name="lname" >
					<br>
						<h5>Edit your password</h5>
						<input id="password" type="password" class="form-control" placeholder="Password" name="pass" >
					<br>
						<h5>Edit your email</h5>
						<input id="email" type="email" class="form-control" placeholder="Email" name="email" >
					<!-- <br>
						<h5>Edit your gender</h5>
						<select class="form-control" name="gender">
							<option>Male</option>
							<option>Female</option>
						
						</select> -->
					<br>
						<h5>Edit your date</h5>
						<input type="date" class="form-control" placeholder="Email" name="date" >
					<br>
	                 	     <h5>Edit your phone number</h5>
	                     	<select class="form-control" name="phone" >
		                          <option selected="">+20</option>
		                          <option >+972</option>
		                          <option >+198</option>
		                          <option >+701</option>
		                    </select>
    	                  <input name="phone" class="form-control" placeholder="Phone number" type="text">
                     <br>
                        <h5>Edit your Home town</h5>
						<input type="text" class="form-control" placeholder="home town" name="home" >
				     <br>

				      <h5>Edit your Relationship status</h5>
	                     	<select class="form-control" required="required" name="relation">
		                          <option selected="">Single</option>
		                          <option >In a relationship</option>
		                          <option >Engaged</option>
		                          <option >Married</option>
		                    </select>
                     <br>
                     <h5>Edit your About info</h5>
						<input type="text" class="form-control" placeholder="About Me" name="aboutMe" >
					<br>

					<center><button id="signup" type="submit" name="edit" class="btn btn-outline-danger" >Confirm</button></center>
				</form>
				<div style="background: #fff; border-radius: 3px; max-width: 420px; padding: 15px; margin:auto;margin-top: 15px;color: #7b7b7b;" align="center">
                changing your mind ? ;d <a href="welcome.php">back to the profile</a><hr style="margin: 8px;">
            </div>
	</div>
</body>
</html>


<?php 
				$con = mysqli_connect("localhost","root","","smapp") or die(mysql_error());
				$id = $_SESSION['id'];
				$qu = "select * from users where id = $id";
 				$result = mysqli_query($con,$qu);
 				$row = mysqli_fetch_assoc($result);
 if(isset($_POST['edit'])){
 	$fname="";
 	$lname="";
 	$pass="";
 	$email="";
 	$date="";
 	$phone="";
 	$home="";
 	$relation="";
 	$aboutMe="";
 if(strlen($_POST['fname'])>1)
 	$fname = $_POST['fname'];
 else
 	$fname = $row['fname'];
 if(strlen($_POST['lname'])>1)
 	$lname = $_POST['lname'];
 else
 	$lname = $row['lname'];
 if(strlen($_POST['pass'])>1){
 	$pass = $_POST['pass'];
 	$pass = md5($pass);}
 	else
 	$pass = $row['pw'];
 if(strlen($_POST['email'])>1)
 	$email = $_POST['email'];
 else
 	$email = $row['email'];
 if(strlen($_POST['date'])>1)
 	$date = $_POST['date'];
 else
 	$date = $row['date'];
 if(strlen($_POST['phone'])>5)
 	$phone = $_POST['phone'];
 else
 	$phone = $row['phone'];
 if(strlen($_POST['home'])>1)
 	$home = $_POST['home'];
 else
 	$home = $row['home'];
 if(strlen($_POST['aboutMe'])>1)
 	$aboutMe = $_POST['aboutMe'];
 else
 	$aboutMe = $row['aboutMe'];
if (strlen($_POST['relation'])>1)
 	$relation = $_POST['relation'];
else 
	$relation = $row['relationship'];


 	
 	$qu = "update users SET fname ='".$fname."' ,lname = '".$lname."' ,pw = '".$pass."',
 	email = '".$email."',gender='".$row['gender']."',date='".$date."',phone='".$phone."',
 	home='".$home."',relationship='".$relation."',photo='".$row['photo']."' ,aboutMe='".$aboutMe."'where id = '".$row['id']."'";

 	$query = mysqli_query($con,$qu);

 	if($query){
 		echo " <script> alert('edit is done')</script>";
 	}
 }
 ?>